 

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

Kindly note that a customer has  inform you of a vacant Apartment via make money with housemadeeasy. Below are the details of the customer:
Name of Customer:  $name
Phone Number:  $whatsapp2 
Area of Apartment:  $area 
Location of Apartment:  $address 
Type of Apartment : $type


Thank You 

  	",'gateway' => '1'), 
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
