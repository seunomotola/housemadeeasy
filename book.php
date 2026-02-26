<?php
if(isset($_GET['house_id'])){ 
include ('inc/session.php'); 
      $query = mysqli_query($con,"SELECT * FROM payment_history WHERE user_id = '$user_id'"); 
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
     //$total_price=$_SESSION['total_price'];
   
 include ('inc/header.inc.php');   ?> 
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <style>
        .modal-dialog {
            display: flex;
            align-items: center;
            min-height: calc(100% - 1rem);
        }
        .modal-content {
            margin: auto;
        }
        .cart-icon {
            position: relative;
            display: inline-block;
        }
        .cart-icon img {
            width: 24px;
            height: 24px;
        }
        #cart-count {
            position: absolute;
            top: -10px;
            right: -10px;
            background: red;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
        }
         .modal-footer .btn {
            
            font-size: 14px;
        }
    </style>
<?php
/*
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
    
}else{
    header('location:index.php');
}
*/
 isset($_SESSION['total_price']) ? $_SESSION['total_price'] : '';
date_default_timezone_set('Africa/Lagos');
 $multiple_room = isset($_SESSION['multiple_room']) ? $_SESSION['multiple_room'] : 'no';
 $date_new=date('Y-m-d', strtotime('tomorrow'));
$bookings = array();
 $sql ="SELECT * from bookings where date='$date_new' and multiple_room='$multiple_room' ";
$result = mysqli_query($con,$sql);
//$totalbookings = 0;
  if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
           $bookings[] = $row['timeslot'];
        }
       
    } 
global $timeslot;
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    //$email = $_POST['email'];
    
     $timeslot = $_POST['timeslot']; 
   
if ($multiple_room=='yes') {
    $sql ="SELECT * from bookings where  timeslot='$timeslot' AND multiple_room='$multiple_room'";
$result = mysqli_query($con,$sql); 
 if($result->num_rows>0){
       $msg = "<div class='alert alert-danger'>This Time slot is Already Booked</div>";
       
    }else{
         include 'book_continue.php';
    }
}elseif ($multiple_room=='no'){
   
   include 'book_continue.php';
    
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
$duration = 60;
$cleanup = 10;
$start = "09:00";
$end = "18:00";
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
        
        $slots[] = $intStart->format("h:iA")." - ". $endPeriod->format("h:iA");
        
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
        <h1 class="text-center" style="text-align:center; font-weight: bolder; font-size: 20px;">Your Appointment Date is: <?php echo date('F, d, Y', strtotime('tomorrow')); ?></h1>
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
            <?php 
            if ($multiple_room=='yes') {
               
                
        if(in_array($ts, $bookings)){ 
              $sql ="SELECT * from bookings where  timeslot='$ts' and multiple_room='$multiple_room'";
                $result = mysqli_query($con,$sql);
                 if($result->num_rows>0){
            ?>
       <button class="btn btn-danger book3"><?php echo $ts; ?></button>
       <?php }
       
    }else{ ?>
       <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
       <?php }
}elseif ($multiple_room=='no'){
  if(in_array($ts, $bookings)){ ?>
       <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
       <?php }else{ ?>
       <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
       <?php }
}
//echo isset($_SESSION['total_price']) ? $_SESSION['total_price'] : '';
             ?>
          
        </div>
    
    </div>
    <?php } 
//echo isset($_SESSION['total_price']) ? $_SESSION['total_price'] : '';
    ?>
</div>
                    
   </center>            
           
        </div>
    </div>
    <!--Login & Register Section end-->
    <!---modal begin --->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                   
                    <h4 class="modal-title text-center"><span class="text-center" style="text-align:center">Hello <?php echo ucwords($lname)?></span>,<br> Confirm the details of your Booking Time for : <span id="slot"></span></h4>
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
        <!---modal begin --->
    <div id="myModal3" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                   
                    <h4 class="modal-title text-center"><span class="text-center" style="text-align:center">Hello <?php echo ucwords($lname)?></span>,<br> Confirm the details of your Booking Time for : <span id="slot"></span></h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                           <p>This time had already been booked. Please choose another time</p>
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
$(".book3").click(function(){
    
   
    $("#myModal3").modal("show");
});
</script>
<?php }else{
    header('location:index.php');
}
