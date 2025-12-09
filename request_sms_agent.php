 
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


Dear Agent,

Please Note that a customer is requesting for the Following house on housemadeeasy.
 Incase you have any of the house that the customer requested for, Please kindly revert back to housemadeeasy as quick as Possible.

Below are the Details of the house that the Customer want:

Type of Apartment looking for: $kindofapartment
Apartment tiled or not ?: $tiled
Should the Apartment have a wardrobe or not ?: $present 
About the bathroom and toilet ? do you want it Personal or General ?: $bathroom 
Other things you want in the Apartment : $other
Budget for the Apartment, a range ?: $budget 
What can make you to dislike the house ?: $dislike 

        

SUPPORT:
For any issues or to make an enquiries, kindly reach out to us on info@housemadeeasy.com.ng or 08160852570, 07037092267

Thank You

  	",'gateway' => '1'),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;
