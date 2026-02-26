 <?php
include ('inc/session.php');  
function val($data){
	$data= trim($data);
	$data= stripslashes($data);
	$data =strip_tags($data);
	$data =ucwords($data);
	return $data;
}
	//$id='';
	if(isset($_POST['update-user'])){
		
		$email = val(mysqli_real_escape_string($con, $_POST['email']));
		//$pass = val(mysqli_real_escape_string($con, $_POST['pass']));
		//$confpass = val(mysqli_real_escape_string($con, $_POST['confpass']));
		//$register_agree = $_POST['register_agree']=isset($_POST['register_agree']) ? 1 : 0;
		//$hashedpassword=ucwords(md5($pass));
		//$id=$_POST['id'];
		//$query = mysqli_query($con,"SELECT portalstatus FROM student_login_details WHERE portalid = '$portalid'"); 
		//$row = mysqli_fetch_assoc($query);
		//$portalstatus1 = $row['portalstatus'];
	
		if (empty($email )) {
			exit('<div style="color:red; text-align:center; font-size:15px;">Fill in all Fields</div>');
			
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			exit('<div style="color:red; text-align:center; font-size:15px;">E-mail must be Valid</div>');
		}
	
    
		else{
 
 $sql = "UPDATE user SET email='$email' WHERE id = '$id'";
		if(mysqli_query($con, $sql)){ 
			 session_unset();
     session_destroy();
     //header("location:index.php");
			        echo  "<script>
    alert('E-mail Updated successfully  ... Please login in with your new E-mail');
    window.location.href='https://www.housemadeeasy.com.ng/login.php';
    </script>";
		}else{
			       echo  "<script>
    alert('E-mail not Updated successfully  ...');
    window.location.href='https://www.housemadeeasy.com.ng/my-account.php';
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
