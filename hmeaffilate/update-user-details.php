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
		$fname = val(mysqli_real_escape_string($con, $_POST['fname']));
		$lname = val(mysqli_real_escape_string($con, $_POST['lname']));
		$email = val(mysqli_real_escape_string($con, $_POST['email']));
		$cust_no = val(mysqli_real_escape_string($con, $_POST['cust_no']));
		//$confpass = val(mysqli_real_escape_string($con, $_POST['confpass']));
		//$register_agree = $_POST['register_agree']=isset($_POST['register_agree']) ? 1 : 0;
		//$hashedpassword=ucwords(md5($pass));
		//$id=$_POST['id'];
		//$query = mysqli_query($con,"SELECT portalstatus FROM student_login_details WHERE portalid = '$portalid'"); 
		//$row = mysqli_fetch_assoc($query);
		//$portalstatus1 = $row['portalstatus'];

	

		if (empty($fname && $lname && $email && $cust_no )) {
			exit('<div style="color:red; text-align:center; font-size:15px;">Fill in all Fields</div>');
			
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			exit('<div style="color:red; text-align:center; font-size:15px;">E-mail must be Valid</div>');
		}
	
    
		else{

 
 $sql = "UPDATE hmeaffilate_user SET fname = '$fname', lname = '$lname', email='$email' , pno='$cust_no' WHERE id = '$id'";
		if(mysqli_query($con, $sql)){ 

			        echo  "<script>
    alert('Details Updated successfully  ...');
    window.location.href='my-account.php';
    </script>";
		}else{
			       echo  "<script>
    alert('Details not Updated successfully  ...');
    window.location.href='my-account.php';
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