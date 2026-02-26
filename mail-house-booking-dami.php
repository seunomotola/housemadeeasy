<?php
 $body = '<div class="email-background" style="background: #eee;padding: 10px; ">
          
           <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 20px;">
              <div style="text-align: center;"><img src="https://www.housemadeeasy.org/assets/images/HouseMadeEasylogo.jpg" style="width: 50%; height:50%"></div>';
       $body .= <<<EOD
<br> 
 
Dear <b>Dami</b>,<br><br>
Please Note that an apartment at $house_exact_session have been booked for checking..<br><br> Below are the Details of the Customer that want to come and check it..<br><br>
<ol>
 <li> Agent Name: $house_agent_session</li>
 <li> Agent Phone Number: $agent_pno</li>
<li> Customer Name: $fname $lname</li>
<li> Customer Phone Number: $pno</li>
    <li> Date Booked for: $date_new</li>
    <li> Time Booked for: $timeslot</li>
    <li>House Type: $house_name_session </li>
      <li>House Location: $house_exact_session,$house_location_session </li>
        <li>House Price: $first_year_rent_session</li>
        <li>House Negotiable: $negotiable</li>
        
</ol><br>
<b>SUPPORT:</b> <br>
For any issues with you contacting the customer, you can always contact us on support@housemadeeasy.org or 08160852570, 07037092267<br><br>
Thank You
EOD;
    $body .= '</div>';  
    
    
  $subject = "Checking of Apartment";
//echo '->'.mail($email_owner, $subject, $body, $headers);
  
  $from = "housemadeeasy";
$to = "hmehousing@gmail.com";
$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      //
mail($to, $subject, $body, $headers);
//echo $body;
