  <?php
	session_start();
	include("../inc/connect.inc.php")'); 
function val($data){
	$data= trim($data);
	$data= stripslashes($data);
	$data =strip_tags($data);
	
	return $data;
}
	//$id='';
	if(isset($_POST['submit'])){
		$fname = mysqli_real_escape_string($con, $_POST['fname']);
		$lname = mysqli_real_escape_string($con, $_POST['lname']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$gender = mysqli_real_escape_string($con, $_POST['gender']);
		$dep = mysqli_real_escape_string($con, $_POST['dep']);
		$pno = mysqli_real_escape_string($con, $_POST['pno']);
		$level = mysqli_real_escape_string($con, $_POST['level']);
		//$register_agree = $_POST['register_agree']=isset($_POST['register_agree']) ? 1 : 0;
		//$hashedpassword=md5($pass);
		//$id=$_POST['id'];
		//$query = mysqli_query($con,"SELECT portalstatus FROM student_login_details WHERE portalid = '$portalid'"); 
		//$row = mysqli_fetch_assoc($query);
		//$portalstatus1 = $row['portalstatus'];
	 // $sql_l ="SELECT * FROM user WHERE email='$email'";
  // 	$re_l =mysqli_query($con, $sql_l);
  	//  $sql_p ="SELECT * FROM user WHERE password='$hashedpassword'";
  	// $re_p =mysqli_query($con, $sql_p);
		if (empty($fname && $lname && $email && $dep && $gender && $pno && $level)) {
			exit('<div style="color:red; text-align:center; font-size:15px;">Fill in all Fields</div>');
			
		}
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      exit('<div style="color:red; text-align:center; font-size:15px;">Email must be valid</div>');
    }
    
    
		else{ 
 $sql = "INSERT into beyondbooks(fname, lname, email, dep, gender, pno, level) values('$fname', '$lname', '$email','$dep', '$gender', '$pno', '$level')";
		
			if(mysqli_query($con, $sql)){
				 $get_beyondbooks = "select * from beyondbooks";
        
        $run_beyondbooks = mysqli_query($con,$get_beyondbooks);
        
        $count_register = mysqli_num_rows($run_beyondbooks);
					include 'beyondbooks-process-email-customer.php'; 
			include 'beyondbooks-process-email-me.php';
include 'request-sms-beyondbooks-customer.php'; 
include 'request-sms-beyondbooks-me.php';
			     echo  "<script>
    alert('Registration successful...Kindly Check your mail or sms for more information...');
    window.location.href='index.php'; 
    </script>";
		}else{
			  echo  "<script>
    alert('Registration not successful...Try again...');
    window.location.href='index.php';
    </script>";	
		}
	
		
		}	// else end
		
	}else{
		 echo  "<script>
    alert('Login first  ...');
    window.location.href='index.php';
    </script>";
	}
	
	
?>
