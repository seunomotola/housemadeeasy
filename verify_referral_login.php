<?php
include('inc/session.php');
// if (!isset($_SESSION['user_id'])) {
//     header('Location: login.php');
//     exit();
// }
// $user_id = $_SESSION['user_id'];
// $referral_code = $_GET['code'] ?? $_COOKIE['referral_code'] ?? null;
// if (!$referral_code) {
//     echo "Invalid referral link."; 
//     exit();
// } 
// // Store the referral code in a cookie on user B's device if it's passed via the URL
// if (isset($_GET['code'])) {
//     setcookie('referral_code', $referral_code, time() + 30 * 60, '/'); // Set the cookie for 30 minutes
// }
if (isset($_COOKIE['referral_code'])) {
$referral_code = $_COOKIE['referral_code'];
$user_id = $_SESSION['user_id'] ?? null;
// Fetch the referral from the database
$stmt = $con->prepare("SELECT * FROM referrals WHERE referral_code = ?");
$stmt->bind_param('s', $referral_code);
$stmt->execute();
$result = $stmt->get_result();
$referral = $result->fetch_assoc();
if ($referral) {
    // $expires_at = $referral['expires_at'];
    // if (new DateTime() > new DateTime($expires_at)) {
    //     echo "Referral link has expired.";
    //     exit();
    // }
    $referral_id = $referral['referral_id'];
    $referring_user_id = $referral['user_id'];
    // Check if the current user has already used this referral code
    $stmt = $con->prepare("SELECT * FROM referral_uses WHERE referral_code = ? AND used_by = ?");
    $stmt->bind_param('ss', $referral_code, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
         include 'referral-link-Used.php';
        exit();
    }
} else {
    echo "Invalid referral link.";
}
}else{
    echo "cookie not set";
}
?>
