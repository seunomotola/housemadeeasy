<?php
// include('inc/session.php');
// include('config.php');
// if (!isset($_SESSION['user_id'])) {
//     header('Location: login.php');
//     exit();
// }
$user_id = $_SESSION['user_id'];
// Fetch the user's current balance
$stmt = $con->prepare("SELECT balance FROM user WHERE user_id = ?");
$stmt->bind_param('s', $user_id);
$stmt->execute();
$stmt->bind_result($balance);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdraw Funds</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h2 class="text-center">Withdraw Your Funds</h2>
    <p>Your current balance is: <strong>#<?php echo number_format($balance, 2); ?></strong></p>
    <div id="alert-placeholder"></div>
    <form id="withdraw-form">
        <div class="form-group">
            <label for="withdraw_amount">Enter Amount to Withdraw:</label>
            <input type="number" step="0.01" min="0" class="form-control" id="withdraw_amount" name="withdraw_amount" >
        </div>
        <button type="submit" class="btn btn-primary" style="border-radius:20px">Withdraw</button>
    </form>
</div>
<script>
$(document).ready(function() {
    $('#withdraw-form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: 'process_withdraw.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#alert-placeholder').html(response);
                 // Clear the input field after successful withdrawal
                $('#withdraw_amount').val('');
                // Refresh the balance by making another AJAX call
                $.ajax({
                    url: 'get_balance.php',
                    type: 'GET',
                    success: function(balanceResponse) {
                        $('#current-balance').text('$' + parseFloat(balanceResponse).toFixed(2));
                    },
                    error: function() {
                        $('#alert-placeholder').append('<div class="alert alert-danger">Failed to update balance.</div>');
                    }
                });
            },
            error: function() {
                $('#alert-placeholder').html('<div class="alert alert-danger">An error occurred. Please try again.</div>');
            }
        });
    });
});
</script>
</body>
</html>
