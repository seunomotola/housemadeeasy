<?php
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
echo "Environment variables loaded successfully!<br>";
echo "Google Client ID: " . $_ENV['GOOGLE_CLIENT_ID'] . "<br>";
echo "Google Client Secret: " . substr($_ENV['GOOGLE_CLIENT_SECRET'], 0, 10) . "...<br>";
echo "Callback URL: " . $_ENV['CALLBACK_URL'] . "<br>";
?>
