<?php
$body = '<div class="email-background" style="background: #eee;padding: 10px; ">
          
            <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 20px;">
              <div style="text-align: center;"><img src="https://www.housemadeeasy.org/assets/images/HouseMadeEasylogo.jpg" style="width: 50%; height:50%"></div>';
       $body .= <<<EOD
<br>
 
Dear <b>Elijah</b>,<br><br><br>
A customer is using housemadeeasy as means to look for a flatmate for  his/her house.<br><br>
 
Below are the Details of the customer, house and the type of flatmate his/her  is looking for via housemadeeasy:<br><br>
Name of Customer:  $fname $lname<br><br>
Phone Number:  $pno <br><br>
Gender: $gender<br><br>
Gender of the person you want as a flatmate:$genderofflatmate<br><br>
Type of Apartment his/her is looking for flatmate for:  $kindofapartment <br><br>
Location of the Apartment: $location<br><br>
Feature of the Apartment that you want a flatmate for: $featureofapartment<br><br>
<b>SUPPORT:</b> <br>
For any issues with your login Details, you can always contact us on support@housemadeeasy.org or call 07037092267, 08160852570<br><br>
Thank You
EOD;
    $body .= '</div>';   
    
    
  $subject = "Flatmate Finder ";
//echo '->'.mail($email_owner, $subject, $body, $headers);
  
  $from = "housemadeeasy";
$to = "housemadeeasy@gmail.com";
$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      //
 mail($to, $subject, $body, $headers);
