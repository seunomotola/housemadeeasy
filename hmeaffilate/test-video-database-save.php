<?php
session_start();
include 'inc/connect.inc.php';

// Test function to simulate video upload and database saving
function testVideoDatabaseSave() {
    global $con;
    
    // Check if we have a user session (simulate logged in user)
    if (!isset($_SESSION['agentaffilate_id'])) {
        echo json_encode(array('success' => false, 'error' => 'User not logged in. Set $_SESSION["agentaffilate_id"] to test.'));
        return;
    }
    
    // Simulate video upload data
    $videoId = 'test_video_' . time();
    $videoUrl = 'https://www.youtube.com/watch?v=' . $videoId;
    $title = 'Test House Tour Video';
    $description = 'This is a test video upload for HouseMadeEasy platform';
    $originalFilename = 'test_video.mp4';
    
    // Save video information to database
    $databaseRecordId = saveYouTubeVideo(
        $_SESSION['agentaffilate_id'], 
        $videoId, 
        $videoUrl, 
        $title, 
        $description, 
        $originalFilename
    );
    
    if ($databaseRecordId) {
        echo json_encode(array(
            'success' => true,
            'message' => 'Video information saved to database successfully',
            'database_record_id' => $databaseRecordId,
            'video_data' => array(
                'youtube_video_id' => $videoId,
                'youtube_url' => $videoUrl,
                'title' => $title,
                'description' => $description,
                'original_filename' => $originalFilename
            )
        ));
    } else {
        echo json_encode(array('success' => false, 'error' => 'Failed to save video information to database'));
    }
}

// Test function to check what videos are saved in database for current user
function testGetUserVideos() {
    global $con;
    
    if (!isset($_SESSION['agentaffilate_id'])) {
        echo json_encode(array('success' => false, 'error' => 'User not logged in'));
        return;
    }
    
    $userId = $_SESSION['agentaffilate_id'];
    
    $sql = "SELECT * FROM youtube_videos WHERE agentaffilate_id = ? ORDER BY created_at DESC";
    $stmt = mysqli_prepare($con, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        $videos = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $videos[] = $row;
        }
        
        mysqli_stmt_close($stmt);
        
        echo json_encode(array(
            'success' => true,
            'user_id' => $userId,
            'total_videos' => count($videos),
            'videos' => $videos
        ));
    } else {
        echo json_encode(array('success' => false, 'error' => 'Database query failed'));
    }
}

// Handle different test actions
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'simulate_upload':
            testVideoDatabaseSave();
            break;
            
        case 'get_user_videos':
            testGetUserVideos();
            break;
            
        default:
            echo json_encode(array('success' => false, 'error' => 'Invalid test action'));
            break;
    }
} else {
    // Display test interface
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Test YouTube Video Database Save</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                max-width: 800px;
                margin: 50px auto;
                padding: 20px;
                background-color: #f5f5f5;
            }
            .container {
                background: white;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }
            h1 {
                color: #333;
                border-bottom: 2px solid #4CAF50;
                padding-bottom: 10px;
            }
            .test-section {
                margin: 20px 0;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 5px;
            }
            .test-section h3 {
                margin-top: 0;
                color: #555;
            }
            button {
                background-color: #4CAF50;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                margin: 5px;
            }
            button:hover {
                background-color: #45a049;
            }
            .result {
                margin-top: 20px;
                padding: 15px;
                border-radius: 5px;
                font-family: monospace;
                white-space: pre-wrap;
            }
            .success {
                background-color: #d4edda;
                border: 1px solid #c3e6cb;
                color: #155724;
            }
            .error {
                background-color: #f8d7da;
                border: 1px solid #f5c6cb;
                color: #721c24;
            }
            .info {
                background-color: #d1ecf1;
                border: 1px solid #bee5eb;
                color: #0c5460;
            }
            .warning {
                background-color: #fff3cd;
                border: 1px solid #ffeaa7;
                color: #856404;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Test YouTube Video Database Save</h1>
            
            <div class="info">
                <strong>Current Session Status:</strong><br>
                <?php
                if (isset($_SESSION['agentaffilate_id'])) {
                    echo "✅ User logged in with ID: " . $_SESSION['agentaffilate_id'];
                } else {
                    echo "❌ User not logged in. To test, set session manually:";
                    echo "<br><code>\$_SESSION['agentaffilate_id'] = 'your_user_id';</code>";
                }
                ?>
            </div>
            
            <div class="test-section">
                <h3>🔄 Simulate Video Upload</h3>
                <p>This test simulates a successful video upload and saves the information to the database.</p>
                <button onclick="runTest('simulate_upload')">Simulate Video Upload</button>
            </div>
            
            <div class="test-section">
                <h3>📋 View User's Videos</h3>
                <p>Check what video information has been saved to the database for the current user.</p>
                <button onclick="runTest('get_user_videos')">Get User Videos</button>
            </div>
            
            <div id="test-result" class="result" style="display:none;"></div>
        </div>

        <script>
            function runTest(action) {
                const resultDiv = document.getElementById('test-result');
                resultDiv.style.display = 'block';
                resultDiv.className = 'result info';
                resultDiv.textContent = 'Running test...';
                
                fetch(`?action=${action}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            resultDiv.className = 'result success';
                            resultDiv.textContent = 'SUCCESS:\\n' + JSON.stringify(data, null, 2);
                        } else {
                            resultDiv.className = 'result error';
                            resultDiv.textContent = 'ERROR:\\n' + JSON.stringify(data, null, 2);
                        }
                    })
                    .catch(error => {
                        resultDiv.className = 'result error';
                        resultDiv.textContent = 'FETCH ERROR:\\n' + error.message;
                    });
            }
            
            // Check if user needs to set session
            <?php if (!isset($_SESSION['agentaffilate_id'])): ?>
            if (confirm('Would you like to set a test session? This will help test the database functionality.')) {
                const testUserId = prompt('Enter a test user ID (e.g., "test_user_123"):', 'test_user_123');
                if (testUserId) {
                    // Set session via a simple form submission
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = window.location.href;
                    
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'set_session';
                    input.value = testUserId;
                    
                    form.appendChild(input);
                    document.body.appendChild(form);
                    form.submit();
                }
            }
            <?php endif; ?>
        </script>
    </body>
    </html>
    <?php
}

// Handle session setting
if (isset($_POST['set_session'])) {
    $_SESSION['agentaffilate_id'] = $_POST['set_session'];
    echo "<script>alert('Session set successfully! User ID: " . $_SESSION['agentaffilate_id'] . "'); window.location.href = window.location.href;</script>";
}
?>