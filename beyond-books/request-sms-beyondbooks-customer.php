 
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
  CURLOPT_POSTFIELDS => array('token' => 'bCSnXjYpRZHQE9v5gusm4ThtV3dDwlM70oGKIzOF6kaU8PNceyf2qxLJiWr1AB','senderID' => 'HouseMadeE','recipients' => "$pno",'message' => "
Dear $lname
Thank you for registering for Housemadeeasy workshop 1.0...
Beyond Books: Building wealth through Housemadeeasy.
Holding at Adebola Adegunwa Audio Visual Hall Nursing Department OOUTH on 9th of February, 2024 by 10am.
  	",'gateway' => '1'), 
));
$response = curl_exec($curl);
curl_close($curl);
//echo $response;
