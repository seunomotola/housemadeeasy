<?php

$url = "https://graph.facebook.com/v20.0/380053521865780/messages";
$authorization = "Bearer EAAPZAp7QFsFABOZBXVmmWo81OFrn9mGxPbj65n5xD3Di6Gwp0o6QOO2NUtxnQ5kdpCpH2CZAv6sTZA2rZAKBkQZABX5q9MGU8BzslkJ6mAMSxuGlBhn3sLjhmd3t51XhLrvEPuqaZCAkU3o3GFpqHSF4WPZCyTUN9iSOEKkto6HvRLjAFdFzbcRqataHZBd8ldbj2UQZDZD";

// Define the data with the required image and body parameters
$data = [
    "messaging_product" => "whatsapp",
    "to" => "$pno2",
    "type" => "template",
    "template" => [
        "name" => "hello_house", 
        "language" => [
            "code" => "en_US"
        ],
        "components" => [
            [
                "type" => "header",
                "parameters" => [
                    [
                        "type" => "image",
                        "image" => [
                            "link" => "https://housemadeeasy.org/Main.jpg" // Ensure the image URL is valid and publicly accessible
                        ]
                    ]
                ]
            ],
            [
                "type" => "body",
                "parameters" => [
                    [
                        "type" => "text",
                        "text" => "$lname2" // Replace this with the parameter expected by your template
                    ]
                ]
            ]
        ]
    ]
];

// Initialize cURL session
$ch = curl_init($url);

// Set the required headers, including authorization
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: $authorization",
    "Content-Type: application/json"
]);

// Configure cURL options for sending a POST request with JSON data
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request and capture the response
$response = curl_exec($ch);

// Check for errors and display the response or error message
if(curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    echo 'Response: ' . $response;
}

// Close the cURL session
curl_close($ch);

