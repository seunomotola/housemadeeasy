  <?php
  session_start();
include("../inc/connect.inc.php");

function val($data){
  $data= trim($data);
  $data= stripslashes($data);
  $data =strip_tags($data);
  return $data;
}
  //$id='';
  if(isset($_POST['resetpassword'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    //$id=$_POST['id'];
    
    $query = mysqli_query($con,"SELECT * FROM user WHERE email = '$email'"); 
    $row = mysqli_fetch_assoc($query);
    $fname = $row['fname'];
    $lname = $row['lname'];
    $email2 = $row['email'];
  
  
    if (empty($email)) {
      exit('<div style="color:red; text-align:center; font-size:15px;">Fill in all Fields</div>');
      
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      exit('<div style="color:red; text-align:center; font-size:15px;">Email must be valid</div>');
    }
    
    if ($email!==$email2) {
      exit('<div style="color:red; text-align:center; font-size:15px;">Email not Found</div>');
    }
    else{
        //now send email to the user
      //   $str = "0123456789qwertzuioplkjhgfdsayxcvbnm";
      // $str = str_shuffle($str);
      // $str = substr($str, 0, 10);
      $str= strtoupper(bin2hex(random_bytes(3)));
$body = '<div class="email-background" style="background: #eee;padding: 10px; ">
          
            <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 20px;">
              <div style="text-align: center;"><img src="https://www.housemadeeasy.org/assets/images/HouseMadeEasylogo.jpg" style="width: 50%; height:50%"></div>';
       $body .= <<<EOD
<br>
 
Dear <b>$lname</b>,<br><br><br>
Please click on the link below:<br><br> 
<a href='https://www.housemadeeasy.org/confirm_password.php?email=$email&token=$str'>Reset Your Password</a><br>
To Reset Your Password<br><br>
 
<b>SUPPORT:</b> <br>
For any issues with your login Details, you can always contact us on support@housemadeeasy.org or call 07037092267, 08160852570<br><br>
Thank You
EOD;
    $body .= '</div>';   
    
    
  $subject = "Forgot Password";
//echo '->'.mail($email_owner, $subject, $body, $headers);
  
  $from = "housemadeeasy";
$to = $email;
$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      //
 if(mail($to, $subject, $body, $headers)){
  $sql= "UPDATE user SET token='$str' WHERE email='$email'";
         mysqli_query($con, $sql);
         //echo $body;
exit('<div style="color:green; text-align:center; font-size:15px;">Check your email to reset your Password.... </div>');
 }else{
  exit('<div style="color:red; text-align:center; font-size:15px;">Email not sent Successfully.... </div>');
}
//email ends here........................... 
    
    } 
    
  }
      ?>
