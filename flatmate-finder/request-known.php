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
		$kindofapartment = mysqli_real_escape_string($con, $_POST['kindofapartment']);
		$tiled = mysqli_real_escape_string($con, $_POST['tiled']);
		$present = mysqli_real_escape_string($con, $_POST['present']);
		$bathroom = mysqli_real_escape_string($con, $_POST['bathroom']);
		$other = mysqli_real_escape_string($con, $_POST['other']);
		$budget = mysqli_real_escape_string($con, $_POST['budget']);
		$dislike = mysqli_real_escape_string($con, $_POST['dislike']);
		
		if (empty($kindofapartment && $tiled && $present && $bathroom && $other && $budget && $dislike)) {
			  echo  "<script>
             alert('Fill in all Fields');
             
    </script>";
			
		}
		
    
		else{
			$query = mysqli_query($con,"SELECT * FROM agent "); 
		$row = mysqli_fetch_assoc($query);
		$agent_email = $row['agent_email'];
		$agent_no= $row['agent_no'];
include 'request_sms_customer.php' 
include 'request_sms_agent.php' 
include 'request_sms_to_me.php'
		
		}	// else end
		
	}else{
		 echo  "<script>
    alert('Login first  ...');
    window.location.href='index.php';
    </script>";
	}
	
	
?>
