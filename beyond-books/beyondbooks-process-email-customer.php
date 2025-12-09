<?php
$body = '<div class="email-background" style="background: #eee;padding: 10px; ">
          
            <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 20px;">
              <div style="text-align: center;"><img src="https://www.housemadeeasy.org/assets/images/HouseMadeEasylogo.jpg" style="width: 50%; height:50%"></div>';
       $body .= <<<EOD
<br>
 
Dear <b>$lname</b>,<br><br><br>

Thank you for registering for Housemadeeasy workshop 1.0...<br><br>
Beyond Books: Building wealth through Housemadeeasy.<br>
Holding at Adebola Adegunwa Audio Visual Hall Olabisi Onabanjo University Teaching Hospital on 9th of February, 2024 by 10am.
By the end of this Workshop, you will have already learnt the technique to make money with housemadeeasy.<br><br>



<b>SUPPORT:</b> <br>
For any issues locating the venue, you can always contact us on support@housemadeeasy.org or call 07037092267, 08160852570

Thank You
EOD;

    $body .= '</div>';   
    
    
  $subject = "Beyond Books";

//echo '->'.mail($email_owner, $subject, $body, $headers);

  

  $from = "housemadeeasy";
$to = $email;



$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      //

 mail($to, $subject, $body, $headers);