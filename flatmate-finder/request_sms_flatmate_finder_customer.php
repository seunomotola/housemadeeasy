
 

 

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
Hello $lname,

Thank you for making  your request known to us about your desire to look for a flat mate for your apartment. Kindly note that we will get across to you in a jiffy via sms or your e-mail address.

From housemadeeasy Teams

SUPPORT:
For any issues or to make an enquiries, kindly reach out to us on info@housemadeeasy.org or 08160852570, 07037092267

Thank You

    ",'gateway' => '1'), 
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;



