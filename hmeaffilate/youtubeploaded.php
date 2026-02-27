<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);

session_start();
header('Content-Type: application/json');
include("../inc/session.php");
include("../inc/connect.inc.php");
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
/**
 * Check if stored token is still valid
 */
/**
 * Get a valid access token, refreshing if necessary
 */
function getValidAccessToken($agentaffilate_id = null) {
    global $con;
    // First check session
    if (isset($_SESSION['google_access_token']) && isset($_SESSION['google_token_expires_at'])) {
        if (isTokenValid($_SESSION['google_token_expires_at'])) {
            return $_SESSION['google_access_token'];
        } elseif (isset($_SESSION['google_refresh_token'])) {
            // Try to refresh
            $refreshResult = refreshAccessToken($_SESSION['google_refresh_token']);
            if ($refreshResult && isset($refreshResult['access_token'])) {
                $newAccessToken = $refreshResult['access_token'];
                $newRefreshToken = $refreshResult['refresh_token'] ?? $_SESSION['google_refresh_token'];
                $expiresIn = $refreshResult['expires_in'] ?? 3600;
                // Update session
                $_SESSION['google_access_token'] = $newAccessToken;
                $_SESSION['google_refresh_token'] = $newRefreshToken;
                $_SESSION['google_token_expires_at'] = date('Y-m-d H:i:s', time() + $expiresIn);
                // Update database if user ID provided
                if ($agentaffilate_id) {
                    storeGoogleTokens(
                        $agentaffilate_id,
                        $newAccessToken,
                        $newRefreshToken,
                        $expiresIn,
                        $_SESSION['google_token_scope'] ?? null
                    );
                }
                return $newAccessToken;
            }
        }
    }
    // If not in session or refresh failed, try database
    if ($agentaffilate_id) {
        $tokens = getGoogleTokens($agentaffilate_id);
        if ($tokens && isTokenValid($tokens['google_token_expires_at'])) {
            // Load into session
            $_SESSION['google_access_token'] = $tokens['google_access_token'];
            $_SESSION['google_refresh_token'] = $tokens['google_refresh_token'];
            $_SESSION['google_token_expires_at'] = $tokens['google_token_expires_at'];
            $_SESSION['google_token_scope'] = $tokens['google_token_scope'];
            return $tokens['google_access_token'];
        } elseif ($tokens && $tokens['google_refresh_token']) {
            // Try to refresh from DB
            $refreshResult = refreshAccessToken($tokens['google_refresh_token']);
            if ($refreshResult && isset($refreshResult['access_token'])) {
                $newAccessToken = $refreshResult['access_token'];
                $newRefreshToken = $refreshResult['refresh_token'] ?? $tokens['google_refresh_token'];
                $expiresIn = $refreshResult['expires_in'] ?? 3600;
                // Update session
                $_SESSION['google_access_token'] = $newAccessToken;
                $_SESSION['google_refresh_token'] = $newRefreshToken;
                $_SESSION['google_token_expires_at'] = date('Y-m-d H:i:s', time() + $expiresIn);
                // Update database
                storeGoogleTokens(
                    $agentaffilate_id,
                    $newAccessToken,
                    $newRefreshToken,
                    $expiresIn,
                    $tokens['google_token_scope']
                );
                return $newAccessToken;
            }
        }
    }
    return false; // No valid token available
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
function getAccessToken($code) {
    $data = array(
        'code' => $code,
        'client_id' => GOOGLE_CLIENT_ID,
        'client_secret' => GOOGLE_CLIENT_SECRET,
        'redirect_uri' => GOOGLE_REDIRECT_URI,
        'grant_type' => 'authorization_code'
    );
    
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    
    $context = stream_context_create($options);
    $result = file_get_contents('https://oauth2.googleapis.com/token', false, $context);
    
    if ($result === FALSE) {
        return false;
    }
    
    return json_decode($result, true);
}
function getVideoDetails($accessToken, $videoId) {
    $context = stream_context_create(array(
        'http' => array(
            'method' => 'GET',
            'header' => "Authorization: Bearer $accessToken"
        )
    ));
    
    $response = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=snippet,status,processingDetails&id=$videoId", false, $context);
    
    if ($response === FALSE) {
        return false;
    }
    
    return json_decode($response, true);
}
function getVideoEmbedUrl($videoId) {
    return "https://www.youtube.com/embed/" . $videoId;
}
function getVideoThumbnail($videoId, $quality = 'maxresdefault') {
    return "https://img.youtube.com/vi/$videoId/$quality.jpg";
}
// Handle different requests
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'auth_url':
            $params = [
                'client_id'     => GOOGLE_CLIENT_ID,
                'redirect_uri'  => GOOGLE_REDIRECT_URI,
                'response_type' => 'code',
                'scope'         => implode(' ', [
                    'https://www.googleapis.com/auth/youtube.upload',
                    'https://www.googleapis.com/auth/youtube.readonly',
                    'https://www.googleapis.com/auth/youtube.force-ssl'
                ]),
                'access_type'   => 'offline',
                'prompt'        => 'consent',
                'state'         => $_GET['redirect'] ?? 'upload-house.php'
            ];
            $authUrl = 'https://accounts.google.com/o/oauth2/auth?' . http_build_query($params);
            header('Location: ' . $authUrl);
            exit;
            break;
            
        case 'check_auth':
            // Check if user is authenticated and token is valid
            $isAuthenticated = false;
            $accessToken = null;
            if (isset($_SESSION['google_access_token']) && isset($_SESSION['google_token_expires_at'])) {
                if (isTokenValid($_SESSION['google_token_expires_at'])) {
                    $isAuthenticated = true;
                    $accessToken = $_SESSION['google_access_token'];
                } elseif (isset($_SESSION['google_refresh_token'])) {
                    // Try to refresh expired token
                    $refreshResult = refreshAccessToken($_SESSION['google_refresh_token']);
                    if ($refreshResult && isset($refreshResult['access_token'])) {
                        $newAccessToken = $refreshResult['access_token'];
                        $newRefreshToken = $refreshResult['refresh_token'] ?? $_SESSION['google_refresh_token'];
                        $expiresIn = $refreshResult['expires_in'] ?? 3600;
                        // Update database if user logged in
                        if (isset($_SESSION['agentaffilate_id'])) {
                            $updateSuccess = storeGoogleTokens(
                                $_SESSION['agentaffilate_id'],
                                $newAccessToken,
                                $newRefreshToken,
                                $expiresIn,
                                $_SESSION['google_token_scope'] ?? null
                            );
                            if ($updateSuccess) {
                                $_SESSION['google_access_token'] = $newAccessToken;
                                $_SESSION['google_refresh_token'] = $newRefreshToken;
                                $_SESSION['google_token_expires_at'] = date('Y-m-d H:i:s', time() + $expiresIn);
                            }
                        } else {
                            // Just update session
                            $_SESSION['google_access_token'] = $newAccessToken;
                            $_SESSION['google_refresh_token'] = $newRefreshToken;
                            $_SESSION['google_token_expires_at'] = date('Y-m-d H:i:s', time() + $expiresIn);
                        }
                        $isAuthenticated = true;
                        $accessToken = $newAccessToken;
                    }
                }
            }
            echo json_encode(array(
                'success' => true,
                'authenticated' => $isAuthenticated,
                'access_token' => $accessToken
            ));
            break;
            
        case 'get_video_info':
            if (!isset($_GET['video_id'])) {
                echo json_encode(array('success' => false, 'error' => 'Video ID is required'));
                break;
            }
            
            $videoId = $_GET['video_id'];
            
            // Check if we have a valid access token
            if (!isset($_SESSION['google_access_token'])) {
                echo json_encode(array('success' => false, 'error' => 'Not authenticated with Google'));
                break;
            }
            
            $videoDetails = getVideoDetails($_SESSION['google_access_token'], $videoId);
            
            if ($videoDetails && isset($videoDetails['items'][0])) {
                $video = $videoDetails['items'][0];
                
                $result = array(
                    'success' => true,
                    'video_id' => $videoId,
                    'title' => $video['snippet']['title'],
                    'description' => $video['snippet']['description'],
                    'thumbnail' => getVideoThumbnail($videoId),
                    'embed_url' => getVideoEmbedUrl($videoId),
                    'status' => $video['status']['privacyStatus'],
                    'processing_status' => isset($video['processingDetails']['processingStatus']) ? $video['processingDetails']['processingStatus'] : 'complete',
                    'upload_date' => $video['snippet']['publishedAt']
                );
                
                // Generate YouTube URL if video is public or unlisted
                if ($video['status']['privacyStatus'] === 'public' || $video['status']['privacyStatus'] === 'unlisted') {
                    $result['youtube_url'] = "https://www.youtube.com/watch?v=$videoId";
                }
                
                echo json_encode($result);
            } else {
                echo json_encode(array('success' => false, 'error' => 'Video not found or not accessible'));
            }
            break;
            
        case 'list_my_videos':
            if (!isset($_SESSION['google_access_token'])) {
                echo json_encode(array('success' => false, 'error' => 'Not authenticated with Google'));
                break;
            }
            
            // Get user's uploaded videos
            $context = stream_context_create(array(
                'http' => array(
                    'method' => 'GET',
                    'header' => "Authorization: Bearer " . $_SESSION['google_access_token']
                )
            ));
            
            $response = file_get_contents("https://www.googleapis.com/youtube/v3/search?part=snippet&forMine=true&type=video&order=date&maxResults=50", false, $context);
            
            if ($response === FALSE) {
                echo json_encode(array('success' => false, 'error' => 'Failed to fetch videos'));
                break;
            }
            
            $data = json_decode($response, true);
            
            if (isset($data['items'])) {
                $videos = array();
                foreach ($data['items'] as $item) {
                    $videos[] = array(
                        'video_id' => $item['id']['videoId'],
                        'title' => $item['snippet']['title'],
                        'description' => $item['snippet']['description'],
                        'thumbnail' => getVideoThumbnail($item['id']['videoId']),
                        'upload_date' => $item['snippet']['publishedAt'],
                        'youtube_url' => "https://www.youtube.com/watch?v=" . $item['id']['videoId']
                    );
                }
                
                echo json_encode(array('success' => true, 'videos' => $videos));
            } else {
                echo json_encode(array('success' => true, 'videos' => array()));
            }
            break;
            
        case 'update_video_status':
            if (!isset($_SESSION['google_access_token'])) {
                echo json_encode(array('success' => false, 'error' => 'Not authenticated with Google'));
                break;
            }
            
            if (!isset($_POST['video_id']) || !isset($_POST['status'])) {
                echo json_encode(array('success' => false, 'error' => 'Video ID and status are required'));
                break;
            }
            
            $videoId = $_POST['video_id'];
            $status = $_POST['status']; // 'public', 'private', or 'unlisted'
            
            // Validate status
            if (!in_array($status, array('public', 'private', 'unlisted'))) {
                echo json_encode(array('success' => false, 'error' => 'Invalid status'));
                break;
            }
            
            // Update video status
            $data = array(
                'status' => array(
                    'privacyStatus' => $status
                )
            );
            
            $headers = array(
                "Authorization: Bearer " . $_SESSION['google_access_token'],
                "Content-Type: application/json"
            );
            
            $context = stream_context_create(array(
                'http' => array(
                    'method' => 'PUT',
                    'header' => implode("\r\n", $headers),
                    'content' => json_encode($data)
                )
            ));
            
            $response = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=status&id=$videoId", false, $context);
            
            if ($response === FALSE) {
                echo json_encode(array('success' => false, 'error' => 'Failed to update video status'));
            } else {
                echo json_encode(array('success' => true, 'message' => 'Video status updated successfully'));
            }
            break;
            
        default:
            echo json_encode(array('success' => false, 'error' => 'Invalid action'));
            break;
    }
} elseif (isset($_GET['callback'])) {
    // Handle OAuth callback - This endpoint is now deprecated in favor of direct redirects
    // Users should be redirected directly to callback.php
    http_response_code(404);
    echo "This endpoint has been deprecated. Please use the direct OAuth flow.";
    exit;
} else {
    // Default response for GET requests without action
    echo json_encode(array(
        'success' => true,
        'message' => 'YouTube Uploaded Videos API',
        'endpoints' => array(
            'auth_url' => '?action=auth_url',
            'get_video_info' => '?action=get_video_info&video_id=VIDEO_ID',
            'list_my_videos' => '?action=list_my_videos',
            'update_video_status' => '?action=update_video_status (POST: video_id, status)'
        )
    ));
}
?>
