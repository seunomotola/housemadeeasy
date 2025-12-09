<?php
$body = '<div class="email-background" style="background: #eee;padding: 10px; ">
          
            <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 20px;">
              <div style="text-align: center;"><img src="https://www.housemadeeasy.org/assets/images/HouseMadeEasylogo.jpg" style="width: 50%; height:50%"></div>';
       $body .= <<<EOD
<br>
 
Dear <b>Elijah</b>,<br><br><br>

Hello Elijah,<br><br>
A customer is requesting for the Following house on housemadeeasy. <br><br>
Below are the Details of the house that the Customer want:<br><br>
Name of Customer:  $lname <br><br>
Phone Number:  $pno <br><br>
Type of Apartment looking for:  $kindofapartment <br><br>
Apartment tiled or not ?:  $tiled <br><br>
Should the Apartment have a wardrobe or not ?:  $present  <br><br>
About the bathroom and toilet ? do you want it Personal or General ?:  $bathroom <br><br>
Other things you want in the Apartment :  $other<br><br>
Budget for the Apartment, a range ?:  $budget  <br><br>
What can make you to dislike the house ?: $dislike <br><br>

<b>SUPPORT:</b> <br>
For any issues with your login Details, you can always contact us on support@housemadeeasy.org or call 07037092267, 08160852570<br><br>

Thank You
EOD;

    $body .= '</div>';   
    
    
  $subject = "House Request";

//echo '->'.mail($email_owner, $subject, $body, $headers);

  

  $from = "housemadeeasy";
$to = "housemadeeasy@gmail.com";



$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      //

 mail($to, $subject, $body, $headers);