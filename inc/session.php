<?php

if (!function_exists('isTokenValid')) {

include(__DIR__ . "/connect.inc.php");

// Load environment variables
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Configuration for Google OAuth
define('GOOGLE_CLIENT_ID', $_ENV['GOOGLE_CLIENT_ID']);
define('GOOGLE_CLIENT_SECRET', $_ENV['GOOGLE_CLIENT_SECRET']);

set_time_limit(500);

// ── Session Start (with cookie restore) ──────────────────────────────────────
if (isset($_COOKIE['user_id']) && isset($_COOKIE['user_email'])) {
    session_start();
    $_SESSION['user_id']  = $_COOKIE['user_id'];
    $_SESSION['email']    = $_COOKIE['user_email'];
    $_SESSION['fname']    = $_COOKIE['user_fname'];
    $_SESSION['lname']    = $_COOKIE['user_lname'];
} else {
    session_start();
}

// ── Helper Functions ─────────────────────────────────────────────────────────
function isTokenValid($expiresAt) {
    if (!$expiresAt) return false;
    return (strtotime($expiresAt) > (time() + 300));
}

function refreshAccessToken($refreshToken) {
    if (!function_exists('curl_init')) {
        error_log("cURL not available for token refresh");
        return false;
    }
    $data = [
        'client_id'     => GOOGLE_CLIENT_ID,
        'client_secret' => GOOGLE_CLIENT_SECRET,
        'refresh_token' => $refreshToken,
        'grant_type'    => 'refresh_token'
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,            'https://oauth2.googleapis.com/token');
    curl_setopt($ch, CURLOPT_POST,           true);
    curl_setopt($ch, CURLOPT_POSTFIELDS,     http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER,     ['Content-Type: application/x-www-form-urlencoded']);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_TIMEOUT,        30);
    $result    = curl_exec($ch);
    $curlError = curl_error($ch);
    curl_close($ch);
    if ($result === false) {
        error_log("cURL token refresh failed: " . $curlError);
        return false;
    }
    return json_decode($result, true);
}

function storeGoogleTokens($agentaffilate_id, $accessToken, $refreshToken = null, $expiresIn = null, $scope = null) {
    global $con;
    $expiresAt = $expiresIn ? date('Y-m-d H:i:s', time() + $expiresIn) : null;

    $check = mysqli_prepare($con, "SELECT agentaffilate_id FROM hmeaffilate_user WHERE agentaffilate_id = ?");
    if (!$check) return false;
    mysqli_stmt_bind_param($check, "s", $agentaffilate_id);
    mysqli_stmt_execute($check);
    if (!mysqli_fetch_assoc(mysqli_stmt_get_result($check))) {
        mysqli_stmt_close($check);
        return false;
    }
    mysqli_stmt_close($check);

    $stmt = mysqli_prepare($con, "UPDATE hmeaffilate_user SET
        google_access_token    = ?,
        google_refresh_token   = ?,
        google_token_expires_at = ?,
        google_token_scope     = ?,
        google_token_updated_at = NOW()
        WHERE agentaffilate_id = ?");
    if (!$stmt) return false;
    mysqli_stmt_bind_param($stmt, "sssss", $accessToken, $refreshToken, $expiresAt, $scope, $agentaffilate_id);
    $result = mysqli_stmt_execute($stmt);
    $affected = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);
    return $result && $affected > 0;
}

// ── Load Regular User (from `user` table) ────────────────────────────────────
if (isset($_SESSION['user_id'])) {
    $query = mysqli_query($con, "SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
    if ($row = mysqli_fetch_assoc($query)) {
        $email2  = $row['email'];
        $fname   = $row['fname'];
        $lname   = $row['lname'];
        $id      = $row['id'];
        $pno     = $row['pno'];
        $user_id = $row['user_id'];
    }
}

// ── Load Agent User (from `hmeaffilate_user` table) ──────────────────────────
if (isset($_SESSION['agentaffilate_id'])) {
    $query = mysqli_query($con, "SELECT *, google_access_token, google_refresh_token, google_token_expires_at, google_token_scope
        FROM hmeaffilate_user WHERE agentaffilate_id = '" . $_SESSION['agentaffilate_id'] . "'");

    if ($row = mysqli_fetch_assoc($query)) {
        $email2           = $row['email'];
        $fname            = $row['fname'];
        $lname            = $row['lname'];
        $id               = $row['id'];
        $pno              = $row['pno'];
        $agentaffilate_id = $row['agentaffilate_id'];

        // Google OAuth token handling
        if (!empty($row['google_access_token'])) {
            if (isTokenValid($row['google_token_expires_at'])) {
                if (!isset($_SESSION['google_access_token'])) {
                    $_SESSION['google_access_token']    = $row['google_access_token'];
                    $_SESSION['google_refresh_token']   = $row['google_refresh_token'];
                    $_SESSION['google_token_expires_at']= $row['google_token_expires_at'];
                }
            } elseif (!empty($row['google_refresh_token'])) {
                $refreshResult = refreshAccessToken($row['google_refresh_token']);
                if ($refreshResult && isset($refreshResult['access_token'])) {
                    $newAccess    = $refreshResult['access_token'];
                    $newRefresh   = $refreshResult['refresh_token'] ?? $row['google_refresh_token'];
                    $expiresIn    = $refreshResult['expires_in'] ?? 3600;
                    if (storeGoogleTokens($agentaffilate_id, $newAccess, $newRefresh, $expiresIn, $row['google_token_scope'])) {
                        $_SESSION['google_access_token']     = $newAccess;
                        $_SESSION['google_refresh_token']    = $newRefresh;
                        $_SESSION['google_token_expires_at'] = date('Y-m-d H:i:s', time() + $expiresIn);
                    }
                }
            }
        }
    } else {
        // Agent not found — redirect to login
        echo "<script>
            alert('Login/Register first before you can view this page...');
            window.location.href='index.php';
        </script>";
        exit();
    }
}
}
?>