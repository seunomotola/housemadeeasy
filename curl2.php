<?php
// Initialize cURL session
function sendWhatsAppMessage($number, $heelo, $apart, $house_id) {
    $ch = curl_init();
    // Set the URL for the request
    curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v20.0/380053521865780/messages");
    // Set the HTTP request method to POST
    curl_setopt($ch, CURLOPT_POST, 1);
    // Set the headers
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer EAAPZAp7QFsFABOZBXVmmWo81OFrn9mGxPbj65n5xD3Di6Gwp0o6QOO2NUtxnQ5kdpCpH2CZAv6sTZA2rZAKBkQZABX5q9MGU8BzslkJ6mAMSxuGlBhn3sLjhmd3t51XhLrvEPuqaZCAkU3o3GFpqHSF4WPZCyTUN9iSOEKkto6HvRLjAFdFzbcRqataHZBd8ldbj2UQZDZD',
        'Content-Type: application/json'
    ]);
    // Set the payload with header, body, and button components
    $data = json_encode([
        "messaging_product" => "whatsapp",
        "to" => "$number",
        "type" => "template",
        "template" => [
            "name" => "house_easy", // Ensure this template exists
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
                                "link" => "https://housemadeeasy.org/assets/images/flatmate/house8.jpg" // Valid URL
                            ]
                        ]
                    ]
                ],
                [
                    "type" => "body",
                    "parameters" => [
                        [
                            "type" => "text",
                            "text" => "$heelo" // First body text
                        ],
                        [
                            "type" => "text",
                            "text" => "$apart" // Second body text
                        ]
                    ]
                ],
                [
                    "type" => "button",
                    "sub_type" => "url",
                    "index" => "0",
                    "parameters" => [
                        [
                            "type" => "text", // Use text for URL
                            "text" => "https://yourdomain.com/details.php?id=$house_id" // Correct URL format
                        ]
                    ]
                ]
            ]
        ]
    ]);
    // Attach JSON data to POST fields
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    // Set to return the transfer as a string of the return value of curl_exec()
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Execute the request and store the response
    $response = curl_exec($ch);
    // Check for cURL errors
    if (curl_errno($ch)) {
        echo 'cURL error: ' . curl_error($ch) . "\n";
    } else {
        echo 'Response: ' . $response . "\n";
    }
    // Close cURL session
    curl_close($ch);
}
// List of numbers to send the message to
$numbers = ['2347037092267', '2347044206267', '2348160852570']; // Add more numbers as needed
// Loop through each number and send the message
foreach ($numbers as $number) {
    sendWhatsAppMessage($number, 'Seun', 'Two bedroom flat', '199');
}
