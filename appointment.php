<?php
include ('inc/session.php'); 
   //date_default_timezone_set('Africa/Lagos');
$house_price_session=$_SESSION['house_price'];
     $house_id1=$_SESSION['house_id'];
        $query = mysqli_query($con,"SELECT * FROM payment_history WHERE user_email = '$email2' and house_id='$house_id1' "); 
        $row = mysqli_fetch_assoc($query);
        $date_paid = $row['date_paid'];
        $fname= $row['fname'];
        $house_id2= $row['house_id'];
        $lname= $row['lname'];
        $user_email= $row['user_email'];
        $pno= $row['pno'];
        $id= $row['id'];
        $agent= $row['agent'];
        $agent_img= $row['agent_img'];
        $agent_pno= $row['agent_pno'];
        $reference= $row['reference'];
        $payment_expire= $row['payment_expire'];
       // $link_expire=$payment_expire+5*24*60*60;
        $datetoday=strtotime($payment_expire);
        
         //$payment_expire=strtotime($payment_expire);
         //$current_time= time();
          $current_time= time();
         $date= $payment_expire+1*60; //this is for 1minutes
         //give customer 20 min to book
          //$give_customer=strtotime(20*60);
          // add the payment_expire to give_customer
          //$datetoday2=$payment_expire+$give_customer; 
          //$new=
       
    if( $current_time < $date){
        
        include ('appointment_continue.php'); 
         
    
    }elseif ($house_id1!=$house_id2) {
        // code...
    }
    
   
else{
    // echo  "<script>
    //alert('Your Payment Session has expired...');
    //window.location.href='index.php';
   
   // </script>";
    include ('appointment_continue.php'); 
  } 
