<?php
header('Content-Type: application/json'); 
include("../inc/connect.inc.php");
session_start();
$name = $_POST['name']; 
$whatsapp = $_POST['whatsapp']; 
$phone = $_POST['phone'];  
$stmt = $con->prepare(" INSERT INTO users (name, phone, whatsapp) VALUES (?,?,?) ");
if ($stmt === false) {
    echo json_encode(['success' => false, 'msg' => 'prepare failed: '.$con->error]);
    exit;
}
$stmt->bind_param("sss", $name, $phone, $whatsapp);
$execute = $stmt->execute();
if ($execute) {
    $userId = $con->insert_id;
    $_SESSION['id'] = $userId;
    $_SESSION['name'] = $name;
    $_SESSION['phone'] = $phone;
    $_SESSION['whatsapp'] = $whatsapp;
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'msg' => 'execute failed: '.$stmt->error]);
}
$stmt->close();
$con->close();
