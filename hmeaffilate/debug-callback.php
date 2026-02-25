<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include ('inc/connect.inc.php');

// Load environment variables
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Configuration
define('GOOGLE_CLIENT_ID', $_ENV['GOOGLE_CLIENT_ID']);
define('GOOGLE_CLIENT_SECRET', $_ENV['GOOGLE_CLIENT_SECRET']);
define('CALLBACK_URL', $_ENV['CALLBACK_URL']);
define('GOOGLE_REDIRECT_URI', CALLBACK_URL);

echo "<h1>🔍 OAuth Debug - Token Exchange</h1>";

if (isset($_GET['code'])) {
    echo "<div style='background: #e8f5e8; padding: 15px; margin: 10px 0; border-radius: 5px;'>";
    echo "<h3>✅ OAuth Code Received:</h3>";
    echo "<p><strong>Code:</strong> " . htmlspecialchars($_GET['code']) . "</p>";
    echo "<p><strong>State:</strong> " . htmlspecialchars($_GET['state'] ?? 'none') . "</p>";
    echo "<p><strong>Scope:</strong> " . htmlspecialchars($_GET['scope'] ?? 'none') . "</p>";
    echo "</div>";

    $code = $_GET['code'];
    $state = isset($_GET['state']) ? $_GET['state'] : 'upload-house.php';
    
    echo "<div style='background: #fff3cd; padding: 15px; margin: 10px 0; border-radius: 5px;'>";
    echo "<h3>🔄 Token Exchange Debug:</h3>";
    
    // Prepare token exchange request
    $data = array(
        'code' => $code,
        'client_id' => GOOGLE_CLIENT_ID,
        'client_secret' => GOOGLE_CLIENT_SECRET,
        'redirect_uri' => GOOGLE_REDIRECT_URI,
        'grant_type' => 'authorization_code'
    );
    
    echo "<p><strong>Request Data:</strong></p>";
    echo "<ul>";
    echo "<li>Client ID: " . htmlspecialchars(GOOGLE_CLIENT_ID) . "</li>";
    echo "<li>Redirect URI: " . htmlspecialchars(GOOGLE_REDIRECT_URI) . "</li>";
    echo "<li>Grant Type: authorization_code</li>";
    echo "</ul>";
    
    echo "<p><strong>Making token request...</strong></p>";
    
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
        echo "<div style='background: #f8d7da; padding: 15px; border-radius: 5px;'>";
        echo "<h4>❌ Token Exchange Failed:</h4>";
        echo "<p>Could not connect to Google OAuth server</p>";
        echo "<p><strong>Error:</strong> " . error_get_last()['message'] . "</p>";
        echo "</div>";
    } else {
        echo "<div style='background: #d1ecf1; padding: 15px; border-radius: 5px;'>";
        echo "<h4>📡 Google Response:</h4>";
        echo "<pre style='background: #f8f9fa; padding: 10px; border-radius: 3px; font-size: 12px;'>" . htmlspecialchars($result) . "</pre>";
        
        $tokenData = json_decode($result, true);
        
        if ($tokenData && isset($tokenData['access_token'])) {
            echo "<div style='background: #d4edda; padding: 15px; border-radius: 5px;'>";
            echo "<h4>✅ Success! Token Received:</h4>";
            echo "<p><strong>Access Token:</strong> " . substr($tokenData['access_token'], 0, 20) . "...</p>";
            echo "<p><strong>Token Type:</strong> " . htmlspecialchars($tokenData['token_type']) . "</p>";
            echo "<p><strong>Expires In:</strong> " . htmlspecialchars($tokenData['expires_in']) . " seconds</p>";
            if (isset($tokenData['refresh_token'])) {
                echo "<p><strong>Refresh Token:</strong> " . substr($tokenData['refresh_token'], 0, 20) . "...</p>";
            }
            echo "</div>";
            
            // Save tokens
            $_SESSION['google_access_token'] = $tokenData['access_token'];
            if (isset($tokenData['refresh_token'])) {
                $_SESSION['google_refresh_token'] = $tokenData['refresh_token'];
            }
            
            echo "<div style='background: #d4edda; padding: 15px; border-radius: 5px;'>";
            echo "<h4>💾 Token Storage:</h4>";
            echo "<p>✅ Saved to session</p>";
            
            if (isset($_SESSION['agentaffilate_id'])) {
                echo "<p>✅ User logged in - will save to database</p>";
                echo "<p><strong>User ID:</strong> " . $_SESSION['agentaffilate_id'] . "</p>";
            } else {
                echo "<p>⚠️  User not logged in - will NOT save to database</p>";
                echo "<p><strong>Session agentaffilate_id:</strong> " . ($_SESSION['agentaffilate_id'] ?? 'not set') . "</p>";
            }
            echo "</div>";
            
            // Redirect to success
            $separator = strpos($state, '?') !== false ? '&' : '?';
            $redirectUrl = $state . $separator . 'auth=success&timestamp=' . time();
            
            echo "<div style='background: #c3e6cb; padding: 15px; border-radius: 5px;'>";
            echo "<h4>🔄 Redirecting to:</h4>";
            echo "<p>" . htmlspecialchars($redirectUrl) . "</p>";
            echo "<p><a href='" . htmlspecialchars($redirectUrl) . "' style='background: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Continue to App</a></p>";
            echo "</div>";
            
        } else {
            echo "<div style='background: #f8d7da; padding: 15px; border-radius: 5px;'>";
            echo "<h4>❌ Token Exchange Failed:</h4>";
            echo "<p><strong>Error:</strong> " . htmlspecialchars($tokenData['error'] ?? 'Unknown error') . "</p>";
            if (isset($tokenData['error_description'])) {
                echo "<p><strong>Description:</strong> " . htmlspecialchars($tokenData['error_description']) . "</p>";
            }
            echo "</div>";
            
            // Redirect to error
            $separator = strpos($state, '?') !== false ? '&' : '?';
            $redirectUrl = $state . $separator . 'auth=error&timestamp=' . time();
            
            echo "<div style='background: #f8d7da; padding: 15px; border-radius: 5px;'>";
            echo "<h4>🔄 Redirecting to:</h4>";
            echo "<p>" . htmlspecialchars($redirectUrl) . "</p>";
            echo "<p><a href='" . htmlspecialchars($redirectUrl) . "' style='background: #dc3545; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Continue to App</a></p>";
            echo "</div>";
        }
        echo "</div>";
    }
    echo "</div>";
    
} else {
    echo "<div style='background: #f8d7da; padding: 15px; border-radius: 5px;'>";
    echo "<h3>❌ No OAuth Code Received</h3>";
    echo "<p>This page expects an OAuth code parameter.</p>";
    echo "<p><strong>URL should look like:</strong> callback.php?code=AUTH_CODE&state=upload-house.php</p>";
    echo "</div>";
}

echo "<div style='background: #e2e3e5; padding: 15px; margin: 20px 0; border-radius: 5px;'>";
echo "<h3>🛠️  Troubleshooting Tips:</h3>";
echo "<ul>";
echo "<li><strong>Check Redirect URI:</strong> Must match exactly in Google Console</li>";
echo "<li><strong>Check Client ID:</strong> Must be correct</li>";
echo "<li><strong>Check Client Secret:</strong> Must be correct</li>";
echo "<li><strong>Check Code:</strong> Must not be expired (usually 10 minutes)</li>";
echo "<li><strong>Check User Login:</strong> Must be logged in to save to database</li>";
echo "</ul>";
echo "</div>";
?>