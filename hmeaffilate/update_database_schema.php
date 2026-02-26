<?php
/**
 * Execute the ALTER TABLE statement to add Google OAuth columns
 * Run this script once to update the database schema
 */
include("../inc/connect.inc.php")');
// Try the main SQL file first, then fallback to alternative
$sql_file = @file_get_contents('add_google_oauth_columns.sql');
if (!$sql_file) {
    echo "⚠️  Main SQL file not found, trying alternative...<br>";
    $sql_file = file_get_contents('add_google_oauth_columns_alternative.sql');
}
// Execute the SQL statements
if (mysqli_multi_query($con, $sql_file)) {
    echo "✅ Database schema updated successfully!<br>";
    
    // Clear any remaining results
    do {
        if ($result = mysqli_store_result($con)) {
            mysqli_free_result($result);
        }
    } while (mysqli_more_results($con) && mysqli_next_result($con));
    
    echo "✅ Google OAuth columns have been added to the hmeaffilate_user table:<br>";
    echo "   - google_access_token<br>";
    echo "   - google_refresh_token<br>";
    echo "   - google_token_expires_at<br>";
    echo "   - google_token_scope<br>";
    echo "   - google_token_updated_at<br>";
    echo "   - Index created for faster lookups<br>";
    
} else {
    echo "❌ Error updating database schema: " . mysqli_error($con) . "<br>";
}
mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Database Schema Update</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
    <h2>Database Schema Update Complete</h2>
    <p>You can now proceed to update the callback.php file to store and retrieve Google OAuth tokens.</p>
    <p><a href="youtube-upload-demo.php">Back to Upload Demo</a></p>
</body>
</html>
