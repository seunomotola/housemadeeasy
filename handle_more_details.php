<?php
header('Content-Type: application/json');
include("../inc/connect.inc.php")'); 
session_start();
$userid = $_SESSION['id']; 
$treakable = $_POST['treakable']; 
$tiled = $_POST['tiled']; 
$fence = $_POST['fence']; 
$electric = $_POST['electricity']; 
$gated = $_POST['gated']; 
$gender = $_POST['gender']; 
$roommate = $_POST['roommate']; 
$water = $_POST['water']; 
$landlord = $_POST['landlord']; 
$stmt = $con->prepare("UPDATE users SET treakable=?,tiled=?,fence=?,electricity=?,gated=?,gender=?,roommate=?,water=?,landlord=? WHERE id=?");
$stmt->bind_param("sssssssssi", $treakable,$tiled,$fence,$electric,$gated,$gender,$roommate,$water,$landlord,$userid);
$execute = $stmt->execute();
if ($execute) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'msg' => 'execute failed: '.$stmt->error]);
}
$stmt->close();
$con->close();
