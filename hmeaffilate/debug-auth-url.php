<?php
// Load environment variables
require __DIR__ . '/../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();
// Test the auth URL generation
session_start();
header('Content-Type: text/html; charset=utf-8');
echo "<h1>Auth URL Debug Test</h1>";
$client_id = $_ENV['GOOGLE_CLIENT_ID'];
$redirect_uri = $_ENV['CALLBACK_URL'];
$scope = 'https://www.googleapis.com/auth/youtube.upload https://www.googleapis.com/auth/youtube.readonly https://www.googleapis.com/auth/youtube.force-ssl';
$state = 'upload-house.php';
// Build the URL manually (same as in youtubeploaded.php)
$authUrl = 'https://accounts.google.com/o/oauth2/auth?' . 
          'client_id=' . urlencode($client_id) .
          '&redirect_uri=' . urlencode($redirect_uri) .
          '&scope=' . urlencode($scope) .
          '&response_type=code' .
          '&access_type=offline' .
          '&prompt=consent' .
          '&state=' . urlencode($state);
echo "<h2>Generated Auth URL:</h2>";
echo "<p><strong>Raw URL:</strong></p>";
echo "<textarea style='width:100%; height:100px;'>" . $authUrl . "</textarea>";
echo "<p><strong>URL Decoded (for readability):</strong></p>";
echo "<textarea style='width:100%; height:100px;'>" . urldecode($authUrl) . "</textarea>";
echo "<h2>Test Links:</h2>";
echo "<p><a href='" . $authUrl . "' target='_blank'>🔗 Test Auth URL (opens in new tab)</a></p>";
echo "<h2>URL Analysis:</h2>";
echo "<ul>";
echo "<li><strong>Client ID:</strong> " . urlencode($client_id) . "</li>";
echo "<li><strong>Redirect URI:</strong> " . urlencode($redirect_uri) . "</li>";
echo "<li><strong>Scope:</strong> " . urlencode($scope) . "</li>";
echo "<li><strong>State:</strong> " . urlencode($state) . "</li>";
echo "</ul>";
echo "<h2>Compare with old method:</h2>";
$params = array(
    'client_id' => $client_id,
    'redirect_uri' => $redirect_uri,
    'scope' => $scope,
    'response_type' => 'code',
    'access_type' => 'offline',
    'prompt' => 'consent',
    'state' => $state
);
$oldUrl = 'https://accounts.google.com/o/oauth2/auth?' . http_build_query($params);
echo "<p><strong>Old method (http_build_query):</strong></p>";
echo "<textarea style='width:100%; height:100px;'>" . $oldUrl . "</textarea>";
echo "<p><strong>Difference:</strong></p>";
echo "<p>✅ <strong>New method:</strong> Clean, properly encoded URL</p>";
echo "<p>❌ <strong>Old method:</strong> Double-encoded, messy URL</p>";
?>
