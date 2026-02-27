<?php
header('Content-Type: application/json');
include("../inc/connect.inc.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);

// Load environment variables
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Load Google tokens from database if not in session
if (!isset($_SESSION['google_access_token']) && isset($_SESSION['agentaffilate_id'])) {
    $query = mysqli_query($con, "SELECT google_access_token, google_refresh_token, google_token_expires_at, google_token_scope FROM hmeaffilate_user WHERE agentaffilate_id = '".$_SESSION['agentaffilate_id']."'");
    if ($row = mysqli_fetch_assoc($query)) {
        if (!empty($row['google_access_token']) && !empty($row['google_token_expires_at'])) {
            $currentTime = time();
            $tokenExpiry = strtotime($row['google_token_expires_at']);
            if ($tokenExpiry > ($currentTime + 300)) { // 5 minute buffer
                $_SESSION['google_access_token'] = $row['google_access_token'];
                $_SESSION['google_refresh_token'] = $row['google_refresh_token'];
                $_SESSION['google_token_expires_at'] = $row['google_token_expires_at'];
                $_SESSION['google_token_scope'] = $row['google_token_scope'];
            }
        }
    }
}

// Configuration
define('GOOGLE_CLIENT_ID', $_ENV['GOOGLE_CLIENT_ID']);
define('GOOGLE_CLIENT_SECRET', $_ENV['GOOGLE_CLIENT_SECRET']);
define('CALLBACK_URL', $_ENV['CALLBACK_URL']);
define('GOOGLE_REDIRECT_URI', CALLBACK_URL);

// YouTube API scopes
define('YOUTUBE_UPLOAD_SCOPE', 'https://www.googleapis.com/auth/youtube.upload');

/**
 * Store Google OAuth tokens in database
 */
function storeGoogleTokens($agentaffilate_id, $accessToken, $refreshToken = null, $expiresIn = null, $scope = null) {
    global $con;
    
    // Calculate expiry time
    $expiresAt = null;
    if ($expiresIn) {
        $expiresAt = date('Y-m-d H:i:s', time() + $expiresIn);
    }
    
    // Check if user exists
    $checkUser = mysqli_prepare($con, "SELECT agentaffilate_id FROM hmeaffilate_user WHERE agentaffilate_id = ?");
    if (!$checkUser) {
        error_log("Failed to prepare user check query: " . mysqli_error($con));
        return false;
    }
    
    mysqli_stmt_bind_param($checkUser, "s", $agentaffilate_id);
    mysqli_stmt_execute($checkUser);
    $userResult = mysqli_stmt_get_result($checkUser);
    
    if (!mysqli_fetch_assoc($userResult)) {
        error_log("User not found in database: " . $agentaffilate_id);
        mysqli_stmt_close($checkUser);
        return false;
    }
    
    mysqli_stmt_close($checkUser);
    
    // Prepare the SQL query
    $sql = "UPDATE hmeaffilate_user SET 
            google_access_token = ?, 
            google_refresh_token = ?, 
            google_token_expires_at = ?, 
            google_token_scope = ?,
            google_token_updated_at = NOW()
            WHERE agentaffilate_id = ?";
    
    $stmt = mysqli_prepare($con, $sql);
    if (!$stmt) {
        error_log("Failed to prepare token storage query: " . mysqli_error($con));
        return false;
    }
    
    mysqli_stmt_bind_param($stmt, "sssss", 
        $accessToken, 
        $refreshToken, 
        $expiresAt, 
        $scope, 
        $agentaffilate_id
    );
    
    $result = mysqli_stmt_execute($stmt);
    
    if (!$result) {
        error_log("Failed to execute token storage query: " . mysqli_error($con));
        mysqli_stmt_close($stmt);
        return false;
    }
    
    $affectedRows = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);
    
    if ($affectedRows > 0) {
        error_log("Successfully stored Google OAuth tokens for user: " . $agentaffilate_id);
        return true;
    } else {
        error_log("No rows affected when storing tokens for user: " . $agentaffilate_id);
        return false;
    }
}

/**
 * Get detailed token status for debugging
 */
