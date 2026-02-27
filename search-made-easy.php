<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);

include ('inc/session.php');
include ("inc/connect.inc.php");
 if(isset($_GET['code'])){
date_default_timezone_set('Africa/Lagos');
$user_id = $_SESSION['user_id'] ?? null;
$referral_code = $_GET['code'] ;
//setcookie('referral_code', $referral_code, time() + 30 * 60, '/'); // Set the cookie for 30 minutes
// setcookie('referral_code', $referral_code, time() + (86400 * 30), "/"); // 30 days expiration
if (!$referral_code) {
    echo "The referral session has ended.";
    
}
// Set the referral code as a cookie with the same expiration time
//$cookie_expiration = time() + 24 * 60 * 60; // 24 hours from now
//setcookie('referral_code', $referral_code, $cookie_expiration, '/');
  setcookie('referral_code', $referral_code, time() + 30 * 60, "/"); // Set the cookie for 30 minutes
//  // Store the referral code in a cookie on user B's device if it's passed via the URL
// if (isset($_GET['code'])) {
//     setcookie('referral_code', $referral_code, time() + 30 * 60, '/'); // Set the cookie for 30 minutes
// }
// Fetch the referral from the database
$stmt = $con->prepare("SELECT * FROM referrals WHERE referral_code = ?");
$stmt->bind_param('s', $referral_code);
$stmt->execute();
$result = $stmt->get_result();
$referral = $result->fetch_assoc(); 
if ($referral) {
    $expires_at = $referral['expires_at'];
    if (new DateTime() > new DateTime($expires_at)) {
        //echo "Referral link has expired.";
        include 'referral-link-expired.php';
        exit();
    }
$referral_id = $referral['referral_id'];
    // Check if the referral code has already been used
    $stmt = $con->prepare("SELECT * FROM referral_uses WHERE referral_code = ? AND used_by = ?");
    $stmt->bind_param('ss', $referral_code, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
       include 'referral-link-Used.php';
        exit(); 
    }
    echo $referral_code;
include 'search-made-easy-referral-uses.php'; 
}
}else{
    // Fetch the referral from the database
$stmt = $con->prepare("SELECT * FROM referrals WHERE referral_code = ?");
$stmt->bind_param('s', $referral_code);
$stmt->execute();
$result = $stmt->get_result();
$referral = $result->fetch_assoc(); 
     // Destroy the referral code cookie after it has been used
    // setcookie('referral_code', '', time() - 3600, '/'); // Expire the cookie
     $expires_at = $referral['expires_at'];
    if (new DateTime() > new DateTime($expires_at)) {
        //echo "Referral link has expired.";
        include 'referral-link-expired.php';
        exit();
    }
     setcookie('referral_code', '', time() - 3600, "/");
include 'search-made-easy-referral-not-uses.php';
}
