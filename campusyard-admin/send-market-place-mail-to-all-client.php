<?php
$body = '<div class="email-background" style="background: #eee;padding: 10px; ">
          
            <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 20px;">
              <div style="text-align: center;"><img src="https://www.housemadeeasy.org/assets/images/HouseMadeEasylogo.jpg" style="width: 50%; height:50%"></div>';
       $body .= <<<EOD
<br>
 


Dear $fname,<br><br><br>
A student  want to sell  $item_name at a price of $item_price.<br><br> if you are interested, kindly click the link below to check the details of the item. <br><br>

$item_link


<b>SUPPORT:</b> <br>
For any issues with your login Details, you can always contact us on support@housemadeeasy.org or call 07037092267, 08160852570

Thank You
EOD;

    $body .= '</div>';   
    
    
  $subject = "Housemadeeasy Market Place";

//echo '->'.mail($email_owner, $subject, $body, $headers);

  

  $from = "housemadeeasy";
$to = $email;



$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      //

 mail($to, $subject, $body, $headers);