<?php
// Initialize cURL session
$ch = curl_init();
// Set the URL and request type
curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v20.0/432072089981510/messages');
curl_setopt($ch, CURLOPT_POST, true);
// Set the headers
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer EAAMZBVBvCSn8BO8emfL3igNKf6zTxnNqalZCZBwgktUT0cQjmzS3G3QAxX6B1Xf7jgetDsjvjb870bMyMpYl9ZCX6faCuwtq9If8bEX5vnfNaK2qZAXGZCZAq3YYlXZCjl9MZAMjk69AVor5CBOZBBZAu8X2BJygTe605IikMfMKk68OaBQm1zWnl7ecZBj32wiFkssOzFK4ahwc5nXZB31ZBBtK28ZBf29um0ZD',
    'Content-Type: application/json'
));
// Set the data to be sent in JSON format
$data = array(
    "messaging_product" => "whatsapp",
    "to" => "2347044206267",
    "type" => "template",
    "template" => array(
        "name" => "ola",
        "language" => array(
            "code" => "en"
        )
    )
);
// Encode the data to JSON
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
// Return the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Execute the request
$response = curl_exec($ch);
// Check for errors
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    echo 'Response:' . $response;
}
// Close the cURL session
curl_close($ch);
?>
