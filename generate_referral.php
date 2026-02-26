<?php
include('inc/session.php');
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    exit();
}
 date_default_timezone_set('Africa/Lagos'); 
$user_id = $_SESSION['user_id'];
$referral_id = uniqid('ref_', true);
$referral_code = uniqid();
$expires_at = date('Y-m-d H:i:s', strtotime('+24 hours'));
// Insert the referral code into the database
$stmt = $con->prepare("INSERT INTO referrals (referral_id, user_id, referral_code, expires_at) VALUES (?, ?, ?, ?)");
$stmt->bind_param('ssss', $referral_id, $user_id, $referral_code,  $expires_at);
$stmt->execute();
// Set the referral code as a cookie with the same expiration time
$cookie_expiration = time() + 24 * 60 * 60; // 24 hours from now
setcookie('referral_code', $referral_code, $cookie_expiration, "/");
echo $referral_code;
// include('inc/session.php');
// if (!isset($_SESSION['user_id'])) {
//     http_response_code(401); // Unauthorized
//     exit();
// }
// date_default_timezone_set('Africa/Lagos');
// $user_id = $_SESSION['user_id'];
// if (!isset($_POST['type']) || !in_array($_POST['type'], ['house', 'logistics', 'home-repair'])) {
//     http_response_code(400); // Bad Request
//     exit();
// }
// $type = $_POST['type'];
// $referral_id = uniqid('ref_', true);
// $referral_code = uniqid();
// $expires_at = date('Y-m-d H:i:s', strtotime('+24 hours'));
// // Insert the referral code into the database
// $stmt = $con->prepare("INSERT INTO referrals (referral_id, user_id, referral_code, type, expires_at) VALUES (?, ?, ?, ?, ?)");
// if ($stmt === false) {
//     // Handle error preparing the statement
//     error_log('Prepare failed: (' . $con->errno . ') ' . $con->error);
//     http_response_code(500); // Internal Server Error
//     exit();
// }
// $stmt->bind_param('sssss', $referral_id, $user_id, $referral_code, $type, $expires_at);
// if ($stmt->execute() === false) {
//     // Handle error executing the statement
//     error_log('Execute failed: (' . $stmt->errno . ') ' . $stmt->error);
//     http_response_code(500); // Internal Server Error
//     exit();
// }
// // Set the referral code as a cookie with the same expiration time
// $cookie_expiration = time() + 24 * 60 * 60; // 24 hours from now
// setcookie('referral_code', $referral_code, $cookie_expiration, "/");
// // Return the referral code as the response
// echo $referral_code;
?>
