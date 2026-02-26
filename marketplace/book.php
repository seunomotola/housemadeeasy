<?php
if(isset($_GET['item_id1'])){
include ('inc/session.php'); 
  
   
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
date_default_timezone_set('Africa/Lagos');
 $date_new=date('Y-m-d', strtotime('tomorrow'));
$bookings = array();
 $sql ="SELECT * from market_place_properties_booking where date='$date_new' ";
$result = mysqli_query($mysqli,$sql);
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
   
    $sql ="SELECT * from market_place_properties_booking where  timeslot='$timeslot'";
$result = mysqli_query($mysqli,$sql); 
 if($result->num_rows>0){
       $msg = "<div class='alert alert-danger'>This Time slot is Already Booked</div>";
       
    }else{
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
$duration = 30;
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
  if(in_array($ts, $bookings)){ ?> 
       <button class="btn btn-danger" ><?php echo $ts; ?></button>
       <?php }else{ ?>
       <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
       <?php }
             ?>
          
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
<?php }else{
    header('location:../index.php');
}
