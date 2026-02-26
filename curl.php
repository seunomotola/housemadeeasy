<?php
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://graph.facebook.com/v20.0/432072089981510/messages",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    "messaging_product" => "whatsapp",
    "to" => "2347044206267",
    "type" => "template",
    "template" => [
      "name" => "hi",
      "language" => [
        "code" => "en"
      ]
    ]
  ]),
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer EAAMZBVBvCSn8BO4OZCRYI55YjsiFL24Gy6ZACGh3QuYjBBMJfB5b6r4ZCKcoQds1Ae5FuGPHIeGeu2KcA3rSdjDso07TEYKFxlu7fUn9VZBNYcTwqiHBN36aCoBvDq7JXSDTa2JbZC38OvtEpSqfEE9Hep2YzZBMW06zz8rE0gGSD7JX66vFwNr7xnNHeIpCSgA5glw9yxGwWDe5Oypdaj0LOKQoq8ZD",
    "Content-Type: application/json"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
?>
