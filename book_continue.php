<?php
// Fetch session variables
$multiple_room_session = $_SESSION['multiple_room']; 
$how_many_multiple_room_session = $_SESSION['how_many_multiple_room'];
$house_name_session = $_SESSION['house_name'];
$house_agent_session = $_SESSION['agent'];
$house_agent_img_session = $_SESSION['agent_img'];
$house_location_session = $_SESSION['location'];
$house_exact_session = $_SESSION['house_location'];
$date_booked = date('Y-m-d h:i:s a', time());
$house_img1 = $_SESSION['house_img1'];
$house_label_session = $_SESSION['house_label'];
$house_type = $_SESSION['type'];
$house_img2_session = $_SESSION['house_img2'];
$house_img3_session = $_SESSION['house_img3'];
$house_img4_session = $_SESSION['house_img4'];
$house_desc_session = $_SESSION['house_desc'];
$amenities_session = $_SESSION['amenities'];
$distance_session = $_SESSION['distance'];
$kitchen_session = $_SESSION['kitchen'];
$bathroom_session = $_SESSION['bathroom'];
$door_session = $_SESSION['door'];
$fence_session = $_SESSION['fence'];
$water_source_session = $_SESSION['water_source'];
$agent_pno = $_SESSION['agent_pno'];
$agent_email = $_SESSION['agent_email'];
$first_year_rent_session = $_SESSION['first_year_rent'];
$second_year_rent_session = $_SESSION['second_year_rent'];
$house_id = $_SESSION['house_id'];
$house_owner = $_SESSION['house_owner'];
$negotiable = $_SESSION['negotiable'];
$agentaffilate_id_session = $_SESSION['agentaffilate_id'];
$id = $_SESSION['id'];
$user_id = $_SESSION['user_id'];
$multiple_room = $_SESSION['multiple_room'];
$how_many_multiple_room = $_SESSION['how_many_multiple_room'];

$_SESSION['referral_code'] = $_COOKIE['referral_code'];

// Fetch cart items for the user
$cart_query = "SELECT * FROM cart WHERE user_id = '$user_id'";
$cart_result = mysqli_query($con, $cart_query);

// Check if the cart is empty
if (mysqli_num_rows($cart_result) == 0) {
    echo "<div class='alert alert-warning'>Your cart is empty.</div>";
    exit;
}

// Loop through the cart items and insert each one into the bookings table
while ($cart_item = mysqli_fetch_assoc($cart_result)) {
    $property_id = $cart_item['property_id'];
    $house_id_cart = $cart_item['house_id'];
    
    // Fetch property details
    $property_query = "SELECT * FROM properties WHERE house_id = '$house_id_cart'";
    $property_result = mysqli_query($con, $property_query);
    $property = mysqli_fetch_assoc($property_result); 

    // Insert booking for each item
    if ($property['multiple_room'] == 'yes' && $property['how_many_multiple_room'] > 0) {
        $how_many_multiple_room_new_many = --$property['how_many_multiple_room'];
        $update_property_query = "UPDATE properties SET how_many_multiple_room='$how_many_multiple_room_new_many' WHERE house_id='$house_id_cart' AND multiple_room='yes'";
        mysqli_query($con, $update_property_query);




        $sql2 = "INSERT INTO bookings (fname, lname, timeslot, email, date, pno, agent, agent_img, agent_pno, agent_email, location, house_location, type, house_name, house_img1, house_img2, house_img3, house_img4, house_desc, amenities, house_label, distance, kitchen, bathroom, door, fence, water_source, first_year_rent, second_year_rent, house_id, date_booked, multiple_room, how_many_multiple_room, house_owner, user_id, negotiable, agentaffilate_id) 
                VALUES ('$fname', '$lname', '$timeslot', '$email2', '$date_new', '$pno', '$house_agent_session', '$house_agent_img_session', '$agent_pno', '$agent_email', '$house_location_session', '$house_exact_session', '$house_type', '{$property['house_name']}', '{$property['house_img1']}', '{$property['house_img2']}', '{$property['house_img3']}', '{$property['house_img4']}', '{$property['house_desc']}', '{$property['amenities']}', '{$property['house_label']}', '{$property['distance']}', '{$property['kitchen']}', '{$property['bathroom']}', '{$property['door']}', '{$property['fence']}', '{$property['water_source']}', '{$property['first_year_rent']}', '{$property['second_year_rent']}', '$house_id_cart', '$date_booked', '{$property['multiple_room']}', '$how_many_multiple_room_new_many', '$house_owner', '$user_id', '$negotiable', '$agentaffilate_id_session')";
                mysqli_query($con, $sql2);
    } elseif ($property['multiple_room'] == 'no') {

        ///include 'use_referral.php';
        
        $sql = "INSERT INTO bookings (fname, lname, timeslot, email, date, pno, agent, agent_img, agent_pno, agent_email, location, house_location, type, house_name, house_img1, house_img2, house_img3, house_img4, house_desc, amenities, house_label, distance, kitchen, bathroom, door, fence, water_source, first_year_rent, second_year_rent, house_id, date_booked, multiple_room, how_many_multiple_room, house_owner, user_id, negotiable, agentaffilate_id) 
                VALUES ('$fname', '$lname', '$timeslot', '$email2', '$date_new', '$pno', '$house_agent_session', '$house_agent_img_session', '$agent_pno', '$agent_email', '$house_location_session', '$house_exact_session', '$house_type', '{$property['house_name']}', '{$property['house_img1']}', '{$property['house_img2']}', '{$property['house_img3']}', '{$property['house_img4']}', '{$property['house_desc']}', '{$property['amenities']}', '{$property['house_label']}', '{$property['distance']}', '{$property['kitchen']}', '{$property['bathroom']}', '{$property['door']}', '{$property['fence']}', '{$property['water_source']}', '{$property['first_year_rent']}', '{$property['second_year_rent']}', '$house_id_cart', '$date_booked', '{$property['multiple_room']}', '{$property['how_many_multiple_room']}', '$house_owner', '$user_id', '$negotiable', '$agentaffilate_id_session')";
    }

   
if (mysqli_query($con, $sql)) {
  
    $clear_cart_query = "DELETE FROM cart WHERE user_id = '$user_id'";
    mysqli_query($con, $clear_cart_query);
    ?>
    <script>

                 alert('House book Successfull');
             window.location.href='order-page.php?key=<?php echo $house_id; ?>';
    </script>
    
    <?php
    include 'mail-house-booking-agent.php';
    include 'mail-house-booking-dami.php';
    include 'mail-house-booking-customer.php';
    include 'sms_customer.php';
    include 'sms_agent.php';
    include 'sms_dami.php';
    include 'sms_elijah.php';
} else {
    // $msg = "<div class='alert alert-danger'>Booking not successful</div>";
    // echo $msg;
    die(mysqli_error($con));
} 
}


?>
