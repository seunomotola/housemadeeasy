<?php
// Redirect to the new modern version
$newUrl = 'details-new.php';
if (isset($_GET['id'])) {
    $newUrl .= '?id=' . urlencode($_GET['id']);
}
header('Location: ' . $newUrl);
exit();
