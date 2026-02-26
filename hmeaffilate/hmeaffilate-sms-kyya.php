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
  CURLOPT_POSTFIELDS => array('token' => 'bCSnXjYpRZHQE9v5gusm4ThtV3dDwlM70oGKIzOF6kaU8PNceyf2qxLJiWr1AB','senderID' => 'HouseMadeE','recipients' => "08116888286",'message' => "
Dear Kyya
Agent $house_agent_lname_session $house_agent_fname_session has uploaded a new house. Kindly go to your dashboard to check the details of the house.
SUPPORT:
For any issues or to make an enquiries, kindly reach out to us on support@housemadeeasy.org or 08160852570, 07037092267
Thank You 
    ",'gateway' => '1'), 
));
$response = curl_exec($curl);
curl_close($curl);
//echo $response;
