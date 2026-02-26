<?php
/**
 * Send an SMS message by using Infobip API PHP Client.
 * 
 * For your convenience, environment variables are already pre-populated with your account data 
 * like authentication, base URL and phone number.
 * 
 * Please find detailed information in the readme file.
 */ 
require 'vendor/autoload.php';
use GuzzleHttp\Client;
use Infobip\Api\SendSmsApi;
use Infobip\Configuration;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
 
$BASE_URL = "https://k3v8z1.api.infobip.com";
$API_KEY = "932e2019ca87799b67b27124665cfd25-6905fc5c-913d-4f5e-be7e-7ad1b75a0dc7";
$x='hello';
$SENDER = "2347037092267";
$RECIPIENT = "2347037092267";
$MESSAGE_TEXT = "$x seun ooooooooo2";
 
$configuration = (new Configuration())
    ->setHost($BASE_URL)
    ->setApiKeyPrefix('Authorization', 'App')
    ->setApiKey('Authorization', $API_KEY);
 
$client = new Client();
 
$sendSmsApi = new SendSMSApi($client, $configuration);
$destination = (new SmsDestination())->setTo($RECIPIENT);
$message = (new SmsTextualMessage())
    ->setFrom($SENDER)
    ->setText($MESSAGE_TEXT)
    ->setDestinations([$destination]);
 
$request = (new SmsAdvancedTextualRequest())->setMessages([$message]);
 
try {
    $smsResponse = $sendSmsApi->sendSmsMessage($request);
    echo ("Response body: " . $smsResponse);
} catch (Throwable $apiException) {
    echo("HTTP Code: " . $apiException->getCode() . "\n");
}
