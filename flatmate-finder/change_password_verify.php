 <?php
include ('inc/session.php'); 
        function val($data){
	$data= trim($data);
	$data= stripslashes($data);
	$data =strip_tags($data);
	return $data;
}

	//$id='';
	if(isset($_POST['user_login'])){
		$old = mysqli_real_escape_string($con, $_POST['old']);
		$old2=md5($old);
		$newpass = mysqli_real_escape_string($con, $_POST['newpass']);
		$conf = mysqli_real_escape_string($con, $_POST['conf']);
		$hashedpassword=md5($newpass);
		$email=$_SESSION['email'];
		//$id=$_POST['id'];
		
		$query = mysqli_query($con,"SELECT password FROM user WHERE email = '$email'"); 
		$row = mysqli_fetch_assoc($query);
		$password = $row['password'];
	
		if (empty($old && $newpass && $conf)) {
			exit('<div style="color:red; text-align:center; font-size:15px;">Fill in all Fields</div>');
			
		}
		if ($old2!=$password) {
			exit('<div style="color:red; text-align:center; font-size:15px;">Old Password not Correct</div>');
		}
		if ($newpass!==$conf) {
			exit('<div style="color:red; text-align:center; font-size:15px;">Confirm Password is not correct</div>');
		}
		else{
		$sql = "UPDATE user set password='$hashedpassword' WHERE email = '$email'";
		$result= mysqli_query($con, $sql);
		 echo  "<script>
    alert('Password Successfully Changed...');
    window.location.href='https://www.housemadeeasy.com.ng/my-account.php';
    </script>";
		}	
		
	}else{
		 echo  "<script>
    alert('Login first  ...');
    window.location.href='index.php';
    </script>";
	}

        ?>