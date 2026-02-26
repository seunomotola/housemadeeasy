<?php
include ('inc/session.php'); 
      $query = mysqli_query($con,"SELECT * FROM payment_history WHERE user_email = '$email2'"); 
        $row = mysqli_fetch_assoc($query);
        $date_paid = $row['date_paid'];
        $fname= $row['fname'];
        $lname= $row['lname'];
        $user_email= $row['user_email'];
        $pno= $row['pno'];
        $id= $row['id'];
        $agent= $row['agent'];
        $agent_img= $row['agent_img'];
        $agent_pno= $row['agent_pno'];
        $reference= $row['reference'];
          if(empty($reference)) {
               echo  "<script>
    alert('You cannot view this page until you have pay ...');
    window.location.href='index.php';
    </script>";
    }
   
 include ('inc/header.inc.php');   ?> 
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<?php
$db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'housemadeeasy';
    $mysqli = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die('no connection to the MYSL server');
if(mysqli_connect_errno()){
    echo 'Failed to connect to the MYSQL: '.mysqli_connect_error();
    }
if(isset($_GET['date'])){
    $date = $_GET['date'];
$bookings = array();
 $sql ="SELECT * from bookings where date='$date'";
$result = mysqli_query($mysqli,$sql);
//$totalbookings = 0;
  if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
           $bookings[] = $row['timeslot'];
        }
       
    }
/*
    $stmt = $mysqli->prepare("select * from bookings where date = ?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['timeslot'];
            }
            $stmt->close();
        }
    }
    */
}else{
    header('location:index.php');
}
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $timeslot = $_POST['timeslot'];
     $house_name_session=$_SESSION['house_name'];
                       $house_agent_session=$_SESSION['agent'];
                       $house_agent_img_session=$_SESSION['agent_img'];
                        $house_location_session=$_SESSION['location'];
                         $house_exact_session=$_SESSION['house_location'];
                          $house_type=$_SESSION['type'];
 $sql ="SELECT * from bookings where date='$date' AND timeslot='$timeslot'";
$result = mysqli_query($mysqli,$sql);
 $sql2 ="SELECT * from bookings where date='$date' AND timeslot='$timeslot' AND house_location='$house_exact_session' AND house_name='$house_name_session' AND location='$house_location_session'";
$result2 = mysqli_query($mysqli,$sql2);
//$totalbookings = 0;
  if($result->num_rows>0){
       $msg = "<div class='alert alert-danger'>This Time slot is Already Booked</div>";
       
    }
elseif ($result2->num_rows>0) {
    $msg = "<div class='alert alert-danger'>You have already booked $timeslots for $house_name_session in $house_exact_session</div>";
}
    else{
             //$amount2=$_SESSION['amount'];
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
                     $multiple_room=$_SESSION['multiple_room'];
                     $how_many_multiple_room=$_SESSION['how_many_multiple_room'];
                     //$house_img4_session=$_SESSION['house_img4'];
                     $house_id=$_SESSION['house_id'];
                    
                      $id=$_SESSION['id'];
                      date_default_timezone_set('Africa/Lagos');
                      $date_booked=date('Y-m-d h:i:s a', time());
                      $how_many_multiple_room_new_many= --$how_many_multiple_room;
         $sql= "UPDATE properties set  how_many_multiple_room='$how_many_multiple_room_new_many' where house_id='$house_id'";
        mysqli_query($con, $sql);
         $sql = "INSERT into bookings (fname, lname, timeslot, email, date, pno, agent, agent_img, agent_pno, agent_email, location, house_location, type, house_name, house_img1, house_img2, house_img3, house_img4, house_price, house_desc, amenities, house_label, distance, kitchen, bathroom, door, fence, water_source, first_year_rent, second_year_rent, house_id, date_booked) values('$fname', '$lname', '$timeslot', '$email2','$date', '$pno', '$house_agent_session', '$house_agent_img_session', '$agent_pno', '$agent_email', '$house_location_session', '$house_exact_session', '$house_type', '$house_name_session', '$house_img1',  '$house_img2_session', '$house_img3_session', '$house_img4_session', '$house_price_session', '$house_desc_session', '$amenities_session', '$house_label_session', '$distance_session', '$kitchen_session', '$bathroom_session', '$door_session', '$fence_session', '$water_source_session', '$first_year_rent_session', '$second_year_rent_session', '$house_id', '$date_booked')";
         if(mysqli_query($mysqli, $sql)){
            $msg = "<div class='alert alert-success'>Time slot Booked Successfully...<br> Check your E-mail adreess For the Details of the Agent of the House<br>
            <a href='my-account.php' style='font-weight:bolder'>Click to go to your dashboard</a></div>";
            // echo  "<script>
            // alert('Booking Successful... Please check your dashboard for the details of the house and agent ...');
             //window.location.href='my-account.php';
    //</script>";
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
    <li> Date Booked for: $date</li>
    <li> Time Booked for: $timeslot</li>
     <li>Customer Name: $lname $fname </li>
      <li>Customer Phone Number: $pno </li>
        <li>Customer E-mail: $email2</li>
    <li>House Type: $house_name_session </li>
      <li>House Location: $house_exact_session </li>
        <li>House Price: $house_price_session</li>
        
</ol><br>
<b>SUPPORT:</b> <br>
For any issues with you contacting the customer, you can always contact us on housemadeeasy@gmail.com<br><br>
Thank You
EOD;
    $body .= '</div>';  
    
    
  $subject = "Checking of Apartment";
//echo '->'.mail($email_owner, $subject, $body, $headers);
  
  $from = "housemadeeasy.com.ng";
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
         <li> Date Booked for: $date  </li>
    <li> Time Booked for: $timeslot</li>
    <li>House Type: $house_name_session </li>
      <li>House Location: $house_exact_session </li>
        <li>House Price: $house_price_session</li>
       
</ol><br>
<b>SUPPORT:</b> <br>
For any issues with you contacting the agent of the house, you can always contact us on housemadeeasy@gmail.com<br><br>
Thank You
EOD;
    $body .= '</div>';  
    
    
  $subject = "House Booking Request";
//echo '->'.mail($email_owner, $subject, $body, $headers);
  
  $from = "housemadeeasy.com.ng";
$to = $email;
$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      //
//mail($to, $subject, $body, $headers);
echo $body;
             ////end send email to customer
// send sms to the user
//include 'sms.php';
// end send sms to the user
       
         }else{
            $msg = "<div class='alert alert-danger'>Booking not Successfull</div>";
         }
    }
 
