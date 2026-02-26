<?php 
	 
	
	include("../inc/connect.inc.php");
		 if (isset($_COOKIE['user_id']) && isset($_COOKIE['user_email'])) {
    session_start();
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['email'] = $_COOKIE['user_email'];
    $_SESSION['fname'] = $_COOKIE['user_fname'];
    $_SESSION['lname'] = $_COOKIE['user_lname'];
} else {
    session_start();
} 
set_time_limit(500); // Set the execution time limit to 500 seconds 
	if(isset($_SESSION['user_id']) ) {
		$query = mysqli_query($con,"SELECT * FROM user WHERE email = '".$_SESSION['user_id']."'"); 
		$row = mysqli_fetch_assoc($query);
		$email2 = $row['email'];
		$fname= $row['fname'];
        $lname= $row['lname'];
		$id= $row['id'];
		$pno= $row['pno'];
		$user_id=$row['user_id'];
		 
	}
	// else{
	// 	 echo  "<script>
    // alert('Login/Register first before you can view this House ...');
    // window.location.href='login.php';
    // </script>";
		
	// }
?>
 
