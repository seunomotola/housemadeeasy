<?php
//include('inc/session.php');
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
$user_id = $_SESSION['user_id'];
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
        echo "You have already used this referral link.";
        exit();
    }
    // Insert the use of the referral
    $stmt = $con->prepare("INSERT INTO referral_uses (referral_id, used_by, referral_code) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $referral_id, $user_id, $referral_code);
    if (!$stmt->execute()) {
        echo "Failed to record the use of the referral.";
        exit();
    } 
   // Destroy the referral code cookie after it has been used
    //setcookie('referral_code', '', time() - 3600, '/'); // Expire the cookie 
    //setcookie('referral_code', '', time() - 3600, "/");
    // Credit the referring user
    $credit_amount = 3000.00; // Amount to credit the referring user
    $stmt = $con->prepare("UPDATE user SET balance = balance + ? WHERE user_id = ?");
    $stmt->bind_param('ds', $credit_amount, $referring_user_id);
    if (!$stmt->execute()) {
        echo "Failed to credit the referring user.";
        exit();
    }
    $query = mysqli_query($con,"SELECT * FROM referrals WHERE referral_code = '$referral_code'"); 
    $row = mysqli_fetch_assoc($query);
    $user_id_created_by = $row['user_id'];
    $referral_id = $row['referral_id'];
    $referral_code_link = "https://housemadeeasy.org/search-made-easy.php?code=" . $referral_code;
     $query2 = mysqli_query($con,"SELECT * FROM user WHERE  user_id= '$user_id_created_by'"); 
    $row2 = mysqli_fetch_assoc($query2);
    $fname_referral = $row2['fname'];
    $pno_referral = $row2['pno'];
     $query3 = mysqli_query($con,"SELECT * FROM referral_uses WHERE  referral_id= '$referral_id'"); 
    $row3 = mysqli_fetch_assoc($query3);
    $fname_used_by = $row3['used_by'];
     $query4 = mysqli_query($con,"SELECT * FROM user WHERE  user_id= '$fname_used_by'"); 
    $row4 = mysqli_fetch_assoc($query4);
    $fname_used_by_new = $row4['fname'];
    // echo "
    //  <script>
    //              alert('Referral link used successfully.');
            
    // </script> ";
    include 'referral-code-used-by-customer.php'; 
    // Destroy the referral code cookie after it has been used
    //setcookie('referral_code', '', time() - 3600, "/");
} else {
    echo "Invalid referral link.";
}
}else{
    echo "cookie not set";
}
?>
