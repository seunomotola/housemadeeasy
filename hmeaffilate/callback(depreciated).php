<?php
session_start();
header('Content-Type: application/json');

// Load environment variables
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Configuration
define('GOOGLE_CLIENT_ID', $_ENV['GOOGLE_CLIENT_ID']);
define('GOOGLE_CLIENT_SECRET', $_ENV['GOOGLE_CLIENT_SECRET']);
define('CALLBACK_URL', $_ENV['CALLBACK_URL']);
define('GOOGLE_REDIRECT_URI', CALLBACK_URL);

// YouTube API scopes
define('YOUTUBE_UPLOAD_SCOPE', 'https://www.googleapis.com/auth/youtube.upload');

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

function uploadVideoToYouTube($accessToken, $videoFile, $title, $description = '') {
    // Create multipart body for video upload
    $boundary = uniqid();
    $delimiter = "--$boundary";
    $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($fileInfo, $videoFile);
    finfo_close($fileInfo);
    
    $fileContent = file_get_contents($videoFile);
    $fileSize = filesize($videoFile);
    
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
    
    $headers = array(
        "Authorization: Bearer $accessToken",
        "Content-Type: multipart/related; boundary=$boundary",
        "Content-Length: " . strlen($body)
    );
    
    $context = stream_context_create(array(
        'http' => array(
            'method' => 'POST',
            'header' => implode("\r\n", $headers),
            'content' => $body
        )
    ));
    
    $response = file_get_contents('https://www.googleapis.com/upload/youtube/v3/videos?part=snippet,status&uploadType=multipart', false, $context);
    
    if ($response === FALSE) {
        return false;
    }
    
    return json_decode($response, true);
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
    $context = stream_context_create(array(
        'http' => array(
            'method' => 'GET',
            'header' => "Authorization: Bearer $accessToken"
        )
    ));
    
    $response = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=snippet,status&id=$videoId", false, $context);
    
    if ($response === FALSE) {
        return false;
    }
    
    $data = json_decode($response, true);
    if (isset($data['items'][0])) {
        $video = $data['items'][0];
        if ($video['status']['privacyStatus'] === 'public' || $video['status']['privacyStatus'] === 'unlisted') {
            return "https://www.youtube.com/watch?v=" . $videoId;
        }
    }
    
    return false;
}

// Handle different actions
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'upload_to_youtube':
            // Check if user is authenticated
            if (!isset($_SESSION['google_access_token'])) {
                echo json_encode(array('success' => false, 'error' => 'Not authenticated with Google'));
                exit;
            }
            
            // Check if video file is uploaded
            if (!isset($_FILES['video']) || $_FILES['video']['error'] !== UPLOAD_ERR_OK) {
                echo json_encode(array('success' => false, 'error' => 'No video file uploaded'));
                exit;
            }
            
            $videoFile = $_FILES['video']['tmp_name'];
            $originalName = $_FILES['video']['name'];
            
            // Validate file size (YouTube allows up to 256GB, but let's limit to 100MB for testing)
            if ($_FILES['video']['size'] > 100 * 1024 * 1024) {
                echo json_encode(array('success' => false, 'error' => 'File too large. Maximum size is 100MB.'));
                exit;
            }
            
            // Create temporary file with proper extension
            $tempFile = tempnam(sys_get_temp_dir(), 'youtube_upload_');
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
            if ($extension) {
                $tempFile .= '.' . $extension;
            }
            rename($videoFile, $tempFile);
            
            // Generate title from filename
            $title = pathinfo($originalName, PATHINFO_FILENAME);
            $description = "House tour video uploaded from HouseMadeEasy platform";
            
            try {
                // Upload video to YouTube
                $result = uploadVideoToYouTube($_SESSION['google_access_token'], $tempFile, $title, $description);
                
                // Clean up temporary file
                unlink($tempFile);
                
                if ($result && isset($result['id'])) {
                    $videoId = $result['id'];
                    
                    // Get the video link
                    $videoLink = getVideoLink($_SESSION['google_access_token'], $videoId);
                    
                    if ($videoLink) {
                        echo json_encode(array(
                            'success' => true,
                            'video_id' => $videoId,
                            'youtube_url' => $videoLink
                        ));
                    } else {
                        echo json_encode(array(
                            'success' => true,
                            'video_id' => $videoId,
                            'youtube_url' => '',
                            'message' => 'Video uploaded successfully but not yet processed'
                        ));
                    }
                } else {
                    echo json_encode(array('success' => false, 'error' => 'Upload failed'));
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
            
        default:
            echo json_encode(array('success' => false, 'error' => 'Invalid action'));
            break;
    }
} elseif (isset($_GET['code'])) {
    // Handle OAuth callback
    $code = $_GET['code'];
    $tokenData = getAccessToken($code);
    
    if ($tokenData && isset($tokenData['access_token'])) {
        $_SESSION['google_access_token'] = $tokenData['access_token'];
        $_SESSION['google_refresh_token'] = $tokenData['refresh_token'];
        
        // Redirect back to upload page
        header('Location: upload-house-video.php?auth=success');
    } else {
        header('Location: upload-house-video.php?auth=error');
    }
} elseif (isset($_GET['auth']) && $_GET['auth'] === 'logout') {
    // Handle logout
    unset($_SESSION['google_access_token']);
    unset($_SESSION['google_refresh_token']);
    header('Location: upload-house-video.php?logout=success');
} else {
    echo json_encode(array('success' => false, 'error' => 'Invalid request'));
}
?>