function getDetailedTokenStatus($agentaffilate_id) {
    global $con;
    
    $sql = "SELECT 
                google_access_token, 
                google_refresh_token, 
                google_token_expires_at, 
                google_token_scope,
                google_token_updated_at
            FROM hmeaffilate_user 
            WHERE agentaffilate_id = ?";
    
    $stmt = mysqli_prepare($con, $sql);
    if (!$stmt) {
        return array('error' => 'Database prepare failed: ' . mysqli_error($con));
    }
    
    mysqli_stmt_bind_param($stmt, "s", $agentaffilate_id);
    $executeResult = mysqli_stmt_execute($stmt);
    
    if (!$executeResult) {
        mysqli_stmt_close($stmt);
        return array('error' => 'Database execute failed: ' . mysqli_error($con));
    }
    
    $result = mysqli_stmt_get_result($stmt);
    $tokens = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    
    if (!$tokens) {
        return array('error' => 'User not found in database');
    }
    
    // Analyze token status
    $status = array(
        'user_exists' => true,
        'has_access_token' => !empty($tokens['google_access_token']),
        'has_refresh_token' => !empty($tokens['google_refresh_token']),
        'token_expires_at' => $tokens['google_token_expires_at'],
        'token_scope' => $tokens['google_token_scope'],
        'token_updated_at' => $tokens['google_token_updated_at'],
        'token_valid' => false,
        'time_until_expiry' => null
    );
    
    if ($tokens['google_token_expires_at']) {
        $currentTime = time();
        $tokenExpiry = strtotime($tokens['google_token_expires_at']);
        $status['token_valid'] = ($tokenExpiry > ($currentTime + 300)); // 5 minute buffer
        $status['time_until_expiry'] = $tokenExpiry - $currentTime;
    }
    
    return $status;
}

/**
 * Retrieve Google OAuth tokens from database
 */
function getGoogleTokens($agentaffilate_id) {
    global $con;
    
    $sql = "SELECT google_access_token, google_refresh_token, google_token_expires_at, google_token_scope 
            FROM hmeaffilate_user 
            WHERE agentaffilate_id = ? AND google_access_token IS NOT NULL";
    
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $agentaffilate_id);
        mysqli_stmt_execute($stmt);
        
        $result = mysqli_stmt_get_result($stmt);
        $tokens = mysqli_fetch_assoc($result);
        
        mysqli_stmt_close($stmt);
        
        return $tokens;
    }
    
    return false;
}

/**
 * Check if stored token is still valid
 */
function isTokenValid($expiresAt) {
    if (!$expiresAt) return false;
    
    $currentTime = time();
    $tokenExpiry = strtotime($expiresAt);
    
    // Token is valid if it expires more than 5 minutes from now (buffer time)
    return ($tokenExpiry > ($currentTime + 300));
}

/**
 * Refresh access token using refresh token
 */
function refreshAccessToken($refreshToken) {
    $data = array(
        'client_id' => GOOGLE_CLIENT_ID,
        'client_secret' => GOOGLE_CLIENT_SECRET,
        'refresh_token' => $refreshToken,
        'grant_type' => 'refresh_token'
    );
    
    // Use cURL instead of file_get_contents for better HTTPS support
    if (!function_exists('curl_init')) {
        error_log("cURL not available for token refresh");
        return false;
    }
    
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
        error_log("cURL request failed for token refresh: " . $curlError);
        return false;
    }
    
    return json_decode($result, true);
}

function getAccessToken($code) {
    $data = array(
        'code' => $code,
        'client_id' => GOOGLE_CLIENT_ID,
        'client_secret' => GOOGLE_CLIENT_SECRET,
        'redirect_uri' => GOOGLE_REDIRECT_URI,
        'grant_type' => 'authorization_code'
    );
    
    // Use cURL for reliable HTTPS support
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
    
    $decoded = json_decode($result, true);
    
    // Log OAuth errors for debugging
    if (isset($decoded['error'])) {
        error_log("Google OAuth error: " . $decoded['error'] . " - " . ($decoded['error_description'] ?? 'No description'));
        return false;
    }
    
    return $decoded;
}

