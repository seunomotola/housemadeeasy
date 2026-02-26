<?php
include('inc/session.php');
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
$user_id = $_SESSION['user_id'];
// Fetch only non-expired referrals
$stmt = $con->prepare("SELECT * FROM referrals WHERE user_id = ? AND expires_at > NOW() ORDER BY expires_at DESC");
$stmt->bind_param('s', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$referrals = $result->fetch_all(MYSQLI_ASSOC);
$can_generate = true;
if (!empty($referrals)) {
    $expires_at = new DateTime($referrals[0]['expires_at']);
    $now = new DateTime();
    if ($expires_at > $now) {
        $can_generate = false;
        $_SESSION['referral_message_visible'] = false;
    }
} else {
    $_SESSION['referral_message_visible'] = true;
}
if (!isset($_SESSION['referral_message_visible'])) {
    $_SESSION['referral_message_visible'] = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="container">
    <h2>Generate Referral Link</h2>
    <?php if ($_SESSION['referral_message_visible']): ?>
        <span id="generate-message" style="color: red; text-align:center;">Click the button below to generate your referral link</span>
    <?php endif; ?>
    <button id="generate-referral" class="btn btn-primary" <?php if (!$can_generate) echo 'disabled'; ?>>Generate Referral Link</button>
    <div id="generate-warning">
        <?php if (!$can_generate): ?>
            <p class="text-danger">You cannot generate a new referral link until the current one expires.</p>
        <?php endif; ?>
    </div>
    <h2>Your Referral Links</h2>
    <ul id="referral-list" class="list-group">
        <?php foreach ($referrals as $referral): 
            $referralLink = 'https://housemadeeasy.org/use_referral.php?code=' . $referral['referral_code']; ?>
            <li class="list-group-item">
                <?php echo $referralLink; ?>
                <input type="hidden" value="<?php echo $referralLink; ?>"><br>
                <button style="border-radius: 20px" class="copy-link btn btn-secondary" data-link="<?php echo $referralLink; ?>"><i class="fas fa-copy"></i> Copy Link</button>
                <button style="border-radius: 20px" class="share-link btn btn-info" data-link="<?php echo $referralLink; ?>">Share</button>
                <span style="border-radius: 20px; padding:10px" class="expires-at badge badge-warning" data-expires-at="<?php echo $referral['expires_at']; ?>"></span>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Referral link copied to clipboard!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Add to Cart Modal -->
<div class="modal fade" id="generatereferral" tabindex="-1" aria-labelledby="generatereferral" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="generatereferral">Referral Link Generated successfully</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="messagegeneratereferral"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Add to cart modal end -->
<!-- Share Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="shareModalLabel">Share Referral Link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Select a platform to share your referral link:</p>
        <div class="d-flex justify-content-around">
          <a id="share-facebook" class="btn btn-primary" target="_blank">Facebook</a>
          <a id="share-twitter" class="btn btn-info" target="_blank">Twitter</a>
          <a id="share-whatsapp" class="btn btn-success" target="_blank">WhatsApp</a>
          <a id="share-linkedin" class="btn btn-secondary" target="_blank">LinkedIn</a>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Share modal end -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    function startCountdown(element, expiresAt) {
        function updateCountdown() {
            var now = new Date().getTime();
            var distance = new Date(expiresAt).getTime() - now;
            if (distance < 0) {
                clearInterval(interval);
                element.closest('li').remove();
                $('#generate-referral').prop('disabled', false);
                $('#generate-warning').html('');
                $('#generate-message').show();
                $.ajax({
                    url: 'update_session.php',
                    method: 'POST',
                    data: { referral_message_visible: true },
                    success: function(response) {
                        // Session updated
                    }
                });
            } else {
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                element.text('Expires in: ' + hours + 'h ' + minutes + 'm ' + seconds + 's');
            }
        }
        updateCountdown();
        var interval = setInterval(updateCountdown, 1000);
    }
    $('.expires-at').each(function() {
        var expiresAt = $(this).data('expires-at');
        startCountdown($(this), expiresAt);
    });
    $('#generate-referral').click(function() {
        $.ajax({
            url: 'generate_referral.php',
            method: 'POST',
            success: function(response) {
                let expiresAt = new Date(new Date().getTime() + 24*60*60*1000).toISOString().slice(0, 19).replace('T', ' ');
                let referralLink = 'https://housemadeeasy.org/use_referral.php?code=' + response;
                $('#referral-list').append(
                    '<li class="list-group-item">'
                    + referralLink
                    + ' <input type="hidden" value="' + referralLink + '"><br>'
                    + ' <button style="border-radius: 20px" class="copy-link btn btn-secondary" data-link="' + referralLink + '"><i class="fas fa-copy"></i>Copy Link</button>'
                    + ' <button style="border-radius: 20px" class="share-link btn btn-info" data-link="' + referralLink + '"><i class="fas fa-share-alt"></i>Share</button>'
                    + ' <span style="border-radius: 20px; padding:10px" class="expires-at badge badge-warning" data-expires-at="' + expiresAt + '"></span>'
                    + '</li>'
                );
                startCountdown($('.expires-at').last(), expiresAt);
                $('#generate-referral').prop('disabled', true);
                $('#generatereferral').modal('show');
                $('#messagegeneratereferral').html('<div class="alert alert-success">Referral link generated Successfully</div>');
                $('#generate-warning').html('<p class="text-danger">You cannot generate a new referral link until the current one expires.</p>');
                $('#generate-message').hide();
                $.ajax({
                    url: 'update_session.php',
                    method: 'POST',
                    data: { referral_message_visible: false },
                    success: function(response) {
                        // Session updated
                    }
                });
            }
        });
    });
    $(document).on('click', '.copy-link', function(event) {
        event.preventDefault();
        var referralLink = $(this).data('link');
        var tempInput = $('<input>');
        $('body').append(tempInput);
        tempInput.val(referralLink).select();
        document.execCommand('copy');
        tempInput.remove();
        $('#successModal').modal('show');
    });
    $(document).on('click', '.share-link', function(event) {
        event.preventDefault();
        var referralLink = $(this).data('link');
        
        // Update the share links for each social media platform
        $('#share-facebook').attr('href', 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(referralLink));
        $('#share-twitter').attr('href', 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(referralLink) + '&text=Check out this referral link!');
        $('#share-whatsapp').attr('href', 'https://wa.me/?text=' + encodeURIComponent('Check out this referral link: ' + referralLink));
        $('#share-linkedin').attr('href', 'https://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(referralLink) + '&title=Referral Link');
        $('#shareModal').modal('show');
    });
});
</script>
</body>
</html>
