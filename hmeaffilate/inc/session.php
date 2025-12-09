<?php
// Do NOT call session_start() here anymore, it's already called in my-account.php
include ('inc/connect.inc.php');

// Initialize all variables with default values
$fname = '';
$lname = '';
$email2 = '';
$pno = '';
$id = '';
$agentaffilate_id = '';

// Check if user is logged in
if (isset($_SESSION['agentaffilate_id'])) {
    $query = mysqli_query($con, "SELECT * FROM hmeaffilate_user WHERE agentaffilate_id = '".$_SESSION['agentaffilate_id']."'");
    if ($row = mysqli_fetch_assoc($query)) {
        $email2 = $row['email'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $id = $row['id'];
        $pno = $row['pno'];
        $agentaffilate_id = $row['agentaffilate_id'];
    }
} else {
    echo "<script>
        alert('Login/Register first before you can view this House ...');
        window.location.href='index.php';
    </script>";
    exit(); // Prevent further execution
}
?>
