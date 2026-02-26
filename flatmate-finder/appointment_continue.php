 <?php include ('inc/header.inc.php');   ?> 
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 <style type="text/css">
 
.today{
background:yellow;
}
 </style>
 <?php 
function build_calendar($month, $year){
//$mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');
    
$db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'housemadeeasy';
    $mysqli = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die('no connection to the MYSL server');
if(mysqli_connect_errno()){
    echo 'Failed to connect to the MYSQL: '.mysqli_connect_error();
    }
    
    $daysOfWeek = array('Sunday', 'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
    $firstdayofmonth= mktime(0, 0, 0,$month, 1, $year);
    $numberdays= date('t', $firstdayofmonth);
     $dateComponents = getdate($firstdayofmonth);
     $monthName= $dateComponents['month'];
     // What is the index value (0-6) of the first day of the
// month in question.
$dayOfWeek = $dateComponents['wday'];
// Create the table tag opener and day headers 
$datetoday = date('Y-m-d'); 
$prev_month = date('m', mktime(0, 0, 0, $month-1, 1, $year));
$prev_year = date('Y', mktime(0, 0, 0, $month-1, 1, $year));
$next_month = date('m', mktime(0, 0, 0, $month+1, 1, $year));
$next_year = date('Y', mktime(0, 0, 0, $month+1, 1, $year));
$calendar="<center><h2>$monthName $year</h2>";
$calendar.="<a class='btn btn-primary btn-xs' style='margin-right:10px' href='appointment.php?month=".$prev_month."&year=".$prev_year."'>Prev Month</a>";
$calendar.="<a class='btn btn-primary btn-xs' style='margin-right:10px' href='appointment.php?month=".date('m')."&year=".date('Y')."'>Current Month</a>";
$calendar.="<a class='btn btn-primary btn-xs' style='margin-right:10px' href='appointment.php?month=".$next_month."&year=".$next_year."'>Next Month</a></center>";
$calendar.= "<br><table class='table table-bordered' >"; 
$calendar .= "<tr style='padding:10px; font-size: 8px;'>"; 
// Create the calendar headers 
foreach($daysOfWeek as $day) { 
     $calendar .= "<th class='header'>$day</th>"; 
} 
$calendar.="</tr><tr>";
$currentDay = 1;
// The variable $dayOfWeek is used to 
// ensure that the calendar 
// display consists of exactly 7 columns.
if($dayOfWeek > 0) { 
    for($k=0;$k<$dayOfWeek;$k++){ 
        $calendar .= "<td class='empty'></td>"; 
    } 
}
$month = str_pad($month, 2, "0", STR_PAD_LEFT);
while ($currentDay <= $numberdays) { 
    //Seventh column (Saturday) reached. Start a new row. 
    if ($dayOfWeek == 7) { 
        $dayOfWeek = 0; 
        $calendar .= "</tr><tr>"; 
    } 
    $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT); 
    $date = "$year-$month-$currentDayRel"; 
    $dayname = strtolower(date('l', strtotime($date))); 
    //$eventNum = 0; 
    $today = $date==date('Y-m-d')? "today" : "";
    //is to block some particular day in the week
    if ($dayname=='saturday' || $dayname=='sunday') {
        $calendar.="<td class='$today'><h4>$currentDay</h4> <button class='btn btn-danger btn-xs' style=' font-size: 10px;'>Holiday</button>";
    }
   elseif($date<date('Y-m-d')){
    $calendar.="<td ><h4>$currentDay</h4> <button class='btn btn-danger btn-xs' style=' font-size: 10px;'>N/A</button>";
}
///elseif(in_array($date, $bookings)){
  //  $calendar.="<td class='$today'><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>Already Booked</button>";
//}
else{
    $totalbookings=checkslots($mysqli, $date);
    if($totalbookings==4){
    $calendar.="<td class='$today' ><h4>$currentDay</h4> <a href='#' class='btn btn-primary  btn-xs' style=' font-size: 10px;'>All Booked</a>";
}else{
    $availableslots= 15- $totalbookings;
 $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='book.php?date=".$date."' class='btn btn-success btn-xs' style=' font-size: 10px;'>Book</a><small><i>$availableslots slots left</li></small>";
}
}// end of else
    
   
    
    //Increment counters 
    $currentDay++; 
    $dayOfWeek++; 
} 
//Complete the row of the last week in month, if necessary 
if ($dayOfWeek<= 7) { 
    $remainingDays = 7 - $dayOfWeek; 
    for($i=0;$i<$remainingDays;$i++){ 
        $calendar .= "<td class='empty'></td>"; 
    } 
} 
$calendar .= "</tr></table>"; 
return $calendar;
 
}
function checkslots($mysqli, $date){
   $sql ="SELECT * from bookings where date='$date'";
$result = mysqli_query($mysqli,$sql);
$totalbookings = 0;
  if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $totalbookings++;
        }
       
    }
/*
    $stmt = $mysqli->prepare("select * from bookings where date = ?");
$stmt->bind_param('s', $date);
$totalbookings = 0;
if($stmt->execute()){
    $result = $stmt->get_result();
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $totalbookings++;
        }
        $stmt->close();
    }
}*/
return $totalbookings;
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
        <div class="container" style="margin-right:55px; ">
          
                    <p style="text-align:center; font-weight: bolder;">Pick a date for your Appointment</p>
                    
                   
                    <div class="row">
                        <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12 ">
                            
                  <div id="calendar" > 
                    <center>
     <?php 
      $dateComponents = getdate(); 
      if (isset($_GET['month']) && isset($_GET['year'])) {
        $month = $_GET['month'];
        $year = $_GET['year'];
      }else{
      $month = $dateComponents['mon']; 
      $year = $dateComponents['year']; 
  }
      echo build_calendar($month,$year); 
     ?> 
      </center>
    </div> 
</div>
</div>
                    
               
           
        </div>
    </div>
    <!--Login & Register Section end-->
  
    
    <?php  include ('inc/footer.inc.php');
