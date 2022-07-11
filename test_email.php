<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

$to = "yasith.19@cse.mrt.ac.lk";
$subject = "Test 5";
$body="Test 5 from php";
$email = new Email($to,$subject,$body);
$email_api = new Email_Api();
$result = $email_api->sendMail($email);
print_array($result);
?>
