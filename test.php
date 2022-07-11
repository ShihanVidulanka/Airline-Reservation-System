<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/class/email_client.interface.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/email/email_api.class.php";

date_default_timezone_set("Asia/Colombo");
$date = Date("Y-m-d");
$time = date("H:i:s");
echo $time;

$to = "yasith.19@cse.mrt.ac.lk";
$subject = "Test 3";
$body="Test 3 from php";
$email = new Email($to,$subject,$body);
$email_api = new Email_Api();
$result = $email_api->sendMail($email);
echo $result;

