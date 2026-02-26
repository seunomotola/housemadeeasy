<?php
$body = '<div class="email-background" style="background: #eee;padding: 10px; ">
          
            <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 20px;">
              <div style="text-align: center;"><img src="https://www.housemadeeasy.org/assets/images/HouseMadeEasylogo.jpg" style="width: 50%; height:50%"></div>';
       $body .= <<<EOD
<br>
 
Dear <b>Sammy</b>,<br><br><br>
Kindly note that a customer has used housemadeeasy logistics as a means to transport his/her load. Below are the details of the customer:
Name of Customer:  $lname, $fname <br><br>
Phone Number:  $pno <br><br>
E-mail: $email <br><br>
Location of load in Ago-Iwoye:  $locationofload <br><br>
Destination of Offloading in Sagamu ?:  $destinationofload <br><br>
Mode of transport: $transporttype <br><br>
Date of Transportation: $datetransport <br><br>
<b>SUPPORT:</b> <br>
For any issues with your login Details, you can always contact us on support@housemadeeasy.org or call 07037092267, 08160852570<br><br>
Thank You
EOD;
    $body .= '</div>';   
    
    
  $subject = "Housemadeeasy logistics";
//echo '->'.mail($email_owner, $subject, $body, $headers);
  
  $from = "housemadeeasy";
$to = "Samson.anifowose58@gmail.com";
$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      //
 mail($to, $subject, $body, $headers);
