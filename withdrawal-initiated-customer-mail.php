<?php

             $body = '<div class="email-background" style="background: #eee;padding: 10px; ">
          
            <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 20px;">
              <div style="text-align: center;"><img src="https://www.housemadeeasy.org/assets/images/HouseMadeEasylogo.jpg" style="width: 50%; height:50%"></div>';
       $body .= <<<EOD
<br>
 
Dear <b>$fname_used</b>,<br><br>
Your Withdrawal of #$withdraw_amount is being processed. Your account will be credited in a jiffy.
<br><br>
<br>


<b>SUPPORT:</b> <br>
For any issues with you contacting the agent of the house, you can always contact us on support@housemadeeasy.org or 08160852570, 07037092267<br><br>

Thank You
EOD;

    $body .= '</div>';  
    
    
  $subject = "House Booking Request";

//echo '->'.mail($email_owner, $subject, $body, $headers);

  

  $from = "housemadeeasy";
$to = $email2;



$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      //

mail($to, $subject, $body, $headers);
//echo $body;