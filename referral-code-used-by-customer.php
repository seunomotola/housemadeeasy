 
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
  CURLOPT_POSTFIELDS => array('token' => 'bCSnXjYpRZHQE9v5gusm4ThtV3dDwlM70oGKIzOF6kaU8PNceyf2qxLJiWr1AB','senderID' => 'HouseMadeE','recipients' => "$pno_referral",'message' => "


Hello $fname_referral,
Your referral link $referral_code_link has been used by $fname_used_by_new and your account has been credited with $credit_amount 
Kindly check your dashboard to withdraw the money.


SUPPORT:
For any issues with you withdrawing the money, you can always contact us on support@housemadeeasy.org or 08160852570, 07037092267

Thank You

  	",'gateway' => '1'),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

