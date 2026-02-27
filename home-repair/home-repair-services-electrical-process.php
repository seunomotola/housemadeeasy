 <?php
	include("../inc/connect.inc.php");
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
		$description=mysqli_real_escape_string($con, $_POST['description']);
		
		$location = $_POST['location'];
		//$budget=mysqli_real_escape_string($con, $_POST['budget']);
		
		$date_booked=date('Y-m-d h:i:s a', time());
		
		
			$photo1 = $_FILES['photo1']['name'];
			$photo2 = $_FILES['photo2']['name']; 
			$photo3 = $_FILES['photo3']['name'];
			$photo4 = $_FILES['photo4']['name']; 
		
		
move_uploaded_file($_FILES['photo1']['tmp_name'], 'assets/images/home-repair-customer-image/'.$photo1);
move_uploaded_file($_FILES['photo2']['tmp_name'], 'assets/images/home-repair-customer-image/'.$photo2);
move_uploaded_file($_FILES['photo3']['tmp_name'], 'assets/images/home-repair-customer-image/'.$photo3);
move_uploaded_file($_FILES['photo4']['tmp_name'], 'assets/images/home-repair-customer-image/'.$photo4);
		if (empty($description && $lname && $pno  && $email && $fname && $location  && $photo1)) { 
			  echo  "<script>
             alert('Fill in all Fields');
             
    </script>";
			 
		}
		
    
		else{  
			 $query = "INSERT into home_repair_booking(lname, fname, email, pno, location, description, photo1, photo2, photo3, photo4, kindofapartment, date_booked) values('$lname', '$fname', '$email', '$pno', '$location', '$description', '$photo1',  '$photo2', '$photo3', '$photo4', '', '$date_booked')";
			  mysqli_query($con, $query);
			  //die(mysqli_error($con));
// i we direct the customer to the appointment page
include 'home-repair-electrical-services-mail-me.php'; 
include 'home-repair-electrical-services-mail-customer.php';
include 'request_sms_home_repair_services_electrical_customer.php';
 
include 'request_sms_home_repair_services_electrical_to_me.php';
include 'request_sms_home_repair_services_electrical_to_sammy.php';
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
