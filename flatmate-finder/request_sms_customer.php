
<?php
/*
 Sending messages using the KudiSMS API
 Requirements - PHP, file_get_contents (enabled) function
*/
// Initialize variables ( set your variables here )
$username = "seunomotola1997@gmail.com";
$password = "seunomotola";


$sender = "HouseMadeE";
$message = "
 
Dear $lname,
Thank you for making  your request known to us about your desire house. Kindly note that we will get across to you in a jiffy via sms or your e-mail address.

From housemadeeasy Teams

SUPPORT:
For any issues or to make an enquiries, kindly reach out to us on info@housemadeeasy.com.ng or 08160852570, 07037092267

Thank You


";
// Separate multiple numbers by comma
$mobiles = $pno;
// Set your domain's API URL
$api_url = "https://account.kudisms.net/api/";
//Create the message data


$data = array('username'=>$username, 'password'=>$password, 'sender'=>$sender,
'message'=>$message, 'mobiles'=>$mobiles);
//URL encode the message data
$data = http_build_query($data);
//Send the message
$request = $api_url.'?'.$data;
$result = file_get_contents($request);
$result = json_decode($result);

if(isset($result->status) && strtoupper($result->status) == 'OK')
{
 // Message sent successfully, do anything here
 echo 'Message sent at N'.$result->price;
}
else if(isset($result->error)) 
{
 // Message failed, check reason.
 echo 'Message failed - error: '.$result->error;
}
else {
 // Could not determine the message response.
 echo 'Unable to process request';
}
?>