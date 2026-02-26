 <?php
 $body = '<div class="email-background" style="background: #eee;padding: 10px; ">
          
           <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 20px;">
              <div style="text-align: center;"><img src="https://www.housemadeeasy.org/assets/images/HouseMadeEasylogo.jpg" style="width: 50%; height:50%"></div>';
       $body .= <<<EOD
<br>
 
Dear <b>Elijah</b>,<br><br>
Please Note that $fname_used has request for a withdrawal for the people referral..<br><br> Below are the Details of the Customer that request for withdrawal..<br><br>
<ol>
    <li> Name of customer: $lname_used $fname_used </li>
    <li> Referral ID : $referral_id</li>
    <li> Referral code attached to the withdrawal: $referral_code</li>
    <li>Account Name of the customer: $account_name </li>
    <li>Account Number of the customer: $account_number </li>
    <li>Bank Name of the customer: $bank_name </li>
    <li>Name of user that used the referral code: $fname_used_by_new </li>
        
</ol><br>
<b>SUPPORT:</b> <br>
For any issues with you contacting the customer, you can always contact us on support@housemadeeasy.org or 08160852570, 07037092267<br><br>
Thank You
EOD;
    $body .= '</div>';  
    
    
  $subject = "Checking of Apartment";
//echo '->'.mail($email_owner, $subject, $body, $headers);
  
  $from = "housemadeeasy";
$to = $agent_email;
$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      //
mail($to, $subject, $body, $headers);
//echo $body;
