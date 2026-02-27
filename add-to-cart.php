<?php
include("../inc/connect.inc.php");

session_start();
if (isset($_POST['property_id'])) {
    $property_id = $_POST['property_id'];
    $house_id = $_POST['house_id'];
    // Check if the user is logged in
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        // Check if the item is already in the cart
        $check_cart_query = "SELECT * FROM cart WHERE user_id = '$user_id' AND property_id = '$property_id' AND house_id='$house_id'";
        $check_cart_result = mysqli_query($con, $check_cart_query);
        if ($check_cart_result) {
            if (mysqli_num_rows($check_cart_result) > 0) {
                // The item is already in the cart
                echo json_encode(['success' => false, 'message' => 'This house has already been added to the cart.']);
            } else {
                // Insert new item into the cart
                date_default_timezone_set('Africa/Lagos');
                 $date_add_to_cart=date('Y-m-d h:i:s a', time());
                $insert_cart_query = "INSERT INTO cart (user_id, property_id, house_id, added_on) VALUES ('$user_id', '$property_id', '$house_id', '$date_add_to_cart')";
                $insert_cart_result = mysqli_query($con, $insert_cart_query); 
                if (!$insert_cart_result) {
                    echo json_encode(['success' => false, 'message' => 'Failed to insert into cart: ' . mysqli_error($con)]);
                    exit;
                }
                // Get the updated cart count
                $cart_count_query = "SELECT COUNT(*) as count FROM cart WHERE user_id = '$user_id'";
                $cart_count_result = mysqli_query($con, $cart_count_query);
                if ($cart_count_result) {
                    $cart_count = mysqli_fetch_assoc($cart_count_result)['count'];
                    echo json_encode(['success' => true, 'cart_count' => $cart_count]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Failed to get cart count: ' . mysqli_error($con)]);
                }
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to check cart: ' . mysqli_error($con)]);
        }
    } else {
        // For non-logged-in users, use session to store cart items
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        // Check if the item is already in the session cart
        if (in_array($property_id, $_SESSION['cart'])) {
            echo json_encode(['success' => false, 'message' => 'This house has already been added to the cart.']);
        } else {
            // Add the item to the session cart
            $_SESSION['cart'][] = $property_id;
            // Return the updated cart count
            $cart_count = count($_SESSION['cart']);
            echo json_encode(['success' => true, 'cart_count' => $cart_count]);
        }
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Property ID is missing.']);
}
?>
