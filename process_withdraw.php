<?php
include('inc/session.php');
// include('config.php');

// if (!isset($_SESSION['user_id'])) {
//     echo "<div class='alert alert-danger'>You are not logged in.</div>";
//     exit();
// }

$user_id = $_SESSION['user_id'];
$withdraw_amount = isset($_POST['withdraw_amount']) ? floatval($_POST['withdraw_amount']) : 0;

$total_eligible_amount = 0;

// Fetch houses associated with the user's referral codes and check their payment status
$stmt = $con->prepare("
    SELECT hp.payment_amount
    FROM house_payments hp
    JOIN referrals r ON hp.referral_id = r.referral_id
    WHERE r.user_id = ? AND hp.payment_status = 'completed'
");
$stmt->bind_param('s', $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Calculate the total amount the user can withdraw from completed payments
while ($row = $result->fetch_assoc()) {
    $total_eligible_amount += $row['payment_amount'];
}
$stmt->close();

// Fetch the user's current balance
$stmt = $con->prepare("SELECT balance FROM user WHERE user_id = ?");
$stmt->bind_param('s', $user_id);
$stmt->execute();
$stmt->bind_result($balance);
$stmt->fetch();
$stmt->close();

// Validate withdrawal amount
if ($total_eligible_amount == 0) {
    echo "<div class='alert alert-danger'>You do not have any eligible payments for withdrawal.</div>";
} elseif ($withdraw_amount > $balance || $withdraw_amount > $total_eligible_amount) {
    echo "<div class='alert alert-danger'>Insufficient eligible balance for this withdrawal.</div>";
} elseif ($withdraw_amount <= 0) {
    echo "<div class='alert alert-danger'>Please enter a valid withdrawal amount.</div>";
} else {
    // Deduct the amount from the user's balance
    $stmt = $con->prepare("UPDATE user SET balance = balance - ? WHERE user_id = ?");
    $stmt->bind_param('ds', $withdraw_amount, $user_id);
    if ($stmt->execute()) {
        // Log the withdrawal transaction
        $stmt = $con->prepare("INSERT INTO withdrawals (user_id, amount, date) VALUES (?, ?, NOW())");
        $stmt->bind_param('sd', $user_id, $withdraw_amount);
        $stmt->execute();

        echo "<div class='alert alert-success'>Withdrawal of $$withdraw_amount has been processed successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Failed to process the withdrawal. Please try again later.</div>";
    }
    $stmt->close();
}
?>
