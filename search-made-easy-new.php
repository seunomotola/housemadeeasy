<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);

include ('inc/session.php');
include ("inc/connect.inc.php");

if(isset($_GET['code'])){
    date_default_timezone_set('Africa/Lagos');
    $user_id = $_SESSION['user_id'] ?? null;
    $referral_code = $_GET['code'];
    
    setcookie('referral_code', $referral_code, time() + 30 * 60, "/"); // Set cookie for 30 minutes
    
    // Fetch referral details from database
    $stmt = $con->prepare("SELECT * FROM referrals WHERE referral_code = ?");
    $stmt->bind_param('s', $referral_code);
    $stmt->execute();
    $result = $stmt->get_result();
    $referral = $result->fetch_assoc(); 
    
    if ($referral) {
        $expires_at = $referral['expires_at'];
        if (new DateTime() > new DateTime($expires_at)) {
            include 'referral-link-expired.php';
            exit();
        }
        
        $referral_id = $referral['referral_id'];
        
        // Check if referral code has already been used
        $stmt = $con->prepare("SELECT * FROM referral_uses WHERE referral_code = ? AND used_by = ?");
        $stmt->bind_param('ss', $referral_code, $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            include 'referral-link-Used.php';
            exit(); 
        }
        
        include 'search-made-easy-referral-uses-new.php';
    }
} else {
    include 'search-made-easy-referral-not-uses-new.php';
}
