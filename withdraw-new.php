<?php
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Referral Codes</title>
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
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
        .alert-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<?php
// Fetch the user's current balance
$stmt = $con->prepare("SELECT balance FROM user WHERE user_id = ?");
$stmt->bind_param('s', $user_id);
$stmt->execute();
$stmt->bind_result($balance);
$stmt->fetch();
$stmt->close();
?>

<div class="container">
    <h2 class="text-center">Your Referral Codes</h2>
    <p style="text-align:center;">Your Total balance is: <strong>#<span id="user-balance"><?php echo number_format($balance, 2); ?></span></strong></p>

    <!-- Alert Messages Container -->
    <div class="alert-container"></div>

    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Referral Code</th>
                        <th>Status</th>
                        <th>House Paid</th>
                        <th>Action</th>
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
                            echo "<tr><td>{$referral_code}</td><td>Not used</td><td>N/A</td><td><button class='btn btn-danger withdraw-warning' data-referral='{$referral_code}'>Withdraw</button></td></tr>";
                        } else {
                            foreach ($uses as $use) {
                                $used_by = $use['used_by']; 
                                $date_used = $use['used_at'];
                                $payment_status = $use['payment_status'];
                                $withdrawn = $use['withdrawn'];

                                if ($withdrawn) {
                                    echo "<tr>
                                    <td>{$referral_code}</td>
                                    <td>Used</td>
                                    <td>Yes</td>
                                    <td><button style='border-radius:20px' class='btn btn-secondary' disabled>You have already withdrawn</button></td>
                                    </tr>";
                                } elseif ($payment_status == 'paid') {
                                    echo "<tr>
                                    <td>{$referral_code}</td>
                                    <td>Used</td>
                                    <td>Yes</td>
                                    <td><button style='border-radius:20px' class='btn btn-success withdraw-button' data-referral='{$referral_code}'>Withdraw</button></td>
                                    </tr>";
                                } else {
                                    echo "<tr>
                                    <td>{$referral_code}</td>
                                    <td>Used</td>
                                    <td>No</td>
                                    <td><button style='border-radius:20px' class='btn btn-danger withdraw-warning' data-referral='{$referral_code}'>You can't withdraw yet</button></td>
                                    </tr>";
                                }
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal for Account Details -->
<div class="modal fade" id="withdrawModal" tabindex="-1" role="dialog" aria-labelledby="withdrawModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="withdrawForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="withdrawModalLabel">Enter Account Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="modal-referral-code" name="referral_code" value="">
                    <div class="form-group">
                        <label for="accountName">Account Name</label>
                        <input type="text" class="form-control" id="accountName" name="account_name" required>
                    </div>
                    <div class="form-group">
                        <label for="accountNumber">Account Number</label>
                        <input type="text" class="form-control" id="accountNumber" name="account_number" required>
                    </div>
                    <div class="form-group">
                        <label for="bankName">Bank Name</label>
                        <input type="text" class="form-control" id="bankName" name="bank_name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit Withdrawal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    // Handle withdraw button click
    $('.withdraw-button').click(function() {
        var referralCode = $(this).data('referral');
        $('#modal-referral-code').val(referralCode);
        $('#withdrawModal').modal('show');
    });

    // Handle form submission
    $('#withdrawForm').submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: 'process_withdrawal.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#withdrawModal').modal('hide');

                if (response.includes('successful')) {
                    showAlert('success', 'Withdrawal successful.');
                    updateBalance();
                } else {
                    showAlert('danger', 'Error: ' + response);
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
                showAlert('danger', 'An error occurred. Please try again later.');
            }
        });
    });

    // Handle withdraw warning button click
    $('.withdraw-warning').click(function() {
        showAlert('warning', 'You can\'t withdraw the money yet until the house has been paid.');
    });

    // Function to show alerts
    function showAlert(type, message) {
        var alertHtml = '<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' +
                        message +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '</button></div>';

        $('.alert-container').html(alertHtml);

        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    }

    // Function to update the user's balance
    function updateBalance() {
        $.ajax({
            url: 'get_balance.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.success) {
                    $('#user-balance').text(data.balance);
                } else {
                    console.error('Failed to retrieve balance');
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to update balance: ' + error);
            }
        });
    }
});
</script>
</body>
</html>
