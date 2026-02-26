 <?php 
 
 include 'inc/session.php';
      if (isset($_GET['reference'])) {
        $_SESSION['reference']=$_GET['reference'];
        $referenced=$_SESSION['reference'];
         
       
        date_default_timezone_set('Africa/Lagos');
        $date_time=date('Y-m-d h:i:s a', time());
        $amount2=$_SESSION['amount'];
    $house_img1=$_SESSION['house_img1'];
                 $house_label_session=$_SESSION['house_label'];
                      $agentaffilate_id_session=$_SESSION['agentaffilate_id'];
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
                     
                     $first_year_rent=$_SESSION['first_year_rent'];
                     $second_year_rent=$_SESSION['second_year_rent'];
                     $house_owner=$_SESSION['house_owner'];
                      $house_id=$_SESSION['house_id'];
                      $negotiable=$_SESSION['negotiable'];
                    
                      $id=$_SESSION['id'];
                      //$payment_expire=time();
                      //$link_expire=date('d-m-Y h:i:s', time() + (60*60*2));
                      $multiple_room_session=$_SESSION['multiple_room']; 
                     $how_many_multiple_room_session=$_SESSION['how_many_multiple_room']; 
      isset($_SESSION['total_price']) ? $_SESSION['total_price'] : '';
           // $sql="UPDATE p set amount_paid='$amount2', status = 'yes', reference='$referenced2',  date_paid=NOW() where portalid='$portalid' AND term='$term'";
                     
            $sql = "INSERT into payment_history(user_email, pno, fname, lname, agent, agent_img, agent_pno, agent_email, location, house_location, type, house_name, house_img1, house_img2, house_img3, house_img4, house_desc, amenities, house_label, distance, kitchen, bathroom, door, fence, water_source, amount_paid, status, date_paid, reference, first_year_rent, second_year_rent, house_id, house_owner, user_id, negotiable, agentaffilate_id) values('$email2', '$pno', '$fname', '$lname', '$house_agent_session', '$house_agent_img_session', '$agent_pno', '$agent_email', '$house_location_session', '$house_exact_session', '$house_type', '$house_name_session',  '$house_img1', '$house_img2_session', '$house_img3_session', '$house_img4_session', '$house_desc_session', '$amenities_session', '$house_label_session', '$distance_session', '$kitchen_session', '$bathroom_session', '$door_session', '$fence_session', '$water_source_session', '$amount2','yes', '$date_time', '$referenced', '$first_year_rent' ,'$second_year_rent', '$house_id', '$house_owner', '$user_id', '$negotiable', '$agentaffilate_id_session')";
        if(mysqli_query($con, $sql)){ 
               if (isset($_COOKIE['referral_code'])) {?>
                     <script>
             alert('Payment Successfull');
             window.location.href='book-referral.php?house_id=<?php echo $house_id; ?>'; 
    </script>;
               <?php }else{?> 
                    <script>
             alert('Payment Successfull');
             window.location.href='book.php?house_id=<?php echo $house_id; ?>'; 
    </script>;
               <?php }
// i we direct the customer to the appointment page
 }
else{
     echo" <script>
             alert('Payment not Successful ...');
             window.location.href='index.php';
    </script>";
                // die(mysqli_error($con));
            }// end of payment not succesful
       
 }// end of ifisset
 
 ?> 
