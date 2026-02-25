<?php
/**
 * Safe Update Script for callback.php
 * This script backs up the current callback.php and replaces it with the updated version
 */

session_start();
include ('inc/connect.inc.php');

// Check if user is logged in as admin (you can customize this check)
if (!isset($_SESSION['agentaffilate_id'])) {
    die('Access denied. Please log in first.');
}

$backupFile = 'callback_backup_' . date('Y-m-d_H-i-s') . '.php';
$originalFile = 'callback.php';
$updatedFile = 'callback_updated.php';

// Check if files exist
if (!file_exists($originalFile)) {
    die('Error: Original callback.php not found!');
}

if (!file_exists($updatedFile)) {
    die('Error: Updated callback file not found!');
}

echo "<h2>Safe callback.php Update</h2>";

try {
    // Step 1: Create backup
    echo "<p>Step 1: Creating backup...</p>";
    if (copy($originalFile, $backupFile)) {
        echo "<p>✅ Backup created: $backupFile</p>";
    } else {
        throw new Exception('Failed to create backup');
    }

    // Step 2: Replace callback.php
    echo "<p>Step 2: Replacing callback.php...</p>";
    if (copy($updatedFile, $originalFile)) {
        echo "<p>✅ callback.php updated successfully!</p>";
    } else {
        throw new Exception('Failed to update callback.php');
    }

    // Step 3: Verify the update
    echo "<p>Step 3: Verifying update...</p>";
    $newContent = file_get_contents($originalFile);
    if (strpos($newContent, 'storeGoogleTokens') !== false) {
        echo "<p>✅ Update verified: New token storage functions found!</p>";
    } else {
        throw new Exception('Update verification failed');
    }

    echo "<h3>🎉 Update Complete!</h3>";
    echo "<p><strong>Next Steps:</strong></p>";
    echo "<ol>";
    echo "<li>Test the Google OAuth flow to ensure it works</li>";
    echo "<li>Verify that tokens are being stored in the database</li>";
    echo "<li>Check that users don't need to re-authenticate on subsequent visits</li>";
    echo "</ol>";
    
    echo "<p><strong>Backup Location:</strong> $backupFile</p>";
    echo "<p><a href='upload-house-video.php'>Test Upload Page</a></p>";

} catch (Exception $e) {
    echo "<p>❌ Error: " . $e->getMessage() . "</p>";
    echo "<p>The original callback.php should still be intact.</p>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Safe Update - callback.php</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }
        .container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { color: #333; border-bottom: 2px solid #007cba; padding-bottom: 10px; }
        h3 { color: #28a745; }
        .success { color: #28a745; }
        .error { color: #dc3545; }
        ol { margin: 20px 0; }
        a { color: #007cba; text-decoration: none; padding: 8px 16px; background: #007cba; color: white; border-radius: 4px; }
        a:hover { background: #005a87; }
    </style>
</head>
<body>
    <div class="container">
        <h2>🔄 Google OAuth Token Storage Update</h2>
        <p>This update will add persistent token storage to your YouTube upload functionality.</p>
        <p><strong>What this does:</strong></p>
        <ul>
            <li>Creates a backup of your current callback.php</li>
            <li>Replaces it with the updated version that stores tokens in the database</li>
            <li>Verifies the update was successful</li>
        </ul>
        <p><strong>Benefits:</strong></p>
        <ul>
            <li>Users authenticate only once with Google</li>
            <li>Tokens persist across browser sessions</li>
            <li>Better user experience for video uploads</li>
        </ul>
    </div>
</body>
</html>