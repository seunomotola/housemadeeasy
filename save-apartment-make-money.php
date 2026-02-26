<?php
header('Content-Type: application/json'); 
include("../inc/connect.inc.php")'); // $con is your mysqli connection
session_start();
if (!isset($_SESSION['id'])) {
    echo json_encode(['success' => false, 'msg' => 'User not set']); 
    exit;
}
$type = $_POST['type']; 
$area = $_POST['area']; 
$address = $_POST['address']; 
$landlord = $_POST['landlord'];  
$userId = $_SESSION['id'];
$stmt = $con->prepare(" INSERT INTO apartments (user_id, type, area, address, landlord) VALUES (?,?,?,?,?) ");
if ($stmt === false) {
    echo json_encode(['success' => false, 'msg' => 'prepare failed: '.$con->error]);
    exit;
}
$stmt->bind_param("issss", $userId, $type, $area, $address, $landlord);
$execute = $stmt->execute();
if ($execute) {
    $_SESSION['area'] = $area;
     $_SESSION['type'] = $type;
    $_SESSION['address'] = $address;
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'msg' => 'execute failed: '.$stmt->error]);
}
$stmt->close();
$con->close();
