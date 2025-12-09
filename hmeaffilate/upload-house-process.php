  <?php
    session_start();
    include ('inc/connect.inc.php'); 

function val($data){
    $data= trim($data);
    $data= stripslashes($data);
    $data =strip_tags($data);
    
    return $data;
}



if(isset($_POST['submit'])){


$house_location = $_POST['house_location'];
    $house_type = $_POST['house_type'];
    $house_name = $_POST['house_name'];
    $cont_land = $_POST['cont_land'];
    $cont_land2 = $_POST['cont_land2'];
    $firstpayment = $_POST['firstpayment'];
    $secondpayment = $_POST['secondpayment'];
    $house_img1 = $_FILES['house_img1']['name'];

    $property_description = $_POST['property_description'];
    $currentvacant = $_POST['currentvacant'];
    $monthvacant = $_POST['monthvacant'];

      $house_agent_fname_session=$_SESSION['fname'];
    $house_agent_lname_session=$_SESSION['lname'];
    $house_agent_pno_session=$_SESSION['pno'];
    $house_agent_email_session=$_SESSION['email'];
      $house_agent_user_id_session=$_SESSION['agentaffilate_id'];

   
    
    $temp_name1 = $_FILES['house_img1']['tmp_name'];
    ;
    
    move_uploaded_file($temp_name1,"assets/images/hmeaffilate_upload_house/$house_img1");


    //give house an id, which is unique to it

    $house_id = "0123456789qwertzuioplkjhgfdsayxcvbnmABCDEFGHIKLMNOPQRSTUVZ";
      $house_id = str_shuffle($house_id);
      $house_id = substr($house_id, 0, 10);
    
    $insert_product = "INSERT into hmeaffilate_properties (house_name, house_type, house_img1,  house_location, house_desc, cont_land, cont_land2, date_uploaded, house_id, currentvacant, monthvacant, agent_fname, agent_lname, agent_pno, agent_email, agent_user_id, firstpayment, secondpayment) values ('$house_name', '$house_type', '$house_img1',  '$house_location', '$property_description', '$cont_land', '$cont_land2', NOW(), '$house_id', '$currentvacant', '$monthvacant', '$house_agent_fname_session', '$house_agent_lname_session', '$house_agent_pno_session', '$house_agent_email_session', '$house_agent_user_id_session', '$firstpayment', '$secondpayment')";
    
    $run_product = mysqli_query($con,$insert_product);
    
    if($run_product){

            include 'hmeaffilate-sms-agent.php';
            include 'hmeaffilate-sms-kyya.php'; 
               include 'hmeaffilate-sms-me.php';

               echo  "<script>
    alert('Your House was sucessfully Uploaded...');
    
    </script>";
              
    
        
        
  
        
       
        
    }else{
        ///echo "<script>alert('House not inserted sucessfully')</script>";
        die(mysqli_error($con));
    }
    
}

?>