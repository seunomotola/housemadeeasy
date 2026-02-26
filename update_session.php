<?php
session_start();
if (isset($_POST['referral_message_visible'])) {
    $_SESSION['referral_message_visible'] = filter_var($_POST['referral_message_visible'], FILTER_VALIDATE_BOOLEAN);
}
?>
