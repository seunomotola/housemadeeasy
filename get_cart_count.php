<?php
include('inc/session.php');
//session_start();
 
$response = ['success' => false, 'cart_count' => 0];

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Get cart count from the database for logged-in users
    $cart_count_query = "SELECT COUNT(*) as count FROM cart WHERE user_id = '$user_id'";
    $cart_count_result = mysqli_query($con, $cart_count_query);

    if ($cart_count_result) {
        $cart_count = mysqli_fetch_assoc($cart_count_result)['count'];
        $response['success'] = true;
        $response['cart_count'] = $cart_count;
    } else {
        $response['message'] = 'Failed to get cart count: ' . mysqli_error($con);
    }
} else {
    // Get cart count from the session for non-logged-in users
    if (isset($_SESSION['cart']) && $_SESSION['house_id']) {
        $response['success'] = true;
        $response['cart_count'] = count($_SESSION['cart']);
    }
}

echo json_encode($response);
?>
