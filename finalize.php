<?php
session_start();
$name = isset($_SESSION['name']) ? $_SESSION['name'] : null;
$phone = isset($_SESSION['phone']) ? $_SESSION['phone'] : null;
$whatsapp2 = isset($_SESSION['whatsapp']) ? $_SESSION['whatsapp'] : null;
$type = isset($_SESSION['type']) ? $_SESSION['type'] : null;
$area = isset($_SESSION['area']) ? $_SESSION['area'] : null;
$address = isset($_SESSION['address']) ? $_SESSION['address'] : null;
// Use these variables however you want (store in DB, log, etc.)
include 'request-make-money-with-housemadeeasy-me.php';
 include 'request-make-money-with-housemadeeasy-customer.php'; 
// include 'request-make-money-with-housemadeeasy-darasimi.php';
