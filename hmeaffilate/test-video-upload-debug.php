<?php
session_start();
header('Content-Type: application/json');
include("../inc/connect.inc.php")');
// Load environment variables
require __DIR__ . '/../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();
// Configuration
define('GOOGLE_CLIENT_ID', $_ENV['GOOGLE_CLIENT_ID']);
define('GOOGLE_CLIENT_SECRET', $_ENV['GOOGLE_CLIENT_SECRET']);
define('CALLBACK_URL', $_ENV['CALLBACK_URL']);
define('GOOGLE_REDIRECT_URI', CALLBACK_URL);
/**
 * Debug version of uploadVideoToYouTube with detailed error handling
 */
function debugUploadVideoToYouTube($accessToken, $videoFile, $title, $description = '') {
    $debug = array();
    
    try {
        // Check if access token exists
        if (empty($accessToken)) {
            throw new Exception('Access token is empty');
        }
        $debug['access_token'] = substr($accessToken, 0, 20) . '...';
        
        // Check if video file exists
        if (!file_exists($videoFile)) {
            throw new Exception('Video file does not exist: ' . $videoFile);
        }
        
        $fileSize = filesize($videoFile);
        $debug['file_size'] = $fileSize;
        $debug['file_size_mb'] = round($fileSize / (1024 * 1024), 2);
        
        if ($fileSize == 0) {
            throw new Exception('Video file is empty');
        }
        
        // Get MIME type
        $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($fileInfo, $videoFile);
        finfo_close($fileInfo);
        $debug['mime_type'] = $mimeType;
        
        // Read file content
        $fileContent = file_get_contents($videoFile);
        if ($fileContent === false) {
            throw new Exception('Failed to read video file content');
        }
        $debug['content_read'] = true;
        
        // Create multipart body
        $boundary = uniqid();
        $debug['boundary'] = $boundary;
        
        $body = "--$boundary\r\n";
        $body .= "Content-Type: application/json; charset=UTF-8\r\n\r\n";
        $body .= json_encode(array(
            'snippet' => array(
                'title' => $title,
                'description' => $description,
                'categoryId' => '22' // People & Blogs category
            ),
            'status' => array(
                'privacyStatus' => 'private' // Set to private initially
            )
        )) . "\r\n";
        $body .= "--$boundary\r\n";
        $body .= "Content-Type: $mimeType\r\n";
        $body .= "Content-Length: $fileSize\r\n\r\n";
        $body .= $fileContent . "\r\n";
        $body .= "--$boundary--";
        
        $debug['body_size'] = strlen($body);
        $debug['body_headers'] = array(
            "Authorization: Bearer $accessToken",
            "Content-Type: multipart/related; boundary=$boundary",
            "Content-Length: " . strlen($body)
        );
        
        // Make the request using cURL instead of file_get_contents
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/upload/youtube/v3/videos?part=snippet,status&uploadType=multipart');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $debug['body_headers']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_TIMEOUT, 300); // 5 minute timeout for large files
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);
        
        $debug['http_code'] = $httpCode;
        $debug['curl_error'] = $curlError;
        $debug['response_length'] = strlen($response);
        
        if ($response === false) {
            throw new Exception('cURL request failed: ' . $curlError);
        }
        
        $debug['raw_response'] = $response;
        
        // Parse response
        $decodedResponse = json_decode($response, true);
        $debug['json_decode_success'] = ($decodedResponse !== null);
        
        if ($decodedResponse === null) {
            $debug['json_error'] = json_last_error_msg();
            throw new Exception('Failed to decode JSON response: ' . json_last_error_msg());
        }
        
        $debug['decoded_response'] = $decodedResponse;
        
        if (isset($decodedResponse['error'])) {
            $debug['api_error'] = $decodedResponse['error'];
            throw new Exception('YouTube API error: ' . json_encode($decodedResponse['error']));
        }
        
        return array(
            'success' => true,
            'result' => $decodedResponse,
            'debug' => $debug
        );
        
    } catch (Exception $e) {
        return array(
            'success' => false,
            'error' => $e->getMessage(),
            'debug' => $debug
        );
    }
}
function getAccessTokenFromCode($code) {
    $data = array(
        'code' => $code,
        'client_id' => GOOGLE_CLIENT_ID,
        'client_secret' => GOOGLE_CLIENT_SECRET,
        'redirect_uri' => GOOGLE_REDIRECT_URI,
        'grant_type' => 'authorization_code'
    );
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://oauth2.googleapis.com/token');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);
    
    if ($result === false) {
        error_log("Google OAuth token exchange failed: " . $curlError);
        return false;
    }
    
    return json_decode($result, true);
}
// Handle debug requests
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'test_upload':
            // Check authentication
            $accessToken = null;
            if (isset($_SESSION['google_access_token'])) {
                $accessToken = $_SESSION['google_access_token'];
            } elseif (isset($_SESSION['agentaffilate_id'])) {
                $sql = "SELECT google_access_token FROM hmeaffilate_user WHERE agentaffilate_id = ? AND google_access_token IS NOT NULL";
                $stmt = mysqli_prepare($con, $sql);
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "s", $_SESSION['agentaffilate_id']);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $tokens = mysqli_fetch_assoc($result);
                    if ($tokens) {
                        $accessToken = $tokens['google_access_token'];
                        $_SESSION['google_access_token'] = $accessToken;
                    }
                    mysqli_stmt_close($stmt);
                }
            }
            
            if (!$accessToken) {
                echo json_encode(array('success' => false, 'error' => 'Not authenticated with Google'));
                exit;
            }
            
            // Check video file
            if (!isset($_FILES['video']) || $_FILES['video']['error'] !== UPLOAD_ERR_OK) {
                echo json_encode(array('success' => false, 'error' => 'No valid video file uploaded'));
                exit;
            }
            
            $videoFile = $_FILES['video']['tmp_name'];
            $title = isset($_POST['title']) ? $_POST['title'] : 'Test Video Upload';
            $description = isset($_POST['description']) ? $_POST['description'] : 'Test video upload from HouseMadeEasy';
            
            $result = debugUploadVideoToYouTube($accessToken, $videoFile, $title, $description);
            echo json_encode($result, JSON_PRETTY_PRINT);
            break;
            
        case 'test_oauth':
            if (!isset($_GET['code'])) {
                echo json_encode(array('success' => false, 'error' => 'No authorization code provided'));
                exit;
            }
            
            $tokenData = getAccessTokenFromCode($_GET['code']);
            if ($tokenData && isset($tokenData['access_token'])) {
                $_SESSION['google_access_token'] = $tokenData['access_token'];
                if (isset($tokenData['refresh_token'])) {
                    $_SESSION['google_refresh_token'] = $tokenData['refresh_token'];
                }
                
                echo json_encode(array(
                    'success' => true,
                    'message' => 'OAuth successful',
                    'token_preview' => substr($tokenData['access_token'], 0, 20) . '...',
                    'has_refresh_token' => isset($tokenData['refresh_token']),
                    'expires_in' => $tokenData['expires_in'] ?? null
                ));
            } else {
                echo json_encode(array('success' => false, 'error' => 'Token exchange failed', 'raw_response' => $tokenData));
            }
            break;
            
        default:
            echo json_encode(array('success' => false, 'error' => 'Invalid action'));
            break;
    }
} else {
    echo json_encode(array('success' => false, 'error' => 'No action specified'));
}
?>
