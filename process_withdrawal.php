<?php
include('inc/session.php');
$user_id = $_SESSION['user_id'];
$referral_code = $_POST['referral_code'];
$account_name = $_POST['account_name'];
$account_number = $_POST['account_number'];
$bank_name = $_POST['bank_name'];
if (!empty($referral_code) && !empty($account_name) && !empty($account_number) && !empty($bank_name)) {
    // Deduct the amount and update the referral use record
    $withdraw_amount = 3000.00; // Example amount to be withdrawn
    // Fetch the referral use record to ensure it's paid and has not been withdrawn yet
$stmt = $con->prepare("SELECT * FROM referral_uses WHERE referral_code = ? AND payment_status = 'paid' AND withdrawn = 0");
$stmt->bind_param('s', $referral_code);
$stmt->execute();
$referral_use = $stmt->get_result()->fetch_assoc();
$referral_id = $referral_use['referral_id'];
 $query4 = mysqli_query($con,"SELECT * FROM user WHERE  user_id= '$user_id'"); 
    $row4 = mysqli_fetch_assoc($query4);
    $fname_used = $row4['fname'];
    $lname_used = $row4['lname'];
     $query5 = mysqli_query($con,"SELECT * FROM withdrawals WHERE  referral_id= '$referral_id'"); 
    $row5 = mysqli_fetch_assoc($query5);
    $account_name = $row5['account_name'];
    $account_number = $row5['account_number'];
    $bank_name = $row5['bank_name'];
         $query3 = mysqli_query($con,"SELECT * FROM referral_uses WHERE  referral_id = $referral_id"); 
    $row3 = mysqli_fetch_assoc($query3);
    $fname_used_by = $row3['used_by'];
     $query6 = mysqli_query($con,"SELECT * FROM user WHERE  user_id= '$fname_used_by'"); 
    $row6 = mysqli_fetch_assoc($query6);
    $fname_used_by_new = $row6['fname'];
    // Deduct balance
    $stmt = $con->prepare("UPDATE user SET balance = balance - ? WHERE user_id = ? AND balance >= ?");
    $stmt->bind_param('dsi', $withdraw_amount, $user_id, $withdraw_amount);
    if ($stmt->execute() && $stmt->affected_rows > 0) {
        // Log the withdrawal
        $stmt = $con->prepare("INSERT INTO withdrawals (user_id, referral_id, referral_code, amount, account_name, account_number, bank_name, withdrawal_date) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param('sssdsss', $user_id, $referral_id, $referral_code, $withdraw_amount, $account_name, $account_number, $bank_name);
        $stmt->execute();
        // Mark the referral as withdrawn
        $stmt = $con->prepare("UPDATE referral_uses SET withdrawn = 1 WHERE referral_code = ?");
        $stmt->bind_param('s', $referral_code);
        $stmt->execute();
        echo "Withdrawal successful.";
        include 'withdrawal-initiated-customer-mail.php';
        include 'withdrawal-initiated-elijah-mail.php';
        include 'withdrawal-initiated-elijah.php';
        include 'withdrawal-initiated-customer.php';
    } else {
        echo "Failed to process withdrawal. Insufficient balance or an error occurred.";
    }
} else {
    echo "Please fill in all the fields.";
}
?>
