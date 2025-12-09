 
<?php
 
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://my.kudisms.net/api/sms',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('token' => 'bCSnXjYpRZHQE9v5gusm4ThtV3dDwlM70oGKIzOF6kaU8PNceyf2qxLJiWr1AB','senderID' => 'HouseMadeE','recipients' => "08160852570",'message' => "


Hello Kyya,
Please Note that a customer has booked for an urgent checking for a $house_name_session at $house_exact_session at $timeslot on $date_new.. 
Kindly check your dashboard for the details of the customer and house booked for by the customer


SUPPORT:
For any issues with you contacting the customer, you can always contact us on info@housemadeeasy.com.ng or 08160852570, 07037092267

Thank You

  	",'gateway' => '1'),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;
