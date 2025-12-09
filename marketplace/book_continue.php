<?php

             //$amount2=$_SESSION['amount'];
  
                      $date_booked=date('Y-m-d h:i:s a', time());
    $item_img1_session=$_SESSION['item_img1'];
                 $item_label_session=$_SESSION['item_label'];
                      $item_price_session=$_SESSION['item_price'];
                     $item_location_session=$_SESSION['item_location'];
                      $item_name_session=$_SESSION['item_name'];

                      $item_cat_session=$_SESSION['item_cat'];
                      
                      
                       
                         
                         
                         
                     $item_img2_session=$_SESSION['item_img2'];
                     $item_img3_session=$_SESSION['item_img3'];
                     $item_img4_session=$_SESSION['item_img4'];

                     $item_desc_session=$_SESSION['item_desc'];
                   
                     $item_id=$_SESSION['item_id'];

                    
                    
                      $id=$_SESSION['id'];
                    
                      

        //  $sql= "UPDATE properties set  how_many_multiple_room='$how_many_multiple_room_new_many' where house_id='$house_id'";
        // mysqli_query($con, $sql);
       
         $sql = "INSERT into market_place_properties_booking (fname, lname, timeslot, email, date_given, pno, item_location, item_name, item_cat, item_img1, item_img2, item_img3, item_img4, item_price, item_label, item_desc,item_id , date_booked) values('$fname', '$lname', '$timeslot', '$email2','$date_new', '$pno', '$item_location_session', '$item_name_session', '$item_cat_session', '$item_img1_session',  '$item_img2_session', '$item_img3_session', '$item_img4_session', '$item_price_session', '$item_label_session', '$item_desc_session', '$item_id', '$date_booked')";
         if(mysqli_query($mysqli, $sql)){
            //$msg = "<div class='alert alert-success'>Time slot Booked Successfully...<br> Check your E-mail address For the   Details of the Agent of the House<br>
            //<a href='my-account.php' style='font-weight:bolder'>Click to go to your dashboard</a></div>";
           
             $bookings[] = $timeslot;

                   //// send email to agent 

             $body = '<div class="email-background" style="background: #eee;padding: 10px; ">
          
           <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 20px;">
              <div style="text-align: center;"><img src="https://www.housemadeeasy.org/assets/images/HouseMadeEasylogo.jpg" style="width: 50%; height:50%"></div>';
       $body .= <<<EOD
<br>
 
Dear <b>Elijah</b>,<br><br>

Please Note that a student has booked an item and has booked a time with you to come and check the item...<br><br> Below are the Details of the Customer that want to come and check it..<br><br>
<ol>
    <li> Date Booked for: $date_new</li>
    <li> Time Booked for: $timeslot</li>
     <li>Customer Name: $lname $fname </li>
      <li>Customer Phone Number: $pno </li>
        <li>Customer E-mail: $email2</li>
    <li>Item Name: $item_name_session </li>
      <li>Item Location: $item_location_session </li>
        <li>Item Price: $item_price_session</li>
        
</ol><br>




<b>SUPPORT:</b> <br>
For any issues with you contacting the customer, you can always contact us on info@housemadeeasy.com.ng or 08160852570, 07037092267<br><br>

Thank You
EOD;

    $body .= '</div>';  
    
    
  $subject = "Checking of Item";

//echo '->'.mail($email_owner, $subject, $body, $headers);

  

  $from = "housemadeeasy.org";
$to = "oluwoleelijah2018@gmail.com";
//elijah e-mail address



$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      //

mail($to, $subject, $body, $headers);
//echo $body;



             ////end send email to agent




                   //// send email to dami

             $body = '<div class="email-background" style="background: #eee;padding: 10px; ">
          
           <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 20px;">
              <div style="text-align: center;"><img src="https://www.housemadeeasy.org/assets/images/HouseMadeEasylogo.jpg" style="width: 50%; height:50%"></div>';
       $body .= <<<EOD
<br>
 
Dear <b>Dami</b>,<br><br>

Please Note that a student has booked an item and has booked a time with you to come and check the item...<br><br> Below are the Details of the Customer that want to come and check it..<br><br>
<ol>
    <li> Date Booked for: $date_new</li>
    <li> Time Booked for: $timeslot</li>
     <li>Customer Name: $lname $fname </li>
      <li>Customer Phone Number: $pno </li>
        <li>Customer E-mail: $email2</li>
    <li>Item Name: $item_name_session </li>
      <li>Item Location: $item_location_session </li>
        <li>Item Price: $item_price_session</li>
        
</ol><br>




<b>SUPPORT:</b> <br>
For any issues with you contacting the customer, you can always contact us on info@housemadeeasy.com.ng or 08160852570, 07037092267<br><br>

Thank You
EOD;

    $body .= '</div>';  
    
    
  $subject = "Checking of Item";

//echo '->'.mail($email_owner, $subject, $body, $headers);

  

  $from = "housemadeeasy.org";
$to = "hmecampusyard@gmail.com";
//elijah e-mail address



$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      //

mail($to, $subject, $body, $headers);
//echo $body;



             ////end send email to dami



      //// send email to customer

             $body = '<div class="email-background" style="background: #eee;padding: 10px; ">
          
            <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 20px;">
              <div style="text-align: center;"><img src="https://www.housemadeeasy.org/assets/images/HouseMadeEasylogo.jpg" style="width: 50%; height:50%"></div>';
       $body .= <<<EOD
<br>
 
Dear <b>$lname</b>,<br><br>

Thank you for finding your desire student item on Housemadeeasy...<br> Below are the details of the item and seller of the item:<br><br>
<ol>
<br>
 <li>Seller Name:  Oluwadamilola </li>
         <li>Seller Phone Number: 07063826326</li> 
         
         <li> Date Booked for: $date_new  </li>
    <li> Time Booked for: $timeslot</li>
    <li>Item Name: $item_name_session </li>
      <li>Item Location: $item_location_session </li>
        <li>Item Price: $item_price_session</li>

       
</ol><br>


<b>SUPPORT:</b> <br>
For any issues with you contacting the agent of the house, you can always contact us on info@housemadeeasy.com.ng or 08160852570, 07037092267<br><br>

Thank You
EOD;

    $body .= '</div>';  
    
    
  $subject = "Item Booking Request";

//echo '->'.mail($email_owner, $subject, $body, $headers);

  

  $from = "housemadeeasy.org";
$to = $email2;



$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      //

mail($to, $subject, $body, $headers);
//echo $body;



             ////end send email to customer

// send sms to the user 

include 'marketplace_booked_sms_customer.php'; 

// end send sms to the user

// send sms to the agent 

include 'marketplace_booked_sms_to_me.php';

// end send sms to the agent

// send sms to the dami 

include 'marketplace_booked_sms_to_dami.php';

// end send sms to the dami

 echo  "<script>
             alert('This item was booked Successful... Check your E-mail and SMS for details of the seller ...');
              window.location.href='index.php';
    </script>";

       
         }else{

            //die(mysqli_error($con));
            $msg = "<div class='alert alert-danger'>Booking not Successfull</div>";

         }
?>