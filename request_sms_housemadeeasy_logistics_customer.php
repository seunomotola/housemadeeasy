 
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
  CURLOPT_POSTFIELDS => array('token' => 'bCSnXjYpRZHQE9v5gusm4ThtV3dDwlM70oGKIzOF6kaU8PNceyf2qxLJiWr1AB','senderID' => 'HMElogistic','recipients' => "$pno",'message' => "
Dear $lname
Thank you for using housemadeeasy logistics as a means to transport your load.
Kindly pack all your load together to avoid any delay in transportation.
We will get across to you in a jiffy via phone call.
SUPPORT:
You can always contact us on support@housemadeeasy.org or call 07037092267, 08160852570
Thank You
  	",'gateway' => '1'), 
));
$response = curl_exec($curl);
curl_close($curl);
//echo $response;
