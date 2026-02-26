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
		$dep=mysqli_real_escape_string($con, $_POST['dep']);
		$gender=mysqli_real_escape_string($con, $_POST['gender']);
		$relofflatmate=mysqli_real_escape_string($con, $_POST['relofflatmate']);
		$levelofflatmate=mysqli_real_escape_string($con, $_POST['levelofflatmate']);
		$depofflatmate=mysqli_real_escape_string($con, $_POST['depofflatmate']);
		$level=mysqli_real_escape_string($con, $_POST['level']);
		$location=mysqli_real_escape_string($con, $_POST['location']);
		//$featureofapartment=mysqli_real_escape_string($con, $_POST['featureofapartment']);
		$genderofflatmate=mysqli_real_escape_string($con, $_POST['genderofflatmate']);
		
		$kindofapartment = mysqli_real_escape_string($con, $_POST['kindofapartment']);
		// $tiled = mysqli_real_escape_string($con, $_POST['tiled']);
		// $present = mysqli_real_escape_string($con, $_POST['present']);
		// $bathroom = mysqli_real_escape_string($con, $_POST['bathroom']);
		// $other = mysqli_real_escape_string($con, $_POST['other']);
		// $budget = mysqli_real_escape_string($con, $_POST['budget']);
		// $dislike = mysqli_real_escape_string($con, $_POST['dislike']);
		
		if (empty($kindofapartment && $lname && $pno && $fname && $gender && $dep && $relofflatmate && $levelofflatmate && $depofflatmate && $level && $location && $featureofapartment)) {
			  echo  "<script>
             alert('Fill in all Fields');
             
    </script>";
			
		}
		
    
		else{
            $sql = "INSERT into flatmate_finder(lname, fname, pno,email , dep, gender, level, genderofflatmate, relofflatmate, levelofflatmate, depofflatmate,  location, kindofapartment) values('$lname', '$fname',  '$pno',  '$email', '$dep', '$gender', '$level', '$genderofflatmate', '$relofflatmate','$levelofflatmate', '$depofflatmate', '$location', '$kindofapartment')";
            if(mysqli_query($con, $sql)){ 
             echo  "<script>
             alert('Your Request was made Successful ... W'll get back to you in a jiffy);
             window.location.href='index.php';
    </script>";
// i we direct the customer to the appointment page
include 'request_sms_flatmate_finder_customer.php';
 
include 'request_sms_flatmate_finder_to_me.php';
include 'Mail_flatmate_finder_to_me.php';
include 'Mail_flatmate_finder_to_customer.php'; 
 
 } 
else{
     echo" <script>
             alert('Your Request was not made Successful ...');
             window.location.href='index.php';
    </script>";
                // die(mysqli_error($con));
            }// end of payment not succesful
		
		}	// else end
		
	}else{
		 echo  "<script>
    alert('Login first  ...');
    window.location.href='index.php';
    </script>";
	}
	
	
?>
