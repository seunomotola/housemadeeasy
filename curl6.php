<?php

$url = 'https://graph.facebook.com/v20.0/431756306684085/messages';
$token = 'EAAOVWRuXXR0BOy4UNlszXrOcNZBfEbZAx5jQNFiDt4jZBShVFhpVoh8fJ0ZBT70P7ZAjOY1jypuwLHVNv7p7B62cNRrwhO9SlXdsRrWMZCdKZACLox277iTLHrixZCu6EhSEuZAKqRWyRvkMDnDZCLG3SDZBsJfSN6QQBxAz260hoW86Pj4eqpKOK3ug8H96ajZCOZB8KXgZDZ';

$data = [
    'messaging_product' => 'whatsapp',
    'to' => '2347044206267',
    'type' => 'template',
    'template' => [
        'name' => 'welcome_message',
        'language' => [
            'code' => 'en_US'
        ]
    ]
];

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $token
]);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($response === FALSE || $httpcode !== 200) {
    echo "Error: " . curl_error($ch) . " HTTP code: " . $httpcode;
} else {
    echo "Response: " . $response;
}

curl_close($ch);
