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
                      $house_price_session=$_SESSION['house_price'];
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
                    
                      $id=$_SESSION['id'];
                    
                       $multiple_room=$_SESSION['multiple_room'];
                     $how_many_multiple_room=$_SESSION['how_many_multiple_room'];
                      $how_many_multiple_room_new_many= --$how_many_multiple_room;

         $sql= "UPDATE properties set  how_many_multiple_room='$how_many_multiple_room_new_many' where house_id='$house_id'";
        mysqli_query($con, $sql);
       
         $sql = "INSERT into flatmate_finder_bookings (fname, lname, timeslot, email, date, pno, agent, agent_img, agent_pno, agent_email, location, house_location, type, house_name, house_img1, house_img2, house_img3, house_img4, house_price, house_desc, amenities, house_label, distance, kitchen, bathroom, door, fence, water_source, first_year_rent, second_year_rent, house_id, date_booked, multiple_room, how_many_multiple_room, house_owner) values('$fname', '$lname', '$timeslot', '$email2','$date_new', '$pno', '$house_agent_session', '$house_agent_img_session', '$agent_pno', '$agent_email', '$house_location_session', '$house_exact_session', '$house_type', '$house_name_session', '$house_img1',  '$house_img2_session', '$house_img3_session', '$house_img4_session', '$house_price_session', '$house_desc_session', '$amenities_session', '$house_label_session', '$distance_session', '$kitchen_session', '$bathroom_session', '$door_session', '$fence_session', '$water_source_session', '$first_year_rent_session', '$second_year_rent_session', '$house_id', '$date_booked', '$multiple_room', '$how_many_multiple_room_new_many', '$house_owner')";
         if(mysqli_query($mysqli, $sql)){
            //$msg = "<div class='alert alert-success'>Time slot Booked Successfully...<br> Check your E-mail address For the   Details of the Agent of the House<br>
            //<a href='my-account.php' style='font-weight:bolder'>Click to go to your dashboard</a></div>";
            echo  "<script>
             alert('House book Successful... Check your E-mail and SMS for details of  Agent of the House ...');
             window.location.href='index.php';
    </script>";
             $bookings[] = $timeslot;

                   //// send email to agent

             $body = '<div class="email-background" style="background: #eee;padding: 10px; ">
          
           <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 20px;">
              <div style="text-align: center;"><img src="assets/images/HouseMadeEasylogo.jpg" style="width: 50%; height:50%"></div>';
       $body .= <<<EOD
<br>
 
Dear <b>$house_agent_session</b>,<br><br>

Please Note that one of your apartment at $house_exact_session have been booked for checking..<br><br> Below are the Details of the Customer that want to come and check it..<br><br>
<ol>
    <li> Date Booked for: $date_new</li>
    <li> Time Booked for: $timeslot</li>
     <li>Customer Name: $lname $fname </li>
      <li>Customer Phone Number: $pno </li>
        <li>Customer E-mail: $email2</li>
    <li>House Type: $house_name_session </li>
      <li>House Location: $house_exact_session,$location_session </li>
        <li>House Price: $house_price_session</li>
        
</ol><br>




<b>SUPPORT:</b> <br>
For any issues with you contacting the customer, you can always contact us on support@housemadeeasy.org or 08160852570, 07037092267<br><br>

Thank You
EOD;

    $body .= '</div>';  
    
    
  $subject = "Checking of Apartment";

//echo '->'.mail($email_owner, $subject, $body, $headers);

  

  $from = "support@housemadeeasy.org";
$to = $agent_email;



$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      //

//mail($to, $subject, $body, $headers);
echo $body;



             ////end send email to agent



      //// send email to customer

             $body = '<div class="email-background" style="background: #eee;padding: 10px; ">
          
            <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 20px;">
              <div style="text-align: center;"><img src="assets/images/HouseMadeEasylogo.jpg" style="width: 50%; height:50%"></div>';
       $body .= <<<EOD
<br>
 
Dear <b>$lname</b>,<br><br>

Thank you for finding your desire House on Housemadeeasy...<br> Below are the details of the House and agent of the House:<br><br>
<ol>
<div >Agent Picture<br><br>
<img width="100" height="100" src="assets/images/agent_img/$house_agent_img_session"></div><br>
 <li>Agent Name:  $house_agent_session </li>
         <li>Agent Phone Number:  $agent_pno</li>
         <li>Agent E-mail:  $agent_email </li>
         <li> Date Booked for: $date_new  </li>
    <li> Time Booked for: $timeslot</li>
    <li>House Type: $house_name_session </li>
      <li>House Location: $house_exact_session,$location_session </li>
        <li>House Price: $house_price_session</li>

       
</ol><br>


<b>SUPPORT:</b> <br>
For any issues with you contacting the agent of the house, you can always contact us on support@housemadeeasy.org or 08160852570, 07037092267<br><br>

Thank You
EOD;

    $body .= '</div>';  
    
    
  $subject = "House Booking Request";

//echo '->'.mail($email_owner, $subject, $body, $headers);

  

  $from = "support@housemadeeasy.org";
$to = $email2;



$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      //

//mail($to, $subject, $body, $headers);
echo $body;



             ////end send email to customer

// send sms to the user 

include 'sms_customer.php';

// end send sms to the user

// send sms to the agent 

include 'sms_agent.php';

// end send sms to the agent



       
         }else{

            //die(mysqli_error($con));
            $msg = "<div class='alert alert-danger'>Booking not Successfull</div>";

         }
?>