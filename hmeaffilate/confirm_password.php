<?php
session_start();
include ('inc/connect.inc.php'); 

if (isset($_GET["token"]) && isset($_GET["email"])) {

	$email = $_GET["email"];
	$token =$_GET["token"];

		$sql ="SELECT * FROM hmeaffilate_user WHERE email='$email' && token='$token'";
   		$result =mysqli_query($con, $sql);
   		$user= mysqli_fetch_assoc($result);
   		$token2=$user['token'];
   		$email2= $user['email'];

   		if($token!==$token2 && $email!==$email2){
                echo  "<script>
    alert('Check Your Link...');
    window.location.href='https://www.housemadeeasy.org/index.php';
    </script>";
		}
		else{
 			$_SESSION['email']=$user['email'];
 			header("Location:https://www.housemadeeasy.org/Reset_Password.php");
 			exit(0);
 		}
 	}
 	