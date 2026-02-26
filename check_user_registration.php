<?php
include('inc/session.php'); // Include session
//include('inc/db_connection.php'); // Include your database connection file
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    // Query to check if the user is registered
    $query = "SELECT * FROM user WHERE user_id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo json_encode(['registered' => true]);
    } else {
        echo json_encode(['registered' => false]);
    }
} else {
    echo json_encode(['registered' => false, 'message' => 'No email in session']);
}
?>
