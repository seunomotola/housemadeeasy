<?php
header('Content-Type: application/json');
include('inc/connect.inc.php'); 
session_start();

$userid = $_SESSION['id']; 
$house_rent = $_POST['house_rent']; 
$agreement = $_POST['agreement']; 
$cleaning = $_POST['cleaning_fee']; 
$damages = $_POST['damages_fee']; 
$security = $_POST['security_fee']; 
$commission = $_POST['commission']; 
$second_year = $_POST['second_year']; 
$nepa = $_POST['nepa_bill']; 


$stmt = $con->prepare("UPDATE users SET house_rent=?,agreement=?,cleaning=?,damages=?,security=?,commission=?,second_year=?,nepa=? WHERE id=?");

$stmt->bind_param("ddddddddd", $house_rent,$agreement,$cleaning,$damages,$security,$commission,$second_year,$nepa,$userid);
$execute = $stmt->execute();

if ($execute) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'msg' => 'execute failed: '.$stmt->error]);
}

$stmt->close();
$con->close();
