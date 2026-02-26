 
<?php
// Sample input
$whatsapp = $whatsapp2; // Replace with real input
//$name = 'John Doe';        // Replace with real name
// 1. Sanitize phone number
$whatsapp = preg_replace('/[^0-9]/', '', $whatsapp);
if (substr($whatsapp, 0, 1) === '0') {
    $whatsapp = substr($whatsapp, 1); // Remove leading 0
}
$recipient = "234$whatsapp";
// 2. Debug output
echo "DEBUG: Raw phone input: $whatsapp\n";
echo "DEBUG: Final recipient: $recipient\n";
// 3. Message content
$message = "
Dear $name
Thank you for using Make money with housemadeeasy as a means to make some cool cash.
We will get across to you in a jiffy via phone call.
SUPPORT:
You can always contact us on support@housemadeeasy.org or call 07037092267, 08160852570
Thank You
";
// 4. Send the request
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
    CURLOPT_POSTFIELDS => array(
        'token' => 'bCSnXjYpRZHQE9v5gusm4ThtV3dDwlM70oGKIzOF6kaU8PNceyf2qxLJiWr1AB',
        'senderID' => 'HouseMadeE',
        'recipients' => $recipient,
        'message' => $message,
        'gateway' => '1'
    ),
));
$response = curl_exec($curl);
curl_close($curl);
echo "Response from API: $response\n";
