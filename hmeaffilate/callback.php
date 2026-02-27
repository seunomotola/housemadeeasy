<?php
session_start();
header('Content-Type: application/json');
include("../inc/connect.inc.php")');
// Load environment variables
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();
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
            'id' => $video['id'] ?? 'not set',
            'title' => $video['snippet']['title'] ?? 'not set',
            'status' => $video['status']['privacyStatus'] ?? 'not set',
            'processingStatus' => $video['status']['uploadStatus'] ?? 'not set'
        )));
        
        // Check privacy status
        $privacyStatus = $video['status']['privacyStatus'] ?? 'private';
        error_log("getVideoLink: Privacy status: $privacyStatus");
        
        if ($privacyStatus === 'public' || $privacyStatus === 'unlisted') {
            $videoUrl = "https://www.youtube.com/watch?v=" . $videoId;
            error_log("getVideoLink: Returning video URL: $videoUrl");
            return $videoUrl;
        } else {
            error_log("getVideoLink: Video privacy status is '$privacyStatus', not returning URL");
            
            // For debugging, return additional information
            return array(
                'url' => false,
                'status' => $privacyStatus,
                'processing_details' => $video['processingDetails'] ?? array(),
                'message' => 'Video is not yet public or unlisted'
            );
        }
    } else {
        error_log("getVideoLink: No video found at index 0");
        return false;
    }
}
// Handle different actions
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'upload_to_youtube':
            // Debug logging
            error_log('Video upload request received');
            error_log('POST data: ' . json_encode($_POST));
            error_log('FILES data: ' . json_encode($_FILES));
            // Check if user is authenticated
            $accessToken = null;
            // First check session
            if (isset($_SESSION['google_access_token']) && isset($_SESSION['google_token_expires_at'])) {
                // Check if session token is still valid
                if (isTokenValid($_SESSION['google_token_expires_at'])) {
                    $accessToken = $_SESSION['google_access_token'];
                    error_log('Using valid access token from session');
                } elseif (isset($_SESSION['google_refresh_token'])) {
                    // Session token expired, try to refresh
                    error_log('Session token expired, attempting refresh');
                    $refreshResult = refreshAccessToken($_SESSION['google_refresh_token']);
                    if ($refreshResult && isset($refreshResult['access_token'])) {
                        $newAccessToken = $refreshResult['access_token'];
                        $newRefreshToken = $refreshResult['refresh_token'] ?? $_SESSION['google_refresh_token'];
                        $expiresIn = $refreshResult['expires_in'] ?? 3600;
                        // Update database
                        $updateSuccess = storeGoogleTokens(
                            $_SESSION['agentaffilate_id'],
                            $newAccessToken,
                            $newRefreshToken,
                            $expiresIn,
                            $_SESSION['google_token_scope'] ?? null
                        );
                        if ($updateSuccess) {
                            // Update session
                            $_SESSION['google_access_token'] = $newAccessToken;
                            $_SESSION['google_refresh_token'] = $newRefreshToken;
                            $_SESSION['google_token_expires_at'] = date('Y-m-d H:i:s', time() + $expiresIn);
                            $accessToken = $newAccessToken;
                            error_log('Successfully refreshed token for upload');
                        } else {
                            error_log('Failed to update database with refreshed token');
                        }
                    } else {
                        error_log('Token refresh failed: ' . json_encode($refreshResult));
                    }
                }
            }
            // If still no token, try to get from database
            if (!$accessToken && isset($_SESSION['agentaffilate_id'])) {
                error_log('Checking database for tokens for user: ' . $_SESSION['agentaffilate_id']);
                $tokens = getGoogleTokens($_SESSION['agentaffilate_id']);
                if ($tokens) {
                    if (isTokenValid($tokens['google_token_expires_at'])) {
                        $accessToken = $tokens['google_access_token'];
                        // Store in session for faster access
                        $_SESSION['google_access_token'] = $accessToken;
                        $_SESSION['google_refresh_token'] = $tokens['google_refresh_token'];
                        $_SESSION['google_token_expires_at'] = $tokens['google_token_expires_at'];
                        error_log('Retrieved valid token from database');
                    } elseif (!empty($tokens['google_refresh_token'])) {
                        // DB token expired, try refresh
                        error_log('DB token expired, attempting refresh');
                        $refreshResult = refreshAccessToken($tokens['google_refresh_token']);
                        if ($refreshResult && isset($refreshResult['access_token'])) {
                            $newAccessToken = $refreshResult['access_token'];
                            $newRefreshToken = $refreshResult['refresh_token'] ?? $tokens['google_refresh_token'];
                            $expiresIn = $refreshResult['expires_in'] ?? 3600;
                            $updateSuccess = storeGoogleTokens(
                                $_SESSION['agentaffilate_id'],
                                $newAccessToken,
                                $newRefreshToken,
                                $expiresIn,
                                $tokens['google_token_scope']
                            );
                            if ($updateSuccess) {
                                $_SESSION['google_access_token'] = $newAccessToken;
                                $_SESSION['google_refresh_token'] = $newRefreshToken;
                                $_SESSION['google_token_expires_at'] = date('Y-m-d H:i:s', time() + $expiresIn);
                                $accessToken = $newAccessToken;
                                error_log('Successfully refreshed DB token');
                            }
                        }
                    }
                } else {
                    error_log('No tokens found in database');
                }
            }
            if (!$accessToken) {
                error_log('Authentication failed - no access token');
                echo json_encode(array('success' => false, 'error' => 'Not authenticated with Google. Please reconnect your Google account.'));
                exit;
            }
            
            // Check if video file is uploaded with detailed error messages
            if (!isset($_FILES['video'])) {
                error_log('No video file in $_FILES');
                echo json_encode(array('success' => false, 'error' => 'No video file uploaded (FILES array missing)'));
                exit;
            }
            
            $videoFile = $_FILES['video'];
            
            if ($videoFile['error'] !== UPLOAD_ERR_OK) {
                $errorMessage = 'Upload error code: ' . $videoFile['error'];
                switch ($videoFile['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        $errorMessage = 'File too large (exceeds upload_max_filesize)';
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        $errorMessage = 'File too large (exceeds MAX_FILE_SIZE in form)';
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        $errorMessage = 'File was only partially uploaded';
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        $errorMessage = 'No file was uploaded';
                        break;
                    case UPLOAD_ERR_NO_TMP_DIR:
                        $errorMessage = 'Missing temporary folder';
                        break;
                    case UPLOAD_ERR_CANT_WRITE:
                        $errorMessage = 'Failed to write file to disk';
                        break;
                    case UPLOAD_ERR_EXTENSION:
                        $errorMessage = 'Upload stopped by PHP extension';
                        break;
                }
                error_log('Video upload error: ' . $errorMessage);
                echo json_encode(array('success' => false, 'error' => $errorMessage));
                exit;
            }
            
            // Additional file validation
            if ($videoFile['size'] == 0) {
                error_log('Video file is empty');
                echo json_encode(array('success' => false, 'error' => 'Video file is empty'));
                exit;
            }
            
            if (!file_exists($videoFile['tmp_name'])) {
                error_log('Video tmp file does not exist: ' . $videoFile['tmp_name']);
                echo json_encode(array('success' => false, 'error' => 'Uploaded file not found on server'));
                exit;
            }
            
            error_log('Video file validation passed. File: ' . $videoFile['name'] . ' (' . $videoFile['size'] . ' bytes)');
            
            $videoFile = $_FILES['video']['tmp_name'];
            $originalName = $_FILES['video']['name'];
            
            // Validate file size (YouTube allows up to 256GB, but let's limit to 100MB for testing)
            if ($_FILES['video']['size'] > 100 * 1024 * 1024) {
                error_log("File too large: " . $_FILES['video']['size'] . " bytes");
                echo json_encode(array('success' => false, 'error' => 'File too large. Maximum size is 100MB.'));
                exit;
            }
            
            // Log upload attempt
            error_log("Starting video upload for user: " . (isset($_SESSION['agentaffilate_id']) ? $_SESSION['agentaffilate_id'] : 'unknown'));
            error_log("Access token available: " . ($accessToken ? 'Yes' : 'No'));
            error_log("File details: " . $originalName . " (" . $_FILES['video']['size'] . " bytes)");
            
            // Create temporary file with proper extension
            $tempFile = tempnam(sys_get_temp_dir(), 'youtube_upload_');
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
            if ($extension) {
                $tempFile .= '.' . $extension;
            }
            rename($videoFile, $tempFile);
            
            // Use temporary title - will be updated after house data is saved
            $title = "House Tour - Processing";
            $description = "House tour video uploaded from HouseMadeEasy platform - metadata will be updated shortly";
            
            try {
                // Upload video to YouTube
                $result = uploadVideoToYouTube($accessToken, $tempFile, $title, $description);
                
                // Clean up temporary file
                unlink($tempFile);
                
                if ($result && isset($result['success']) && $result['success']) {
                    $videoId = $result['data']['id'];
                    
                    // Wait a moment for YouTube to process the video metadata
                    sleep(2);
                    
                    // Get the video link with retry logic
                    $videoLink = '';
                    $maxRetries = 3;
                    $retryCount = 0;
                    $linkStatus = 'processing';
                    
                    while (empty($videoLink) && $retryCount < $maxRetries) {
                        $linkResult = getVideoLink($accessToken, $videoId);
                        
                        if (is_string($linkResult)) {
                            $videoLink = $linkResult;
                            $linkStatus = 'available';
                        } elseif (is_array($linkResult) && isset($linkResult['url']) && $linkResult['url'] !== false) {
                            $videoLink = $linkResult['url'];
                            $linkStatus = 'available';
                        } elseif (is_array($linkResult) && isset($linkResult['status'])) {
                            // Video is processing
                            $linkStatus = $linkResult['status'];
                            if (isset($linkResult['message'])) {
                                error_log("Video processing status: " . $linkResult['message']);
                            }
                        }
                        
                        if (empty($videoLink)) {
                            $retryCount++;
                            if ($retryCount < $maxRetries) {
                                sleep(1); // Wait 1 second before retry
                            }
                        }
                    }
                    
                    // Prepare response based on video link availability
                    if (!empty($videoLink) && $linkStatus === 'available') {
                        echo json_encode(array(
                            'success' => true,
                            'video_id' => $videoId,
                            'youtube_url' => $videoLink,
                            'message' => 'Video uploaded successfully',
                            'status' => 'completed'
                        ));
                    } else {
                        // Video is still processing or link not yet available
                        echo json_encode(array(
                            'success' => true,
                            'video_id' => $videoId,
                            'youtube_url' => '',
                            'message' => 'Video uploaded successfully but still processing',
                            'status' => $linkStatus,
                            'note' => 'Video may take a few minutes to process. The link will be available once processing is complete.',
                            'can_check_status' => true
                        ));
                    }
                } else {
                    // Upload failed - provide detailed error information
                    $errorMessage = isset($result['error']) ? $result['error'] : 'Upload failed with unknown error';
                    error_log('YouTube upload failed: ' . $errorMessage);
                    
                    echo json_encode(array(
                        'success' => false, 
                        'error' => 'YouTube upload failed: ' . $errorMessage,
                        'debug_info' => array(
                            'error_details' => $errorMessage,
                            'video_file' => $originalName,
                            'file_size' => $_FILES['video']['size'],
                            'timestamp' => date('Y-m-d H:i:s')
                        )
                    ));
                }
            } catch (Exception $e) {
                unlink($tempFile);
                echo json_encode(array('success' => false, 'error' => $e->getMessage()));
            }
            break;
            
        case 'get_video_status':
            if (!isset($_SESSION['google_access_token']) || !isset($_POST['video_id'])) {
                echo json_encode(array('success' => false, 'error' => 'Missing required parameters'));
                exit;
            }
            
            $status = getVideoStatus($_SESSION['google_access_token'], $_POST['video_id']);
            if ($status) {
                echo json_encode(array('success' => true, 'status' => $status));
            } else {
                echo json_encode(array('success' => false, 'error' => 'Failed to get video status'));
            }
            break;
            
        case 'get_video_link':
            if (!isset($_SESSION['google_access_token']) || !isset($_POST['video_id'])) {
                echo json_encode(array('success' => false, 'error' => 'Missing required parameters'));
                exit;
            }
            
            $videoLink = getVideoLink($_SESSION['google_access_token'], $_POST['video_id']);
            if ($videoLink) {
                echo json_encode(array('success' => true, 'youtube_url' => $videoLink));
            } else {
                echo json_encode(array('success' => false, 'error' => 'Video not yet available'));
            }
            break;
            
        case 'check_token_status':
            if (!isset($_SESSION['agentaffilate_id'])) {
                echo json_encode(array('success' => false, 'error' => 'User not logged in'));
                exit;
            }
            
            $status = getDetailedTokenStatus($_SESSION['agentaffilate_id']);
            echo json_encode(array('success' => true, 'status' => $status));
            exit;
            
        case 'debug_upload':
            // Debug endpoint to test video upload
            $debug = array(
                'post_data' => $_POST,
                'files_data' => $_FILES,
                'session_data' => array(
                    'agentaffilate_id' => isset($_SESSION['agentaffilate_id']) ? $_SESSION['agentaffilate_id'] : 'not set',
                    'google_access_token' => isset($_SESSION['google_access_token']) ? 'present' : 'not set'
                ),
                'server_info' => array(
                    'upload_max_filesize' => ini_get('upload_max_filesize'),
                    'post_max_size' => ini_get('post_max_size'),
                    'max_execution_time' => ini_get('max_execution_time')
                )
            );
            
            if (isset($_FILES['video'])) {
                $debug['video_file_info'] = array(
                    'name' => $_FILES['video']['name'],
                    'type' => $_FILES['video']['type'],
                    'size' => $_FILES['video']['size'],
                    'error' => $_FILES['video']['error'],
                    'tmp_name' => $_FILES['video']['tmp_name'],
                    'file_exists' => file_exists($_FILES['video']['tmp_name'])
                );
            }
            
            echo json_encode(array('success' => true, 'debug' => $debug), JSON_PRETTY_PRINT);
            exit;
            
        default:
            echo json_encode(array('success' => false, 'error' => 'Invalid action'));
            break;
    }
} elseif (isset($_GET['code'])) {
    // Handle OAuth callback
    $code = $_GET['code'];
    $state = isset($_GET['state']) ? $_GET['state'] : 'upload-house.php'; // Get redirect target from state
    $tokenData = getAccessToken($code);
    
    $oauthSuccess = false;
    $databaseSaveSuccess = false;
    $errorMessage = '';
    
    if ($tokenData && isset($tokenData['access_token'])) {
        $oauthSuccess = true;
        $_SESSION['google_access_token'] = $tokenData['access_token'];
        if (isset($tokenData['refresh_token'])) {
            $_SESSION['google_refresh_token'] = $tokenData['refresh_token'];
        }
        
        // Store tokens in database if user is logged in
        if (isset($_SESSION['agentaffilate_id'])) {
            $scope = isset($tokenData['scope']) ? $tokenData['scope'] : YOUTUBE_UPLOAD_SCOPE;
            $expiresIn = isset($tokenData['expires_in']) ? $tokenData['expires_in'] : null;
            
            $databaseSaveSuccess = storeGoogleTokens(
                $_SESSION['agentaffilate_id'], 
                $tokenData['access_token'], 
                $tokenData['refresh_token'], 
                $expiresIn, 
                $scope
            );
            
            // Log the result for debugging
            if ($databaseSaveSuccess) {
                error_log("Google OAuth tokens saved successfully for user: " . $_SESSION['agentaffilate_id']);
            } else {
                error_log("Failed to save Google OAuth tokens for user: " . $_SESSION['agentaffilate_id'] . " - MySQL Error: " . mysqli_error($con));
                $errorMessage = 'database_save_failed';
            }
        } else {
            // User not logged in, can't save to database
            error_log("Google OAuth successful but user not logged in - cannot save tokens to database");
            $errorMessage = 'user_not_logged_in';
        }
        
        // Use state parameter for redirect (if it's safe)
        $redirectUrl = $state;
        if (strpos($redirectUrl, '://') !== false || strpos($redirectUrl, '..') !== false) {
            $redirectUrl = 'upload-house.php';
        }
        
        // Add detailed success/failure parameters
        $separator = strpos($redirectUrl, '?') !== false ? '&' : '?';
        $redirectParams = 'oauth=success&timestamp=' . time();
        
        if (isset($_SESSION['agentaffilate_id'])) {
            if ($databaseSaveSuccess) {
                $redirectParams .= '&db_save=success';
            } else {
                $redirectParams .= '&db_save=failed&error=' . $errorMessage;
            }
        } else {
            $redirectParams .= '&db_save=skipped&error=' . $errorMessage;
        }
        
        header('Location: ' . $redirectUrl . $separator . $redirectParams);
    } else {
        // OAuth failed
        error_log("Google OAuth failed - Token exchange unsuccessful");
        
        // Use state parameter for redirect (if it's safe)
        $redirectUrl = $state;
        if (strpos($redirectUrl, '://') !== false || strpos($redirectUrl, '..') !== false) {
            $redirectUrl = 'upload-house.php';
        }
        
        // Add error parameter
        $separator = strpos($redirectUrl, '?') !== false ? '&' : '?';
        header('Location: ' . $redirectUrl . $separator . 'oauth=failed&db_save=failed&error=token_exchange_failed&timestamp=' . time());
    }
    exit;
} elseif (isset($_GET['auth']) && $_GET['auth'] === 'logout') {
    // Handle logout
    unset($_SESSION['google_access_token']);
    unset($_SESSION['google_refresh_token']);
    
    // Also clear from database if user is logged in
    if (isset($_SESSION['agentaffilate_id'])) {
        global $con;
        $sql = "UPDATE hmeaffilate_user SET 
                google_access_token = NULL, 
                google_refresh_token = NULL, 
                google_token_expires_at = NULL, 
                google_token_scope = NULL
                WHERE agentaffilate_id = ?";
        
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $_SESSION['agentaffilate_id']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }
    
    header('Location: upload-house.php?logout=success');
} else {
    echo json_encode(array('success' => false, 'error' => 'Invalid request'));
}
?>
