<?php
// Central database connection file for all modules
// Load environment variables
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();
$db_host = $_ENV['DB_HOST'];
$db_user = $_ENV['DB_USER'];
$db_pass = $_ENV['DB_PASS'];
$db_name = $_ENV['DB_NAME'];
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die('no connection to the MYSQL server');
if(mysqli_connect_errno()){
	echo 'Failed to connect to the MYSQL: '.mysqli_connect_error();
	}
	
?>
