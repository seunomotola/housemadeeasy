<?php
// Do NOT call session_start() here anymore, it's already called in my-account.php
include ('inc/connect.inc.php');

// Load environment variables
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Configuration for Google OAuth
define('GOOGLE_CLIENT_ID', $_ENV['GOOGLE_CLIENT_ID']);
define('GOOGLE_CLIENT_SECRET', $_ENV['GOOGLE_CLIENT_SECRET']);

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

// Initialize all variables with default values
$fname = '';
$lname = '';
$email2 = '';
$pno = '';
$id = '';
$agentaffilate_id = '';

// Check if user is logged in
if (isset($_SESSION['agentaffilate_id'])) {
    $query = mysqli_query($con, "SELECT *, google_access_token, google_refresh_token, google_token_expires_at, google_token_scope FROM hmeaffilate_user WHERE agentaffilate_id = '".$_SESSION['agentaffilate_id']."'");
    if ($row = mysqli_fetch_assoc($query)) {
        $email2 = $row['email'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $id = $row['id'];
        $pno = $row['pno'];
        $agentaffilate_id = $row['agentaffilate_id'];

        // Handle Google OAuth tokens - ensure they are loaded and refreshed if needed
        if (!empty($row['google_access_token'])) {
            $tokenValid = isTokenValid($row['google_token_expires_at']);

            if ($tokenValid) {
                // Token is valid, load into session
                if (!isset($_SESSION['google_access_token'])) {
                    $_SESSION['google_access_token'] = $row['google_access_token'];
                    $_SESSION['google_refresh_token'] = $row['google_refresh_token'];
                    $_SESSION['google_token_expires_at'] = $row['google_token_expires_at'];
                    error_log("Loaded valid Google OAuth tokens into session for user: " . $agentaffilate_id);
                }
            } elseif (!empty($row['google_refresh_token'])) {
                // Token expired, try to refresh
                error_log("Access token expired for user: " . $agentaffilate_id . ", attempting refresh");
                $refreshResult = refreshAccessToken($row['google_refresh_token']);

                if ($refreshResult && isset($refreshResult['access_token'])) {
                    // Refresh successful, update database and session
                    $newAccessToken = $refreshResult['access_token'];
                    $newRefreshToken = $refreshResult['refresh_token'] ?? $row['google_refresh_token']; // Some providers don't return new refresh token
                    $expiresIn = $refreshResult['expires_in'] ?? 3600; // Default 1 hour

                    $updateSuccess = storeGoogleTokens(
                        $agentaffilate_id,
                        $newAccessToken,
                        $newRefreshToken,
                        $expiresIn,
                        $row['google_token_scope']
                    );

                    if ($updateSuccess) {
                        // Update session with new tokens
                        $_SESSION['google_access_token'] = $newAccessToken;
                        $_SESSION['google_refresh_token'] = $newRefreshToken;
                        $_SESSION['google_token_expires_at'] = date('Y-m-d H:i:s', time() + $expiresIn);
                        error_log("Successfully refreshed and updated Google OAuth tokens for user: " . $agentaffilate_id);
                    } else {
                        error_log("Failed to update database with refreshed tokens for user: " . $agentaffilate_id);
                    }
                } else {
                    error_log("Token refresh failed for user: " . $agentaffilate_id . " - " . json_encode($refreshResult));
                }
            } else {
                error_log("No valid access token and no refresh token available for user: " . $agentaffilate_id);
            }
        }
    }
} else {
    echo "<script>
        alert('Login/Register first before you can view this House ...');
        window.location.href='index.php';
    </script>";
    exit(); // Prevent further execution
}
?>
