<?php
header('Content-Type: application/json'); 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('inc/connect.inc.php'); // database connection

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    http_response_code(401);
    echo "User not logged in";
    exit();
}

$user_id = $_SESSION['id'];

// Ensure 'uploads/' folder exists
$uploadDir = 'uploads/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Validate files exist
if (
    !isset($_FILES['images']) || 
    !isset($_FILES['house_video'])
) {
    http_response_code(400);
    echo "Missing files";
    exit();
}

// Process image uploads
$imageNames = [];

foreach ($_FILES['images']['tmp_name'] as $index => $tmpName) {
    $originalName = basename($_FILES['images']['name'][$index]);
    $uniqueName = uniqid('img_') . '_' . $originalName;
    $destination = $uploadDir . $uniqueName;

    if (move_uploaded_file($tmpName, $destination)) {
        $imageNames[] = $uniqueName;
    }
}

// Process video upload
$videoName = '';
if (isset($_FILES['house_video']['tmp_name']) && is_uploaded_file($_FILES['house_video']['tmp_name'])) {
    $originalVideoName = basename($_FILES['house_video']['name']);
    $uniqueVideoName = uniqid('vid_') . '_' . $originalVideoName;
    $videoDestination = $uploadDir . $uniqueVideoName;

    if (move_uploaded_file($_FILES['house_video']['tmp_name'], $videoDestination)) {
        $videoName = $uniqueVideoName;
    }
}

// Store to DB
$imagesJson = json_encode($imageNames);
$stmt = $con->prepare("UPDATE users SET images = ?, video = ? WHERE id = ?");
$stmt->bind_param("ssi", $imagesJson, $videoName, $user_id);

$execute = $stmt->execute();

if ($execute) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'msg' => 'execute failed: '.$stmt->error]);
}

$stmt->close();
$con->close();