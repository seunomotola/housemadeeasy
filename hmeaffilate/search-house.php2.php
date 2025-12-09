<?php
ob_start();
include ('inc/session.php');  // Replace with your actual database connection file

// Suppress unnecessary output
error_reporting(0);
ini_set('display_errors', 0);



if (isset($_POST['house_type'])) {
    $houseType = $_POST['house_type'];

    $query = "SELECT * FROM properties WHERE type = ? AND status=?";
    $stmt = $con->prepare($query);
     $status = 'yes';
    $stmt->bind_param("ss", $houseType, $status); 
    $stmt->execute();
    $result = $stmt->get_result();

    $houses = [];
    while ($row = $result->fetch_assoc()) {
        $row['house_link'] = "https://www.housemadeeasy.com.ng/details.php?id=" . $row['id'];
        $houses[] = $row;
    }

    echo json_encode($houses);
}
?>
