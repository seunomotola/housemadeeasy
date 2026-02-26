<?php
$body = '<div class="email-background" style="background: #eee;padding: 10px; ">
          
            <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 20px;">
              <div style="text-align: center;"><img src="https://www.housemadeeasy.org/assets/images/HouseMadeEasylogo.jpg" style="width: 50%; height:50%"></div>';
       $body .= <<<EOD
<br>
 
Dear <b>Elijah</b>,<br><br><br>
A customer is using housemadeeasy as means to look for a short term stay.<br><br> 
 
Below are the Details of the customer, house and location of Preference of the house:<br><br> 
Name of Customer:  $lname $fname<br><br> 
Phone Number:  $pno <br><br> 
How many people will be staying in the apartment: $people<br><br> 
Duration of stay: $monthofstay<br><br> 
Date the house will be needed: $dateneeded<br><br>
<b>SUPPORT:</b> <br>
For any issues with your login Details, you can always contact us on support@housemadeeasy.org or call 07037092267, 08160852570<br><br>
Thank You
EOD;
    $body .= '</div>';   
    
    
  $subject = "Short Term Rentals  ";
//echo '->'.mail($email_owner, $subject, $body, $headers);
  
  $from = "housemadeeasy";
$to = "housemadeeasy@gmail.com";
$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      //
 mail($to, $subject, $body, $headers);
