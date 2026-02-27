 <?php
	include("../inc/connect.inc.php");
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
		$kindofitem=mysqli_real_escape_string($con, $_POST['kindofitem']);
		
		$photo = $_FILES['photo']['name'];
		$photo2 = $_FILES['photo2']['name'];
		$photo3 = $_FILES['photo3']['name'];
		$howmuch=mysqli_real_escape_string($con, $_POST['howmuch']);
		
		
		  // $temp_name1 = $_FILES['imageitem']['tmp_name'];
   
    
    //move_uploaded_file($temp_name1,"assets/images/market_place_sell_item/$imageitem");
   move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/images/market_place_sell_item/'.$photo); 
   move_uploaded_file($_FILES['photo2']['tmp_name'], 'assets/images/market_place_sell_item/'.$photo2); 
    move_uploaded_file($_FILES['photo3']['tmp_name'], 'assets/images/market_place_sell_item/'.$photo3); 
		if (empty($kindofitem && $lname && $pno && $fname && $photo &&  $photo2 && $photo3 && $howmuch)) { 
			  echo  "<script>
             alert('Fill in all Fields');
             
    </script>"; 
			
		} 
		
    
		else{ 
            $sql = "INSERT into market_place(lname, fname, pno, email, kindofitem, imageitem1, imageitem2, imageitem3, howmuch) values('$lname', '$fname',  '$pno',  '$email', '$kindofitem', '$photo', '$photo2', '$photo3', '$howmuch')";
            if(mysqli_query($con, $sql)){  
             echo  "<script>
             alert('Your Request was made Successfull');
             window.location.href='index.php';
    </script>";
// i we direct the customer to the appointment page
include 'Sell-item-market-place-mail-me.php';
include 'Sell-item-market-place-mail-dami.php';
include 'Sell-item-market-place-mail-customer.php'; 
include 'request_sms_market_place_customer.php';
include 'request_sms_market_place_to_me.php';
include 'request_sms_market_place_to_dami.php'; 
 }
else{
     echo" <script>
             alert('Your Request was not made Successfull, Try again');
             window.location.href='index.php';
    </script>";
                //die(mysqli_error($con));
            }// end of payment not succesful
		
		}	// else end
		
	}else{
		 echo  "<script>
    alert('Login first  ...');
    window.location.href='index.php';
    </script>";
	}
	
	
?>