function uploadVideoToYouTube($accessToken, $videoFile, $title, $description = '') {
    $errors = array();
    
    // Validate inputs
    if (!file_exists($videoFile)) {
        $error = 'Video file does not exist: ' . $videoFile;
        error_log($error);
        $errors[] = $error;
        return array('success' => false, 'error' => implode('; ', $errors));
    }
    
    $fileSize = filesize($videoFile);
    if ($fileSize === false || $fileSize === 0) {
        $error = 'Cannot get file size or file is empty: ' . $videoFile;
        error_log($error);
        $errors[] = $error;
        return array('success' => false, 'error' => implode('; ', $errors));
    }
    
    error_log('Starting YouTube upload. File: ' . $videoFile . ', Size: ' . $fileSize . ' bytes');
    
    // Detect MIME type
    $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($fileInfo, $videoFile);
    finfo_close($fileInfo);
    
    if (!$mimeType) {
        $error = 'Could not detect MIME type for file: ' . $videoFile;
        error_log($error);
        $errors[] = $error;
        return array('success' => false, 'error' => implode('; ', $errors));
    }
    
    error_log('Detected MIME type: ' . $mimeType);
    
    // Create the multipart body
    $boundary = uniqid('youtube_upload_');
    $delimiter = "--$boundary";
    $fileContent = file_get_contents($videoFile);
    
    if ($fileContent === false) {
        error_log('Could not read video file: ' . $videoFile);
        return false;
    }
    
    $body = $delimiter . "\r\n";
    $body .= "Content-Type: application/json; charset=UTF-8\r\n\r\n";
    $body .= json_encode(array(
        'snippet' => array(
            'title' => $title,
            'description' => $description,
            'categoryId' => '22', // People & Blogs category
            'tags' => array('HouseMadeEasy', 'property', 'tour')
        ),
        'status' => array(
            'privacyStatus' => 'unlisted' // Change to unlisted so user can see it
        )
    )) . "\r\n";
    $body .= $delimiter . "\r\n";
    $body .= "Content-Type: $mimeType\r\n";
    $body .= "Content-Length: $fileSize\r\n\r\n";
    $body .= $fileContent . "\r\n";
    $body .= "$delimiter--";
    
    error_log('Multipart body created, size: ' . strlen($body) . ' bytes');
    
    // Use cURL for more reliable uploads
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/upload/youtube/v3/videos?part=snippet,status&uploadType=multipart');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer $accessToken",
        "Content-Type: multipart/related; boundary=$boundary",
        "Content-Length: " . strlen($body)
    ));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_TIMEOUT, 300); // 5 minute timeout
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    
    error_log('Sending upload request to YouTube API...');
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);
    
    error_log('YouTube API response code: ' . $httpCode);
    
    if ($response === false) {
        $error = 'cURL request failed: ' . $curlError;
        error_log($error);
        $errors[] = $error;
        return array('success' => false, 'error' => implode('; ', $errors));
    }
    
    if ($httpCode >= 400) {
        $error = 'YouTube API returned HTTP error ' . $httpCode . ': ' . $response;
        error_log($error);
        $errors[] = 'HTTP ' . $httpCode . ' error from YouTube API';
        if ($response) {
            $errors[] = 'Response: ' . $response;
        }
        return array('success' => false, 'error' => implode('; ', $errors));
    }
    
    error_log('YouTube API response: ' . $response);
    
    $decodedResponse = json_decode($response, true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        $error = 'Failed to parse YouTube API response as JSON: ' . $response;
        error_log($error);
        $errors[] = $error;
        return array('success' => false, 'error' => implode('; ', $errors));
    }
    
    if (isset($decodedResponse['error'])) {
        $error = 'YouTube API returned error: ' . json_encode($decodedResponse['error']);
        error_log($error);
        $errorMessage = isset($decodedResponse['error']['message']) ? $decodedResponse['error']['message'] : 'Unknown API error';
        $errors[] = 'YouTube API error: ' . $errorMessage;
        return array('success' => false, 'error' => implode('; ', $errors));
    }
    
    if (!isset($decodedResponse['id'])) {
        $error = 'No video ID in YouTube API response: ' . json_encode($decodedResponse);
        error_log($error);
        $errors[] = $error;
        return array('success' => false, 'error' => implode('; ', $errors));
    }
    
    error_log('Video uploaded successfully with ID: ' . $decodedResponse['id']);
    
    return array('success' => true, 'data' => $decodedResponse);
}

function getVideoStatus($accessToken, $videoId) {
    $context = stream_context_create(array(
        'http' => array(
            'method' => 'GET',
            'header' => "Authorization: Bearer $accessToken"
        )
    ));
    
    $response = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=status,processingDetails&id=$videoId", false, $context);
    
    if ($response === FALSE) {
        return false;
    }
    
    return json_decode($response, true);
}

