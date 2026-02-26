 
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
  CURLOPT_POSTFIELDS => array('token' => 'bCSnXjYpRZHQE9v5gusm4ThtV3dDwlM70oGKIzOF6kaU8PNceyf2qxLJiWr1AB','senderID' => 'HouseMadeE','recipients' => "07063826326, 07070459338",'message' => "
Hello Dami,
Please Note that a customer has booked to check out a $house_name_session at $house_exact_session at $timeslot  which belong to agent $house_agent_session 
Kindly check your mail for the details of the customer and house booked
  	",'gateway' => '1'),
));
$response = curl_exec($curl);
curl_close($curl);
//echo $response;
