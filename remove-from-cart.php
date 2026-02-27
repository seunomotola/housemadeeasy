<?php
include("../inc/connect.inc.php");
session_start();

if (isset($_POST['property_id'])) {
    $property_id = $_POST['property_id'];
    // Check if the user is logged in
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        // Remove the item from the database cart
        $remove_cart_query = "DELETE FROM cart WHERE user_id = '$user_id' AND property_id = '$property_id'";
        $remove_cart_result = mysqli_query($con, $remove_cart_query);
        if ($remove_cart_result) {
            // Check if any rows were affected
            if (mysqli_affected_rows($con) > 0) {
                // Check if the cart is now empty
                $cart_count_query = "SELECT COUNT(*) as count FROM cart WHERE user_id = '$user_id'";
                $cart_count_result = mysqli_query($con, $cart_count_query);
                $cart_count = mysqli_fetch_assoc($cart_count_result)['count'];
                echo json_encode(['success' => true, 'cart_empty' => $cart_count == 0]);
            } else {
                echo json_encode(['success' => false, 'message' => 'No rows affected. Item may not exist in the cart.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to remove item: ' . mysqli_error($con)]);
        }
    } else {
        // For non-logged-in users, remove the item from the session cart
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            if (($key = array_search($property_id, $cart)) !== false) {
                unset($cart[$key]);
                $_SESSION['cart'] = array_values($cart); // Re-index the array
                // Check if the cart is now empty
                $cart_empty = count($_SESSION['cart']) == 0;
                echo json_encode(['success' => true, 'cart_empty' => $cart_empty]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Item not found in cart.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Cart is empty.']);
        }
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Property ID is missing.']);
}
?>
