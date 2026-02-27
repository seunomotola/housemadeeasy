<?php
// Redirect to the new modern version
$newUrl = 'search-made-easy-new.php';
if (isset($_GET['code'])) {
    $newUrl .= '?code=' . urlencode($_GET['code']);
}
header('Location: ' . $newUrl);
exit();
