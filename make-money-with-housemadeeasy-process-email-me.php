<?php
$body = '<div class="email-background" style="background: #eee;padding: 10px; ">
          
            <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 20px;">
              <div style="text-align: center;"><img src="https://www.housemadeeasy.org/assets/images/HouseMadeEasylogo.jpg" style="width: 50%; height:50%"></div>';
       $body .= <<<EOD
<br>
 
Dear <b>Elijah</b>,<br><br><br>

Kindly note that a customer has used Make Money with housemadeeasy as a means to Make some cool cash.<br><br> Below are the details of the customer and vacant apartment:

Name of Customer:  $lname, $fname <br><br>
Phone Number:  $pno <br><br>
E-mail: $email <br><br>

Location of Apartment:  $locationofapartment <br><br>
Type of Apartment ?:  $typeofapartment <br><br>


<b>SUPPORT:</b> <br>
For any issues with your login Details, you can always contact us on support@housemadeeasy.org or call 07037092267, 08160852570<br><br>

Thank You
EOD;

    $body .= '</div>';   
    
    
  $subject = "Make Money Housemadeeasy ";

//echo '->'.mail($email_owner, $subject, $body, $headers);

  

  $from = "housemadeeasy";
$to = "housemadeeasy@gmail.com";



$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      //

 mail($to, $subject, $body, $headers);