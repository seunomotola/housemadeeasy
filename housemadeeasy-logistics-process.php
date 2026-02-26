 <?php
	include("../inc/connect.inc.php")'); 
function val($data){
	$data= trim($data);
	$data= stripslashes($data);
	$data =strip_tags($data);
	
	return $data;
}
	//$id='';
	if(isset($_POST['submitload'])){
		$lname=mysqli_real_escape_string($con, $_POST['lname']);
		$fname=mysqli_real_escape_string($con, $_POST['fname']);
		$pno=mysqli_real_escape_string($con, $_POST['pno']);
		$email=mysqli_real_escape_string($con, $_POST['email']);
		$itemDescription=mysqli_real_escape_string($con, $_POST['itemDescription']);
		
		$locationofload=mysqli_real_escape_string($con, $_POST['locationofload']);
		$destinationofload=mysqli_real_escape_string($con, $_POST['destinationofload']);
		
		$datetransport=mysqli_real_escape_string($con, $_POST['datetransport']);
		date_default_timezone_set('Africa/Lagos');
		$date_booked=date('Y-m-d h:i:s a', time()); 
			$photo1 = $_FILES['photo1']['name'];
			$photo2 = $_FILES['photo2']['name'];
			$photo3 = $_FILES['photo3']['name'];
			$photo4 = $_FILES['photo4']['name'];
		
		 
		
	move_uploaded_file($_FILES['photo1']['tmp_name'], 'assets/images/housemadeeasy-logistics/'.$photo1);
	move_uploaded_file($_FILES['photo2']['tmp_name'], 'assets/images/housemadeeasy-logistics/'.$photo2);
	move_uploaded_file($_FILES['photo3']['tmp_name'], 'assets/images/housemadeeasy-logistics/'.$photo3);
	move_uploaded_file($_FILES['photo4']['tmp_name'], 'assets/images/housemadeeasy-logistics/'.$photo4);
		
		
		
		if (empty( $lname && $pno && $fname  && $locationofload && $destinationofload && $email  && $datetransport && $photo1 && $photo2 && $photo3 && $photo4 && $itemDescription)) {
			  echo  "<script>
             alert('Fill in all Fields');
             
             
    </script>";
			
		}
		
    
		else{
			 $query = "INSERT into logistics_booking(lname, fname, email, pno, locationofload, destinationofload, datetransport, date_booked, photo1, photo2, photo3, photo4, itemDescription) values('$lname', '$fname', '$email', '$pno', '$locationofload', '$destinationofload', '$datetransport', '$date_booked', '$photo1', '$photo2', '$photo3', '$photo4', '$itemDescription')";
			  if(mysqli_query($con, $query)){
			  
			  
			include 'housemadeeasy-logistics-process-email-customer.php'; 
			include 'housemadeeasy-logistics-process-email-me.php';
			include 'housemadeeasy-logistics-process-email-sammy.php'; 
include 'request_sms_housemadeeasy_logistics_customer.php'; 
 
include 'request_sms_housemadeeasy_logistics-me.php';
include 'request_sms_housemadeeasy_logistics-sammy.php';
             echo  "<script>
             alert('Your Request was made Successfull, Kindly check your mail or sms');
             window.location.href='index.php';
    </script>";
}else{
	 echo" <script>
             alert('Your Request was not made Successfull!, Try again);
             window.location.href='index.php';
    </script>";
}
// i we direct the customer to the appointment page
 }
		
		
		
	}else{
		 echo  "<script>
    alert('Login first  ...');
    window.location.href='index.php';
    </script>";
	}
	
	
?>
