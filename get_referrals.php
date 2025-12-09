<?php
include('inc/session.php');
include('config.php');

if (!isset($_SESSION['user_id'])) {
    die("User is not logged in. Redirecting...");
}

$user_id = $_SESSION['user_id'];

// Check the database connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    echo "Database connection established.<br>";
}

// Fetch all referral codes created by the current user
$query = "
    SELECT r.referral_code, 
           IFNULL(ru.used_by, 'Not used') AS used_by, 
           IFNULL(ru.payment_status, 'pending') AS payment_status, 
           IFNULL(ru.used_at, 'N/A') AS date_used
    FROM referrals r
    LEFT JOIN referral_uses ru ON r.referral_code = ru.referral_code
    WHERE r.user_id = ?
";

$stmt = $con->prepare($query);

if (!$stmt) {
    die("Prepare failed: " . $con->error);
} else {
    echo "Statement prepared successfully.<br>";
}

$stmt->bind_param('s', $user_id);

if (!$stmt->execute()) {
    die("Execution failed: " . $stmt->error);
} else {
    echo "Statement executed successfully.<br>";
}

$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("No referrals found for this user.<br>");
}

$referrals = $result->fetch_all(MYSQLI_ASSOC);

if (empty($referrals)) {
    echo json_encode(['message' => 'No data available.']);
} else {
    echo json_encode($referrals);
}
?>
