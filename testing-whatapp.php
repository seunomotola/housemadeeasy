<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://dkpjzl.api.infobip.com/whatsapp/1/message/text',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{"from":"441134960000","to":"441134960001","messageId":"a28dd97c-1ffb-4fcf-99f1-0b557ed381da","content":{"text":"Some text"},"callbackData":"Callback data","notifyUrl":"https://www.example.com/whatsapp","urlOptions":{"shortenUrl":true,"trackClicks":true,"trackingUrl":"https://example.com/click-report","removeProtocol":true,"customDomain":"example.com"}}',
    CURLOPT_HTTPHEADER => array(
        'Authorization: {293c3dd5143dabb595b98c69554b2056-52f2078a-ce5d-4a82-8def-4d115f7dbe8b}',
        'Content-Type: application/json',
        'Accept: application/json'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
