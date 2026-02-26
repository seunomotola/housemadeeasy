<?php
// include('inc/session.php');
// session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
$user_id = $_SESSION['user_id'];
// Fetch all referral codes created by the current user
$stmt = $con->prepare("SELECT * FROM referrals WHERE user_id = ?");
$stmt->bind_param('s', $user_id);
$stmt->execute();
$referrals = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
if (empty($referrals)) {
    echo "<div class='alert alert-info'>You have not generated any referral codes.</div>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Referral Codes</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table-container {
            margin-top: 30px;
        }
        .table thead th {
            background-color: #343a40;
            color: #fff;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center">Your Referral Codes</h2>
    <div class="table-container">
        <table class="table table-striped table-bordered table-responsive-sm">
            <thead>
                <tr>
                    <th>Referral Code</th>
                    <th>Status</th>
                    <th>Used By</th>
                    <th>Date Used</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($referrals as $referral) {
                    $referral_code = $referral['referral_code'];
                    // Check if the referral code has been used
                    $stmt = $con->prepare("SELECT * FROM referral_uses WHERE referral_code = ?");
                    $stmt->bind_param('s', $referral_code);
                    $stmt->execute();
                    $uses = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                    if (empty($uses)) {
                        $referral_code_link = "https://housemadeeasy.org/search-made-easy.php?code=" . $referral_code;
                        echo "<tr><td>{$referral_code}</td><td>Not used</td><td>N/A</td><td>N/A</td></tr>";
                    } else {
                        foreach ($uses as $use) {
                            $used_by = $use['used_by'];
                            $date_used = $use['used_at'];
                            $query4 = $con->query("SELECT fname FROM user WHERE user_id = '$used_by'");
                            $row4 = $query4->fetch_assoc();
                            $fname_used_by_new = $row4['fname'];
                            $referral_code_link = "https://housemadeeasy.org/search-made-easy.php?code=" . $referral_code;
                            echo "<tr><td>{$referral_code}</td><td>Used</td><td>{$fname_used_by_new}</td><td>{$date_used}</td></tr>";
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
