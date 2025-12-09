<?php
session_start();
session_unset();
session_destroy();

setcookie('user_id', '', time() - 3600, "/");
setcookie('user_email', '', time() - 3600, "/");
setcookie('user_fname', '', time() - 3600, "/");
setcookie('user_lname', '', time() - 3600, "/");
setcookie('referral_code', '', time() - 3600, '/'); // Destroy the cookie

echo "<script>
    alert('Logout successful');
    window.location.href='index.php';
</script>";
?>
