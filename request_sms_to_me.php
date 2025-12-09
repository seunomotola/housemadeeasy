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
  CURLOPT_POSTFIELDS => array('token' => 'bCSnXjYpRZHQE9v5gusm4ThtV3dDwlM70oGKIzOF6kaU8PNceyf2qxLJiWr1AB','senderID' => 'HouseMadeE','recipients' => '2348160852570','message' => "


Hello Elijah,
A customer is requesting for the Following house on housemadeeasy.
Kindly check your mail for the details of the customer and house requesting for by the customer

  	",'gateway' => '1'),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;
