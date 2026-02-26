<?php
 $multiple_room_session=$_SESSION['multiple_room']; 
    $how_many_multiple_room_session=$_SESSION['how_many_multiple_room'];
     $house_name_session=$_SESSION['house_name'];
                       $house_agent_session=$_SESSION['agent'];
                       $house_agent_img_session=$_SESSION['agent_img'];
                        $house_location_session=$_SESSION['location'];
                         $house_exact_session=$_SESSION['house_location'];
             //$amount2=$_SESSION['amount'];
  
                      $date_booked=date('Y-m-d h:i:s a', time());
    $house_img1=$_SESSION['house_img1'];
                 $house_label_session=$_SESSION['house_label'];
                      //$first_year_rent_session=$_SESSION['first_year_rent'];
                     $location_session=$_SESSION['location'];
                      $house_name_session=$_SESSION['house_name'];
                       $house_agent_session=$_SESSION['agent'];
                        $house_agent_img_session=$_SESSION['agent_img'];
                        $house_location_session=$_SESSION['location'];
                         $house_exact_session=$_SESSION['house_location'];
                          $house_type=$_SESSION['type'];
                         
                     $house_img2_session=$_SESSION['house_img2'];
                     $house_img3_session=$_SESSION['house_img3'];
                     $house_img4_session=$_SESSION['house_img4'];
                     $house_desc_session=$_SESSION['house_desc'];
                     $amenities_session=$_SESSION['amenities'];
                     $distance_session=$_SESSION['distance'];
                     $kitchen_session=$_SESSION['kitchen'];
                     $bathroom_session=$_SESSION['bathroom'];
                     $door_session=$_SESSION['door'];
                     $fence_session=$_SESSION['fence'];
                     $water_source_session=$_SESSION['water_source'];
                      $agent_pno=$_SESSION['agent_pno'];
                     $agent_email=$_SESSION['agent_email'];
                     $first_year_rent_session=$_SESSION['first_year_rent'];
                     $second_year_rent_session=$_SESSION['second_year_rent'];
                     $house_id=$_SESSION['house_id'];
                     $house_owner=$_SESSION['house_owner'];
                     $negotiable=$_SESSION['negotiable'];
                      $agentaffilate_id_session=$_SESSION['agentaffilate_id'];
                    
                      $id=$_SESSION['id'];
                    
                       $multiple_room=$_SESSION['multiple_room'];
                     $how_many_multiple_room=$_SESSION['how_many_multiple_room'];
                     //$_SESSION['referral_code'] = $_COOKIE['referral_code'];
                     $referral_code = $_COOKIE['referral_code'] ?? null;
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
               
        $sql2 = "INSERT INTO bookings_urgent (fname, lname, timeslot, email, date, pno, agent, agent_img, agent_pno, agent_email, location, house_location, type, house_name, house_img1, house_img2, house_img3, house_img4, house_desc, amenities, house_label, distance, kitchen, bathroom, door, fence, water_source, first_year_rent, second_year_rent, house_id, date_booked, multiple_room, how_many_multiple_room, house_owner, user_id, negotiable,  urgent, agentaffilate_id) 
                VALUES ('$fname', '$lname', '$timeslot', '$email2', '$date_new', '$pno', '$house_agent_session', '$house_agent_img_session', '$agent_pno', '$agent_email', '$house_location_session', '$house_exact_session', '$house_type', '{$property['house_name']}', '{$property['house_img1']}', '{$property['house_img2']}', '{$property['house_img3']}', '{$property['house_img4']}', '{$property['house_desc']}', '{$property['amenities']}', '{$property['house_label']}', '{$property['distance']}', '{$property['kitchen']}', '{$property['bathroom']}', '{$property['door']}', '{$property['fence']}', '{$property['water_source']}', '{$property['first_year_rent']}', '{$property['second_year_rent']}', '$house_id_cart', '$date_booked', '{$property['multiple_room']}', '$how_many_multiple_room_new_many', '$house_owner', '$user_id', '$negotiable', 'yes', '$agentaffilate_id_session')";
                mysqli_query($con, $sql2);
                
    }
    elseif ($property['multiple_room'] == 'no') {
        $sql = "INSERT INTO bookings_urgent (fname, lname, timeslot, email, date, pno, agent, agent_img, agent_pno, agent_email, location, house_location, type, house_name, house_img1, house_img2, house_img3, house_img4, house_desc, amenities, house_label, distance, kitchen, bathroom, door, fence, water_source, first_year_rent, second_year_rent, house_id, date_booked, multiple_room, how_many_multiple_room, house_owner, user_id, negotiable, urgent, agentaffilate_id) 
                VALUES ('$fname', '$lname', '$timeslot', '$email2', '$date_new', '$pno', '$house_agent_session', '$house_agent_img_session', '$agent_pno', '$agent_email', '$house_location_session', '$house_exact_session', '$house_type', '{$property['house_name']}', '{$property['house_img1']}', '{$property['house_img2']}', '{$property['house_img3']}', '{$property['house_img4']}', '{$property['house_desc']}', '{$property['amenities']}', '{$property['house_label']}', '{$property['distance']}', '{$property['kitchen']}', '{$property['bathroom']}', '{$property['door']}', '{$property['fence']}', '{$property['water_source']}', '{$property['first_year_rent']}', '{$property['second_year_rent']}', '$house_id_cart', '$date_booked', '{$property['multiple_room']}', '{$property['how_many_multiple_room']}', '$house_owner', '$user_id', '$negotiable', 'yes', '$agentaffilate_id_session')";
    }
                      
       
         
         if(mysqli_query($con, $sql)){
            include 'use_referral.php';
             $clear_cart_query = "DELETE FROM cart WHERE user_id = '$user_id'";
            mysqli_query($con, $clear_cart_query);
          ?>
           <!--  //$msg = "<div class='alert alert-success'>Time slot Booked Successfully...<br> Check your E-mail address For the   Details of the Agent of the House<br>
            //<a href='my-account.php' style='font-weight:bolder'>Click to go to your dashboard</a></div>"; -->
           
            <?php  $bookings[] = $timeslot;
                   //// send email to agent
             $body = '<div class="email-background" style="background: #eee;padding: 10px; ">
          
           <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 20px;">
              <div style="text-align: center;"><img src="https://www.housemadeeasy.org/assets/images/HouseMadeEasylogo.jpg" style="width: 50%; height:50%"></div>';
       $body .= <<<EOD
<br>
 
Dear <b>$house_agent_session</b>,<br><br>
Please Note that one of your apartment at $house_exact_session have been booked for a urgent checking..<br><br> Below are the Details of the Customer that want to come and check it..<br><br>
<ol>
    <li> Date Booked for: $date_new</li>
    <li> Time Booked for: $timeslot</li>
    <li>House Type: $house_name_session </li>
      <li>House Location: $house_exact_session,$location_session </li>
        <li>House Price: $first_year_rent_session</li>
        <li>House Negotiable: $negotiable</li>
        
</ol><br>
<b>SUPPORT:</b> <br>
For any issues with you contacting the customer, you can always contact us on support@housemadeeasy.org or 08160852570, 07037092267<br><br>
Thank You
EOD;
    $body .= '</div>';  
    
    
  $subject = "Checking of Apartment";
//echo '->'.mail($email_owner, $subject, $body, $headers);
  
  $from = "housemadeeasy";
$to = $agent_email;
$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      //
//mail($to, $subject, $body, $headers);
//echo $body;
//              ////end send email to agent
 
                   //// send email to dami
             $body = '<div class="email-background" style="background: #eee;padding: 10px; ">
          
           <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 20px;">
              <div style="text-align: center;"><img src="https://www.housemadeeasy.org/assets/images/HouseMadeEasylogo.jpg" style="width: 50%; height:50%"></div>';
       $body .= <<<EOD
<br> 
 
Dear <b>Dami</b>,<br><br>
Please Note that an apartment at $house_exact_session have been booked for a urgent checking..<br><br> Below are the Details of the Customer that want to come and check it..<br><br>
<ol>
<li> Agent Name: $house_agent_session</li>
<li> Agent Phone Number: $agent_pno</li>
<li> Customer Name: $fname $lname</li>
<li> Customer Phone Number: $pno</li>
    <li> Date Booked for: $date_new</li>
    <li> Time Booked for: $timeslot</li>
    <li>House Type: $house_name_session </li>
      <li>House Location: $house_exact_session,$location_session </li>
        <li>House Price: $first_year_rent_session</li>
        <li>House Negotiable: $negotiable</li>
        
</ol><br>
<b>SUPPORT:</b> <br>
For any issues with you contacting the customer, you can always contact us on support@housemadeeasy.org or 08160852570, 07037092267<br><br>
Thank You
EOD;
    $body .= '</div>';  
    
    
  $subject = "Checking of Apartment";
//echo '->'.mail($email_owner, $subject, $body, $headers);
  
  $from = "housemadeeasy";
$to = "hmehousing@gmail.com";
$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      //
//mail($to, $subject, $body, $headers);
//echo $body;
//              ////end send email to dami
//       //// send email to customer
             $body = '<div class="email-background" style="background: #eee;padding: 10px; ">
          
            <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 20px;">
              <div style="text-align: center;"><img src="https://www.housemadeeasy.org/assets/images/HouseMadeEasylogo.jpg" style="width: 50%; height:50%"></div>';
       $body .= <<<EOD
<br>
 
Dear <b>$lname</b>,<br><br>
Thank you for finding your desire House on Housemadeeasy...<br> Below are the details of the House and agent of the House:<br><br>
<ol>
<br>
<br>
 <li>Agent Name:  Housemadeeasy Customer Care </li>
         <li>Agent Phone Number:  07063826326,08160852570 </li>
         <li> Date Booked for: $date_new  </li>
    <li> Time Booked for: $timeslot</li>
    <li>House Type: $house_name_session </li>
      <li>House Location: $house_exact_session,$location_session </li>
        <li>House Price: $first_year_rent_session</li>
       
</ol><br>
<b>SUPPORT:</b> <br>
For any issues with you contacting the agent of the house, you can always contact us on support@housemadeeasy.org or 08160852570, 07037092267<br><br>
Thank You
EOD;
    $body .= '</div>';  
    
    
  $subject = "House Booking Request";
//echo '->'.mail($email_owner, $subject, $body, $headers); 
  
  $from = "housemadeeasy";
$to = $email2;
$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      //
//mail($to, $subject, $body, $headers);
//echo $body;
//              ////end send email to customer
// // send sms to the user 
 include 'sms_customer.php'; 
// // end send sms to the user
// // send sms to the agent 
 
 include 'sms_agent_urgent.php'; 
// // end send sms to the agent
  // // send sms to kyya 
 
 include 'sms_dami_urgent.php';
// // end send sms to kyya
  // // send sms to elijah 
 
 include 'sms_elijah_urgent.php';
// // end send sms to elijah
?>
  <script>
                 alert('House book Successfull');
             window.location.href='order-page-urgent.php?key=<?php echo $house_id; ?>';
    </script> 
       
        <?php 
 // Destroy the referral code cookie after it has been used
    //setcookie('referral_code', '', time() - 3600, '/'); // Expire the cookie
    }else{
            //die(mysqli_error($con));
            $msg = "<div class='alert alert-danger'>Booking not Successfull</div>";
         }
     }//end of while loop
?>