/*
    $stmt = $mysqli->prepare("select * from bookings where date = ? AND timeslot=?");
    $stmt->bind_param('ss', $date, $timeslot);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            $msg = "<div class='alert alert-danger'>Already Booked</div>";
        }else{
            $stmt = $mysqli->prepare("INSERT INTO bookings (name, timeslot, email, date) VALUES (?,?,?,?)");
            $stmt->bind_param('ssss', $name, $timeslot, $email, $date);
            $stmt->execute();
            $msg = "<div class='alert alert-success'>Booking Successfull</div>";
            $bookings[] = $timeslot;
            $stmt->close();
            $mysqli->close();
        }
    }
    */
}
$duration = 30;
$cleanup = 10;
$start = "09:00";
$end = "15:00";
/*
The $duration variable specifies the duration of a timeslot. In our case, the duration of a slot is 15 minutes.
$cleanup variable is used to add gap between two timeslots. If $cleanup is equal is 10. Then the function will add 10 minutes gap between two timeslots. For example, the first slot is 9am to 9.15am, then the next slot will start from 9.25am.
$start variable specifies start of the timeslots.
$end variable specifies end of the timeslots.
Then we'll create a function to generate timeslots using the variables above.
*/
function timeslots($duration, $cleanup, $start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();
    
    for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
            break;
        }
        
        $slots[] = $intStart->format("H:iA")." - ". $endPeriod->format("H:iA");
        
    }
    
    return $slots;
}
?>
 
  <!--Page Banner Section start-->
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Appointment  Booking</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Appointment  Booking</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->
    <!--Login & Register Section start-->
    <div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container" style="margin-right:65px; ">
          
                    
                    
               <!-- date('m/d/y')-->
        <h1 class="text-center" style="text-align:center; font-weight: bolder; font-size: 20px;">You Picked Date: <?php echo date('F d, Y', strtotime($date)); ?></h1>
        <p style="text-align:center; font-weight: bolder; font-size: 15px">Pick a Time for your Appointment</p>
        <hr>
        <center>
      <div class="row">
   <div class="col-sm-12 col-md-12 col-xs-12 col-xl-12 col-lg-12">
       <?php echo(isset($msg))?$msg:""; ?>
   </div>
    <?php $timeslots = timeslots($duration, $cleanup, $start, $end); 
        foreach($timeslots as $ts){
    ?>
    <div class=" col-sm-4 col-md-4 col-xs-6 col-lg-2  ">
        <div class="form-group">
            <?php if(in_array($ts, $bookings)){ ?>
       <button class="btn btn-danger"><?php echo $ts; ?></button>
       <?php }else{ ?>
       <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
       <?php }  ?>
          
        </div>
    
    </div>
    <?php } ?>
</div>
                    
   </center>            
           
        </div>
    </div>
    <!--Login & Register Section end-->
    <!---modal begin --->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                   
                    <h4 class="modal-title">Booking for: <span id="slot"></span></h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                               <div class="form-group">
                                    <label for="">Time Slot</label>
                                    <input readonly type="text" class="form-control" id="timeslot" name="timeslot">
                                </div>
                               
                                <div class="form-group pull-right">
                                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!---modal end --->
   
    
    <?php  include ('inc/footer.inc.php');   ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
     <script>
$(".book").click(function(){
    var timeslot = $(this).attr('data-timeslot');
    $("#slot").html(timeslot);
    $("#timeslot").val(timeslot);
   
    $("#myModal").modal("show");
});
</script>