function getVideoLink($accessToken, $videoId) {
    error_log("getVideoLink called for video ID: $videoId");
    
    // Validate inputs
    if (empty($accessToken)) {
        error_log("getVideoLink: Empty access token provided");
        return false;
    }
    
    if (empty($videoId)) {
        error_log("getVideoLink: Empty video ID provided");
        return false;
    }
    
    // Use cURL for better reliability
    $ch = curl_init();
    $url = "https://www.googleapis.com/youtube/v3/videos?part=snippet,status,processingDetails&id=" . urlencode($videoId);
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer $accessToken"
    ));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    
    error_log("Fetching video info from: $url");
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);
    
    if ($response === false) {
        error_log("getVideoLink: cURL request failed - $curlError");
        return false;
    }
    
    if ($httpCode !== 200) {
        error_log("getVideoLink: HTTP error $httpCode - Response: $response");
        return false;
    }
    
    error_log("getVideoLink: API Response - $response");
    
    $data = json_decode($response, true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log("getVideoLink: Failed to parse JSON response: " . json_last_error_msg());
        return false;
    }
    
    // Check if we have items
    if (!isset($data['items']) || empty($data['items'])) {
        error_log("getVideoLink: No items found in response or empty items array");
        return false;
    }
    
    if (isset($data['items'][0])) {
        $video = $data['items'][0];
        
        // Log detailed video information for debugging
        error_log("getVideoLink: Video details - " . json_encode(array(
            'id' => $videoId,
            'title' => $video['snippet']['title'],
            'privacyStatus' => $video['status']['privacyStatus'],
            'uploadStatus' => $video['status']['uploadStatus'],
            'processingStatus' => $video['processingDetails']['processingStatus'],
            'embeddable' => $video['status']['embeddable']
        )));
        
        // Return the correct URL based on privacy status and processing status
        if ($video['status']['uploadStatus'] === 'processed' && $video['status']['privacyStatus'] === 'unlisted') {
            return "https://www.youtube.com/watch?v=" . $videoId;
        } elseif ($video['status']['uploadStatus'] === 'processed' && $video['status']['privacyStatus'] === 'private') {
            return "https://www.youtube.com/watch?v=" . $videoId; // Still accessible via link
        } else {
            error_log("getVideoLink: Video not ready yet. Status: " . $video['status']['uploadStatus'] . ", Privacy: " . $video['status']['privacyStatus']);
            return false;
        }
    } else {
        error_log("getVideoLink: No video found with ID: " . $videoId);
        return false;
    }
}

// Handle OAuth callback
if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $state = $_GET['state'] ?? '';
    
    error_log("OAuth callback received with code: " . substr($code, 0, 10) . "... and state: " . $state);
    
    $tokenResponse = getAccessToken($code);
    
    if ($tokenResponse) {
        // Token exchange successful
        $accessToken = $tokenResponse['access_token'];
        $refreshToken = $tokenResponse['refresh_token'] ?? null;
        $expiresIn = $tokenResponse['expires_in'] ?? 3600;
        $scope = $tokenResponse['scope'] ?? null;
        
        // Store tokens in database
        if (isset($_SESSION['agentaffilate_id'])) {
            if (storeGoogleTokens($_SESSION['agentaffilate_id'], $accessToken, $refreshToken, $expiresIn, $scope)) {
                // Store in session for immediate use
                $_SESSION['google_access_token'] = $accessToken;
                $_SESSION['google_refresh_token'] = $refreshToken;
                $_SESSION['google_token_expires_at'] = date('Y-m-d H:i:s', time() + $expiresIn);
                $_SESSION['google_token_scope'] = $scope;
                
                error_log("Tokens stored successfully for user: " . $_SESSION['agentaffilate_id']);
                header('Location: ' . $state . '?oauth=success');
                exit;
            } else {
                error_log("Failed to store tokens in database");
                header('Location: ' . $state . '?oauth=failed');
                exit;
            }
        } else {
            error_log("No agentaffilate_id in session for storing tokens");
            header('Location: ' . $state . '?oauth=failed');
            exit;
        }
    } else {
        error_log("Failed to exchange code for tokens");
        header('Location: ' . $state . '?oauth=failed');
        exit;
    }
}

