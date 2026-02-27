<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);

include("inc/connect.inc.php");

$id = 38;
$sql ="SELECT * FROM properties WHERE id='$id' ";
$result = mysqli_query($con,$sql);
$post = mysqli_fetch_assoc($result);

echo "YouTube Link: " . $post['youtube_link'] . "<br>";
echo "Link length: " . strlen($post['youtube_link']) . "<br>";
echo "Link is empty? " . (empty($post['youtube_link']) ? 'Yes' : 'No') . "<br>";
echo "Link is null? " . (is_null($post['youtube_link']) ? 'Yes' : 'No') . "<br>";
?>