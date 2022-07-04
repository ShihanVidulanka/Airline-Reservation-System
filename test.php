<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

date_default_timezone_set("Asia/Colombo");
$date = Date("Y-m-d");
$time = date("H:i:s");
echo $time;


