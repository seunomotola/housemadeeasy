   <?php
    include ('inc/session.php');  
function val($data){
	$data= trim($data);
	$data= stripslashes($data);
	$data =strip_tags($data);
	
	return $data;
}
	//$id='';
	if(isset($_POST['submitrequest'])){
		  $multiple_room_session=$_SESSION['multiple_room']; 
    $how_many_multiple_room_session=$_SESSION['how_many_multiple_room'];
     $house_name_session=$_SESSION['house_name'];
                       $house_agent_session=$_SESSION['agent'];
                       $house_agent_img_session=$_SESSION['agent_img'];
                        $house_location_session=$_SESSION['location'];
                         $house_exact_session=$_SESSION['house_location'];
             //$amount2=$_SESSION['amount'];
  
                      $date_booked=date('Y-m-d h:i:s a', time());
    $house_img1=$_SESSION['house_img1'];
                 $house_label_session=$_SESSION['house_label'];
                      //$first_year_rent_session=$_SESSION['first_year_rent'];
                     $location_session=$_SESSION['location'];
                      $house_name_session=$_SESSION['house_name'];
                       $house_agent_session=$_SESSION['agent'];
                        $house_agent_img_session=$_SESSION['agent_img'];
                        $house_location_session=$_SESSION['location'];
                         $house_exact_session=$_SESSION['house_location'];
                          $house_type=$_SESSION['type'];
                         
                     $house_img2_session=$_SESSION['house_img2'];
                     $house_img3_session=$_SESSION['house_img3'];
                     $house_img4_session=$_SESSION['house_img4'];
                     $house_desc_session=$_SESSION['house_desc'];
                     $amenities_session=$_SESSION['amenities'];
                     $distance_session=$_SESSION['distance'];
                     $kitchen_session=$_SESSION['kitchen'];
                     $bathroom_session=$_SESSION['bathroom'];
                     $door_session=$_SESSION['door'];
                     $fence_session=$_SESSION['fence'];
                     $water_source_session=$_SESSION['water_source'];
                      $agent_pno=$_SESSION['agent_pno'];
                     $agent_email=$_SESSION['agent_email'];
                   
                     $house_id=$_SESSION['house_id'];
                     $house_owner=$_SESSION['house_owner'];
                    
                      $id=$_SESSION['id'];
                    
                       $multiple_room=$_SESSION['multiple_room'];
                     $how_many_multiple_room=$_SESSION['how_many_multiple_room'];
                      $how_many_multiple_room_new_many= --$how_many_multiple_room;
		
		//$locationofapartment=mysqli_real_escape_string($con, $_POST['locationofapartment']);
		//$typeofapartment=mysqli_real_escape_string($con, $_POST['typeofapartment']);
		$people=mysqli_real_escape_string($con, $_POST['people']);
		$monthofstay=mysqli_real_escape_string($con, $_POST['monthofstay']);
		$dateneeded=mysqli_real_escape_string($con, $_POST['dateneeded']);
		
		
		if (empty($people && $monthofstay && $dateneeded )) {
			  echo  "<script>
             alert('Fill in all Fields');
             window.location.href='short-term-stay.php';
             
    </script>";
			
		}
		
    
		else{
			 $query = "INSERT into short_term_rentals_bookings (fname, lname, email, pno, agent, agent_img, agent_pno, agent_email, location, house_location, type, house_name, house_img1, house_img2, house_img3, house_img4, house_desc, amenities, house_label, distance, kitchen, bathroom, door, fence, water_source, house_id, date_booked, multiple_room, how_many_multiple_room, house_owner, user_id, people, monthofstay, dateneeded) values('$fname', '$lname', '$email2', '$pno', '$house_agent_session', '$house_agent_img_session', '$agent_pno', '$agent_email', '$house_location_session', '$house_exact_session', '$house_type', '$house_name_session', '$house_img1',  '$house_img2_session', '$house_img3_session', '$house_img4_session',  '$house_desc_session', '$amenities_session', '$house_label_session', '$distance_session', '$kitchen_session', '$bathroom_session', '$door_session', '$fence_session', '$water_source_session', '$house_id', '$date_booked', '$multiple_room', '$how_many_multiple_room_new_many', '$house_owner', '$user_id', '$people', '$monthofstay', '$dateneeded')";
// 			 if(mysqli_query($con, $query)){
 // echo  "<script>
 //             alert('Your Request was made Successful, We will get back to you in a jiffy');
             
 //    </script>";
// 			 }else{
// 			 	die(mysqli_error(con));
// 			 }
			 mysqli_query($con, $query);
include 'short_term_stay_mail_customer.php';
include 'short_term_stay_mail_me.php';
include 'request_sms_short_term_stay_customer.php'; 
 
include 'request_sms_short_term_stay_to_me.php';
  
  echo  "<script>
              alert('Your Request was made Successful, We will get back to you in a jiffy');
              window.location.href='index.php';
             
    </script>";     
// i we direct the customer to the appointment page
 }
	
		
		
	}else{
		 echo  "<script>
    alert('Login first  ...');
    window.location.href='index.php';
    </script>";
	}
	
	
?>
