<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

echo "<h1>✅ Clean Auth URL Test</h1>";

$clientId = '488890072316-a367l4n2ns3l17o0unoab7jp9t4mgd52.apps.googleusercontent.com';
$redirectUri = 'https://housemadeeasy.com.ng/hmeaffilate/callback.php';
$scope = 'https://www.googleapis.com/auth/youtube.upload https://www.googleapis.com/auth/youtube.readonly https://www.googleapis.com/auth/youtube.force-ssl';
$state = 'upload-house.php';

// Build the clean auth URL (same as in youtubeploaded.php)
$authUrl = 'https://accounts.google.com/o/oauth2/auth?' .
          'client_id=' . $clientId .
          '&redirect_uri=' . $redirectUri .
          '&scope=' . str_replace(' ', '%20', $scope) .
          '&response_type=code' .
          '&access_type=offline' .
          '&prompt=consent' .
          '&state=' . $state;

echo "<h2>🎯 Final Clean Auth URL:</h2>";
echo "<div style='background: #f5f5f5; padding: 15px; border-radius: 5px; margin: 10px 0;'>";
echo "<code style='word-break: break-all; font-size: 14px;'>" . htmlspecialchars($authUrl) . "</code>";
echo "</div>";

echo "<h2>🔍 URL Breakdown:</h2>";
echo "<ul>";
echo "<li><strong>Base URL:</strong> https://accounts.google.com/o/oauth2/auth</li>";
echo "<li><strong>Client ID:</strong> " . htmlspecialchars($clientId) . "</li>";
echo "<li><strong>Redirect URI:</strong> " . htmlspecialchars($redirectUri) . "</li>";
echo "<li><strong>Scope:</strong> " . htmlspecialchars(str_replace(' ', '%20', $scope)) . "</li>";
echo "<li><strong>Response Type:</strong> code</li>";
echo "<li><strong>Access Type:</strong> offline</li>";
echo "<li><strong>Prompt:</strong> consent</li>";
echo "<li><strong>State:</strong> " . htmlspecialchars($state) . "</li>";
echo "</ul>";

echo "<h2>🚀 Test the URL:</h2>";
echo "<p><a href='" . $authUrl . "' target='_blank' style='background: #4285f4; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;'>🔗 Test Google OAuth</a></p>";

echo "<h2>✨ What's Fixed:</h2>";
echo "<ul>";
echo "<li>✅ <strong>Clean URL:</strong> No messy double-encoding</li>";
echo "<li>✅ <strong>Proper Redirect:</strong> Uses page redirects instead of popups</li>";
echo "<li>✅ <strong>State Parameter:</strong> Correctly redirects back to upload page</li>";
echo "<li>✅ <strong>Error Handling:</strong> Proper success/error feedback</li>";
echo "<li>✅ <strong>Session Management:</strong> Tokens stored properly</li>";
echo "</ul>";

echo "<h2>🔄 Authentication Flow:</h2>";
echo "<ol>";
echo "<li>User clicks 'Connect to Google'</li>";
echo "<li>Redirects to Google OAuth page</li>";
echo "<li>User authenticates with Google</li>";
echo "<li>Google redirects back to callback.php</li>";
echo "<li>Callback processes authentication</li>";
echo "<li>Redirects to upload page with success status</li>";
echo "<li>UI updates to show authenticated state</li>";
echo "</ol>";
?>