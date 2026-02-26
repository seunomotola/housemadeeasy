<?php
/**
 * Test script to verify callback.php provides proper feedback about token storage
 * This simulates what happens when Google redirects back with OAuth tokens
 */
// Simulate session data
session_start();
$_SESSION['agentaffilate_id'] = 'test_user_123'; // Simulate logged-in user
// Include the callback file to test the functions
include('callback.php');
echo "<h2>Google OAuth Callback Test</h2>";
echo "<p>This test verifies that the callback.php provides proper feedback about token storage.</p>";
// Test 1: Check if user exists and can store tokens
echo "<h3>Test 1: Database Connection and User Check</h3>";
// This would normally be done by Google, but we'll test our token storage function
echo "<p><strong>Test User ID:</strong> " . $_SESSION['agentaffilate_id'] . "</p>";
// Check if we can get token status
if (function_exists('getDetailedTokenStatus')) {
    echo "<p>✓ getDetailedTokenStatus function exists</p>";
    
    $status = getDetailedTokenStatus($_SESSION['agentaffilate_id']);
    if (isset($status['error'])) {
        echo "<p style='color: orange;'>⚠ Status check result: " . htmlspecialchars($status['error']) . "</p>";
        echo "<p>This is expected if the test user doesn't exist in the database.</p>";
    } else {
        echo "<p style='color: green;'>✓ User found in database</p>";
        echo "<pre>" . print_r($status, true) . "</pre>";
    }
} else {
    echo "<p style='color: red;'>✗ getDetailedTokenStatus function not found</p>";
}
// Test 2: Simulate OAuth callback parameters
echo "<h3>Test 2: OAuth Callback Simulation</h3>";
// Simulate the parameters that Google would send
$_GET['code'] = 'simulated_auth_code_12345';
$_GET['state'] = 'upload-house.php';
$_GET['scope'] = 'https://www.googleapis.com/auth/youtube.upload';
echo "<p><strong>Simulated OAuth Parameters:</strong></p>";
echo "<ul>";
echo "<li>code: " . htmlspecialchars($_GET['code']) . "</li>";
echo "<li>state: " . htmlspecialchars($_GET['state']) . "</li>";
echo "<li>scope: " . htmlspecialchars($_GET['scope']) . "</li>";
echo "</ul>";
echo "<p><em>Note: This test doesn't actually call the OAuth flow (that requires real Google credentials), ";
echo "but it shows what the callback would do with the parameters.</em></p>";
// Test 3: Check the enhanced error logging
echo "<h3>Test 3: Error Logging Verification</h3>";
echo "<p>The callback now includes detailed error logging. Check your server error log for messages like:</p>";
echo "<ul>";
echo "<li>'Google OAuth tokens saved successfully for user: [user_id]'</li>";
echo "<li>'Failed to save Google OAuth tokens for user: [user_id] - MySQL Error: [error]'</li>";
echo "<li>'User not found in database: [user_id]'</li>";
echo "</ul>";
// Test 4: Show the new redirect parameters
echo "<h3>Test 4: New Redirect Parameters</h3>";
echo "<p>The callback now provides detailed feedback via URL parameters:</p>";
echo "<ul>";
echo "<li><strong>oauth=success/failed</strong> - OAuth token exchange result</li>";
echo "<li><strong>db_save=success/failed/skipped</strong> - Database save result</li>";
echo "<li><strong>error=[message]</strong> - Specific error message if applicable</li>";
echo "</ul>";
echo "<h4>Example Success URL:</h4>";
echo "<code>upload-house.php?oauth=success&db_save=success&timestamp=" . time() . "</code>";
echo "<h4>Example Error URL:</h4>";
echo "<code>upload-house.php?oauth=failed&db_save=failed&error=database_save_failed&timestamp=" . time() . "</code>";
// Test 5: Available new endpoints
echo "<h3>Test 5: New Endpoints Available</h3>";
echo "<ul>";
echo "<li><strong>POST callback.php</strong> with action=check_token_status - Get detailed token status</li>";
echo "<li><strong>GET token-status.php</strong> - Visual status page</li>";
echo "</ul>";
echo "<h3>How to Test the Real Callback:</h3>";
echo "<ol>";
echo "<li>Make sure you're logged in to your application</li>";
echo "<li>Visit: <a href='callback.php?auth=logout'>Disconnect any existing Google connection</a></li>";
echo "<li>Go through the Google OAuth flow from your upload page</li>";
echo "<li>After redirect, check the URL for the new parameters</li>";
echo "<li>Visit <a href='token-status.php'>token-status.php</a> to see detailed status</li>";
echo "</ol>";
echo "<h3>Troubleshooting:</h3>";
echo "<ul>";
echo "<li>If <code>db_save=failed</code>, check error log for MySQL errors</li>";
echo "<li>If <code>db_save=skipped</code>, ensure you're logged in before starting OAuth</li>";
echo "<li>If <code>oauth=failed</code>, there was an issue with Google token exchange</li>";
echo "</ul>";
?>
