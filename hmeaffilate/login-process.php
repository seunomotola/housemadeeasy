<?php
ob_start();
	session_start();
	include("../inc/connect.inc.php")'); 
function val($data){
	$data= trim($data);
	$data= stripslashes($data);
	$data =strip_tags($data);
	$data =ucwords($data);
	return $data;
}
	//$id='';
	if(isset($_POST['user_login'])){
			
		$email =mysqli_real_escape_string($con, $_POST['email']);
		$pass = mysqli_real_escape_string($con, $_POST['pass']);
		//$login_remember = isset($_POST['login_remember']) ? 1: 0;
		//$register_agree = $_POST['register_agree']=isset($_POST['register_agree']) ? 1 : 0;
		$hashedpassword=md5($pass);
		//$id=$_POST['id'];
		
		//$query = mysqli_query($con,"SELECT teacher FROM teacher WHERE portalid = '$portalid'"); 
		//$row = mysqli_fetch_assoc($query);
		//$teacher1 = $row['teacher'];
	
	
		if (empty($email && $pass)) {
			exit('<div style="color:red; text-align:center; font-size:15px;">Fill in all Fields</div>');
			
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			exit('<div style="color:red; text-align:center; font-size:15px;">E-mail must be Valid</div>');
		}
		
		
		
		else{
			 $query = mysqli_query($con,"SELECT * FROM  hmeaffilate_user WHERE email = '$email'") or die(mysqli_error($con)); 
                $row2 = mysqli_fetch_assoc($query);
                $agentaffilate_id=$row2['agentaffilate_id'];
		$sql = "SELECT * FROM hmeaffilate_user WHERE email = '$email' && password='$hashedpassword' && agentaffilate_id='$agentaffilate_id'";
		$result= mysqli_query($con, $sql);
		if ($result->num_rows > 0) {		
			$found_user= mysqli_fetch_array($result);
			$_SESSION['id']=$found_user['id'];
			$_SESSION['email']=$found_user['email'];
			$_SESSION['fname']=$found_user['fname'];
			$_SESSION['lname']=$found_user['lname'];
			$_SESSION['pno']=$found_user['pno'];
			$_SESSION['agentaffilate_id']=$found_user['agentaffilate_id']; 
			
		
			
			exit('<div style="color:green; text-align:center; font-size:15px;">Login successful...please wait</div>');
		}else{
			exit('<div style="color:red; text-align:center; font-size:15px;">Incorrect Details</div>');	
		}
		
		}	
		
	}else{
		 echo  "<script>
    alert('Login first  ...');
    window.location.href='index.php';
    </script>";
	}
	
	
?>
