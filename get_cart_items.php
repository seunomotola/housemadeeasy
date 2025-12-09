<?php
include('inc/session.php');

$is_logged_in = isset($_SESSION['user_id']);
$cart_items = [];

if ($is_logged_in) {
    $user_id = $_SESSION['user_id'];

    // Fetch the cart items for the logged-in user
    $cart_query = "SELECT properties.*, cart.quantity 
                   FROM cart 
                   JOIN properties ON cart.property_id = properties.id 
                   WHERE cart.user_id = '$user_id'";
    $cart_result = mysqli_query($con, $cart_query);

    while ($item = mysqli_fetch_assoc($cart_result)) {
        $cart_items[] = $item;
    }
} else {
    // Fetch cart items from the session for non-logged-in users
    if (isset($_SESSION['cart'])) {
        $session_cart = $_SESSION['cart'];
        foreach ($session_cart as $property_id) {
            $cart_query = "SELECT * FROM properties WHERE id = '$property_id'";
            $cart_result = mysqli_query($con, $cart_query);

            while ($item = mysqli_fetch_assoc($cart_result)) {
                $item['quantity'] = 1; // Default quantity for session items
                $cart_items[] = $item;
            }
        }
    }
}

$response = [
    'success' => true,
    'cart_empty' => empty($cart_items),
    'cart_items' => $cart_items
];

header('Content-Type: application/json');
echo json_encode($response);
?>
