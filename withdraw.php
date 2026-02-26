<?php
include('inc/session.php');
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
$user_id = $_SESSION['user_id'];
$referral_code = $_POST['referral_code'] ?? null;
if (!$referral_code) {
    echo "Invalid request.";
    exit();
}
// Fetch the referral use record to ensure it's paid and has not been withdrawn yet
$stmt = $con->prepare("SELECT * FROM referral_uses WHERE referral_code = ? AND payment_status = 'paid' AND withdrawn = 0");
$stmt->bind_param('s', $referral_code);
$stmt->execute();
$referral_use = $stmt->get_result()->fetch_assoc();
if ($referral_use) {
    $referral_id = $referral_use['referral_id'];
    // Deduct the amount from the user's balance
    $withdraw_amount = 3000.00; // Amount to be withdrawn
    $stmt = $con->prepare("UPDATE user SET balance = balance - ? WHERE user_id = ? AND balance >= ?");
    $stmt->bind_param('dsi', $withdraw_amount, $user_id, $withdraw_amount);
    if ($stmt->execute() && $stmt->affected_rows > 0) {
        // Log the withdrawal in the withdrawals table
        $stmt = $con->prepare("INSERT INTO withdrawals (user_id, referral_id, amount, withdrawal_date) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param('ssd', $user_id, $referral_id, $withdraw_amount);
        $stmt->execute();
        // Mark the referral as withdrawn
        $stmt = $con->prepare("UPDATE referral_uses SET withdrawn = 1 WHERE referral_code = ?");
        $stmt->bind_param('s', $referral_code);
        $stmt->execute();
        echo "Withdrawal successful. $withdraw_amount has been deducted from your balance.";
    } else {
        echo "Failed to process withdrawal. Insufficient balance or an error occurred.";
    }
} else {
    echo "Cannot withdraw. Payment not received, referral code is invalid, or it has already been withdrawn.";
}
?>