// Handle video upload via AJAX
if (isset($_POST['action']) && $_POST['action'] === 'upload_to_youtube') {
    error_log("Video upload request received");
    
    // Check if we have a valid access token
    $accessToken = null;
    if (isset($_SESSION['google_access_token'])) {
        $accessToken = $_SESSION['google_access_token'];
    } elseif (isset($_SESSION['agentaffilate_id'])) {
        $tokens = getGoogleTokens($_SESSION['agentaffilate_id']);
        if ($tokens) {
            if (isTokenValid($tokens['google_token_expires_at'])) {
                $accessToken = $tokens['google_access_token'];
                $_SESSION['google_access_token'] = $accessToken;
                $_SESSION['google_refresh_token'] = $tokens['google_refresh_token'];
                $_SESSION['google_token_expires_at'] = $tokens['google_token_expires_at'];
                $_SESSION['google_token_scope'] = $tokens['google_token_scope'];
            } elseif (!empty($tokens['google_refresh_token'])) {
                // Refresh token if needed
                $refreshResult = refreshAccessToken($tokens['google_refresh_token']);
                if ($refreshResult && isset($refreshResult['access_token'])) {
                    $newAccess = $refreshResult['access_token'];
                    $newRefresh = $refreshResult['refresh_token'] ?? $tokens['google_refresh_token'];
                    $expiresIn = $refreshResult['expires_in'] ?? 3600;
                    
                    if (storeGoogleTokens($_SESSION['agentaffilate_id'], $newAccess, $newRefresh, $expiresIn, $tokens['google_token_scope'])) {
                        $accessToken = $newAccess;
                        $_SESSION['google_access_token'] = $newAccess;
                        $_SESSION['google_refresh_token'] = $newRefresh;
                        $_SESSION['google_token_expires_at'] = date('Y-m-d H:i:s', time() + $expiresIn);
                        $_SESSION['google_token_scope'] = $tokens['google_token_scope'];
                    }
                }
            }
        }
    }
    
    if (!$accessToken) {
        error_log("No valid access token available for video upload");
        echo json_encode(array(
            'success' => false,
            'error' => 'No valid Google OAuth access token. Please reconnect your Google account.'
        ));
        exit;
    }
    
    // Check if video file is uploaded
    if (!isset($_FILES['video']) || !$_FILES['video']['tmp_name']) {
        error_log("No video file uploaded");
        echo json_encode(array(
            'success' => false,
            'error' => 'No video file selected. Please choose a video file to upload.'
        ));
        exit;
    }
    
    // Handle video upload
    $videoFile = $_FILES['video']['tmp_name'];
    $originalName = $_FILES['video']['name'];
    $title = 'Property Tour - ' . date('Y-m-d H:i:s');
    $description = 'Property tour video uploaded via HouseMadeEasy platform.';
    
    $uploadResult = uploadVideoToYouTube($accessToken, $videoFile, $title, $description);
    
    if ($uploadResult && $uploadResult['success']) {
        $videoId = $uploadResult['data']['id'];
        $videoLink = getVideoLink($accessToken, $videoId);
        
        if ($videoLink) {
            echo json_encode(array(
                'success' => true,
                'youtube_url' => $videoLink,
                'video_id' => $videoId,
                'message' => 'Video uploaded successfully to YouTube'
            ));
        } else {
            // Fallback to direct YouTube URL
            $fallbackUrl = "https://www.youtube.com/watch?v=" . $videoId;
            error_log("Fallback to direct YouTube URL: " . $fallbackUrl);
            echo json_encode(array(
                'success' => true,
                'youtube_url' => $fallbackUrl,
                'video_id' => $videoId,
                'message' => 'Video uploaded successfully to YouTube'
            ));
        }
    } else {
        error_log("Video upload failed: " . ($uploadResult['error'] ?? 'Unknown error'));
        echo json_encode(array(
            'success' => false,
            'error' => $uploadResult['error'] ?? 'Failed to upload video to YouTube'
        ));
    }
}

// Handle token status check
if (isset($_GET['action']) && $_GET['action'] === 'check_token') {
    if (isset($_SESSION['agentaffilate_id'])) {
        $tokenStatus = getDetailedTokenStatus($_SESSION['agentaffilate_id']);
        echo json_encode($tokenStatus);
    } else {
        echo json_encode(array('error' => 'Not authenticated'));
    }
    exit;
}
?>
