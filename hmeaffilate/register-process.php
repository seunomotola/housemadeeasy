  <?php
  ob_start();
	session_start(); 
	include("../inc/connect.inc.php");
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
		$pass = mysqli_real_escape_string($con, $_POST['pass']);
		$confpass = mysqli_real_escape_string($con, $_POST['confpass']);
		$pno = mysqli_real_escape_string($con, $_POST['pno']);
		$bankname = mysqli_real_escape_string($con, $_POST['bankname']);
		$accountname = mysqli_real_escape_string($con, $_POST['accountname']);
		$accountno = mysqli_real_escape_string($con, $_POST['accountno']);
		//$register_agree = $_POST['register_agree']=isset($_POST['register_agree']) ? 1 : 0;
		$hashedpassword=md5($pass);
		 $picture = $_FILES['picture']['name'];
    
    $temp_name1 = $_FILES['picture']['tmp_name'];
    ;
    
    move_uploaded_file($temp_name1,"assets/images/hmeaffilate_img/$picture");
    	 $sql_l ="SELECT * FROM hmeaffilate_user WHERE email='$email'";
  	$re_l =mysqli_query($con, $sql_l);
  	 $sql_p ="SELECT * FROM hmeaffilate_user WHERE password='$hashedpassword'";
  	$re_p =mysqli_query($con, $sql_p);
		if (empty($fname && $lname && $email && $pass && $confpass && $pno && $bankname && $accountname && $accountno)) {
			echo '<script>
             alert("Fill in all Fields...");
             window.location.href="register.php";
              </script>';
	}
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			echo '<script>
             alert("Email must be valid...");
             window.location.href="register.php";
              </script>';
       }
      if(mysqli_num_rows($re_l)>0){
		echo '<script>
             alert("Email not Available...");
             window.location.href="register.php";
              </script>';
		
	}
	 if(mysqli_num_rows($re_p)>0){
    	
		echo '<script>
             alert("Password not Available.. please try another Password);
             window.location.href="register.php";
              </script>';
		}
    elseif ($pass!==$confpass) { 
    	
    	echo '<script>
             alert("Password not the Same");
             window.location.href="register.php";
             </script>';
    }
    else{ 
			     //Code for USER ID
$count_my_page = ("userid.txt");
$hits = file($count_my_page);
$hits[0] ++;
$fp = fopen($count_my_page , "w");
fputs($fp , "$hits[0]");
fclose($fp); 
$agentaffilate_id= $hits[0]; 
 $sql = "INSERT into hmeaffilate_user(fname, lname, email, password, pno, token, agentaffilate_id, picture, bankname, accountname, accountno) values('$fname', '$lname', '$email','$hashedpassword', '$pno', '', '$agentaffilate_id', '$picture', '$bankname', '$accountname', '$accountno')";
		mysqli_query($con, $sql);
		
		// 	if(mysqli_query($con, $sql)){
		// 	exit('<div style="color:green; text-align:center; font-size:15px;">Registration successful...please Login in with your new E-mail and Password</div>');
		// }else{
		// 	exit('<div style="color:red; text-align:center; font-size:15px;">Incorrect Details</div>');	
		// }
		$sql_login = "SELECT * FROM hmeaffilate_user WHERE email = '$email' AND password='$hashedpassword' AND agentaffilate_id='$agentaffilate_id'";
		$result_login= mysqli_query($con, $sql_login);
		if ($result_login->num_rows > 0) {		
			$found_user= mysqli_fetch_array($result_login);
			$_SESSION['id']=$found_user['id'];
			$_SESSION['email']=$found_user['email'];
			$_SESSION['fname']=$found_user['fname'];
			$_SESSION['lname']=$found_user['lname'];
			$_SESSION['pno']=$found_user['pno'];
			$_SESSION['agentaffilate_id']=$found_user['agentaffilate_id']; 
			 
			     echo  "<script>
    alert('Registration successful...logging you In...');
    window.location.href='upload-house.php';
    </script>";
		}else{
			die(mysqli_error($con));
	// 		  echo  "<script>
    // alert('Registration not successful...Try again...');
    // window.location.href='register.php';
    // </script>";	
		}
		
		}	// else end
		
	}else{
		 echo  "<script>
    alert('Login first  ...');
    window.location.href='index.php';
    </script>";
	}
	
	
?>
