 <?php
include("../inc/connect.inc.php");

function val($data){

	$data= trim($data);
	$data= stripslashes($data);
	$data =strip_tags($data);
	
	return $data;
}
	//$id='';
	if(isset($_POST['submitapartment'])){
		$lname=mysqli_real_escape_string($con, $_POST['lname']);
		$fname=mysqli_real_escape_string($con, $_POST['fname']);
		$pno=mysqli_real_escape_string($con, $_POST['pno']);
		$email=mysqli_real_escape_string($con, $_POST['email']);
		
		$locationofapartment=mysqli_real_escape_string($con, $_POST['locationofapartment']);
		$typeofapartment=mysqli_real_escape_string($con, $_POST['typeofapartment']);
		
		
		
		if (empty( $lname && $pno && $fname && $locationofapartment && $email && $typeofapartment)) {
			  echo  "<script>
             alert('Fill in all Fields');
             window.location.href='make-money-with-housemadeeasy.php';
             
    </script>";
			
		}
		
    
		else{
			include 'make-money-with-housemadeeasy-process-email-customer.php'; 
			include 'make-money-with-housemadeeasy-process-email-me.php'; 
			include 'make-money-with-housemadeeasy-process-email-darasimi.php'; 
include 'request-make-money-with-housemadeeasy-customer.php';
 
include 'request-make-money-with-housemadeeasy-me.php';
include 'request-make-money-with-housemadeeasy-darasimi.php';
             echo  "<script>
             alert('Your Request was made Successful, Kindly check your mail or sms');
             window.location.href='make-money-with-housemadeeasy.php';
    </script>";
// i we direct the customer to the appointment page
 }
		
		
		
	}else{
		 echo  "<script>
    alert('Login first  ...');
    window.location.href='index.php';
    </script>";
	}
	
	
?>
