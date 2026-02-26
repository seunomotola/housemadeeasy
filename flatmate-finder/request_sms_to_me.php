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
 
Hello Seun,
A customer is requesting for the Following house on housemadeeasy.
 
Below are the Details of the house that the Customer want:
Name of Customer:  $lname 
Phone Number:  $pno 
E-mail adreess: $email2 
Type of Apartment looking for:  $kindofapartment 
Apartment tiled or not ?:  $tiled 
Should the Apartment have a wardrobe or not ?:  $present  
About the bathroom and toilet ? do you want it Personal or General ?:  $bathroom 
Other things you want in the Apartment :  $other
Budget for the Apartment, a range ?:  $budget  
What can make you to dislike the house ?: $dislike
";
// Separate multiple numbers by comma
$mobiles = "08160852570";
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
