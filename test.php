<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

date_default_timezone_set("Asia/Colombo");
$date = Date("Y-m-d");
$time = date("H:i:s");
//echo $time;

$str = '{"status":"success","message":"email sent"}';
$str_without_brackets = rtrim($str,"}");
$str_without_brackets = ltrim($str_without_brackets,"{");
echo $str_without_brackets;
$array = explode(",",$str_without_brackets);

$associative_array = array();
foreach ($array as $item) {
    $temp = explode(":",$item);
    $associative_array[$temp[0]]=$temp[1];
}
print_array($associative_array);

