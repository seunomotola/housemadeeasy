<?php
include("../inc/connect.inc.php")');
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $query = mysqli_query($con, "SELECT * FROM properties WHERE id = '$id'");
    if ($row = mysqli_fetch_assoc($query)) {
        // Return JSON response
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'House not found']);
    }
}
?>
