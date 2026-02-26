 <?php
	include("../inc/connect.inc.php")'); 
function val($data){
	$data= trim($data);
	$data= stripslashes($data);
	$data =strip_tags($data);
	
	return $data;
}
 
	//$id='';
	if(isset($_POST['submitrequest'])){
		$lname=mysqli_real_escape_string($con, $_POST['lname']);
		$fname=mysqli_real_escape_string($con, $_POST['fname']);
		$pno=mysqli_real_escape_string($con, $_POST['pno']);
		$email=mysqli_real_escape_string($con, $_POST['email']);
		$kindofapartment=mysqli_real_escape_string($con, $_POST['kindofapartment']);
		
		$location = $_POST['location'];
		//$budget=mysqli_real_escape_string($con, $_POST['budget']);
		$date_booked=date('Y-m-d h:i:s a', time());
		
		
		  // $temp_name1 = $_FILES['imageitem']['tmp_name'];
   
    
    //move_uploaded_file($temp_name1,"assets/images/market_place_sell_item/$imageitem");
   //move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/images/market_place_sell_item/'.$photo); 
		if (empty($kindofapartment && $lname && $email  && $pno && $fname && $location)) { 
			  echo  "<script>
             alert('Fill in all Fields');
             
    </script>";
			
		}
		
    
		else{  
			 $query = "INSERT into home_repair_booking(lname, fname, email, pno, location, description, photo1, photo2, photo3, photo4, kindofapartment, date_booked) values('$lname', '$fname', '$email', '$pno', '$location', '', '', '', '','', '$kindofapartment', '$date_booked')";
			  mysqli_query($con, $query);
 
// i we direct the customer to the appointment page
include 'home-repair-cleaning-services-mail-me.php'; 
include 'home-repair-cleaning-services-mail-customer.php'; 
include 'request_sms_home_repair_services_cleaning_customer.php'; 
 
include 'request_sms_home_repair_services_cleaning_to_me.php';
include 'request_sms_home_repair_services_cleaning_to_sammy.php';
 echo  "<script>
             alert('Your Request was made Successful, Kindly check your mail or sms');
             window.location.href='index.php';
    </script>";
 
		
		}	// else end
		
	}else{
		 echo  "<script>
    alert('Login first  ...');
    window.location.href='index.php';
    </script>";
	}
	
	
?>
