<?php
include('inc/session.php');
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
$user_id = $_SESSION['user_id'];
// Fetch the user's current balance
$stmt = $con->prepare("SELECT balance FROM user WHERE user_id = ?");
$stmt->bind_param('s', $user_id);
$stmt->execute();
$stmt->bind_result($balance);
$stmt->fetch();
$stmt->close();
if ($balance !== null) {
    echo json_encode(['success' => true, 'balance' => number_format($balance, 2)]);
} else {
    echo json_encode(['success' => false]);
}
