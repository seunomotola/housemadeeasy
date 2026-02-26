<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track and Withdraw Referrals</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            margin: 20px;
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
    <div id="referral-table" class="table-container">
        <table class="table table-striped table-bordered table-responsive-sm">
            <thead>
                <tr>
                    <th>Referral Code</th>
                    <th>Status</th>
                    <th>Used By</th>
                    <th>Date Used</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="referral-data">
                <!-- Data will be loaded here via AJAX -->
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    // Load referral data via AJAX
    function loadReferrals() {
        $.ajax({
            url: 'get_referrals.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                let html = '';
                data.forEach(function(referral) {
                    let actionButton = '';
                    if (referral.payment_status === 'paid') {
                        actionButton = '<button class="btn btn-success withdraw-btn" data-code="' + referral.referral_code + '">Withdraw</button>';
                    } else if (referral.used_by === 'Not used') {
                        actionButton = '<button class="btn btn-danger" disabled>You can\'t withdraw the money yet</button>';
                    } else {
                        actionButton = '<button class="btn btn-danger" disabled>You can\'t withdraw the money yet</button>';
                    }
                    html += `
                        <tr>
                            <td>${referral.referral_code}</td>
                            <td>${referral.used_by === 'Not used' ? 'Not used' : 'Used'}</td>
                            <td>${referral.used_by}</td>
                            <td>${referral.date_used}</td>
                            <td>${actionButton}</td>
                        </tr>`;
                });
                $('#referral-data').html('hello');
            }
        });
    }
    loadReferrals();
    // Handle withdraw button click
    $(document).on('click', '.withdraw-btn', function() {
        const referralCode = $(this).data('code');
        // Send an AJAX request to withdraw money
        $.ajax({
            url: 'withdraw.php',
            method: 'POST',
            data: { code: referralCode },
            success: function(response) {
                alert(response); // Show response message
                loadReferrals(); // Reload the referrals list
            }
        });
    });
});
</script>
</body>
</html>
