<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

$controller = new Flight_Dispatcher_Controller();

if (isset($_POST['airport_code_'])) {
    $checkDuplicate = $controller->checkDuplicateAirports($_POST['airport_code_']);
    echo $checkDuplicate;
}
if (isset($_POST['airport_code']) && isset($_POST['airport_name']) && isset($_POST['country']) && isset($_POST['province']) && isset($_POST['city'])) {

    
    $airport_code = htmlentities($_POST['airport_code']);
    $airport_name = htmlentities($_POST['airport_name']);
    $country = htmlentities($_POST['country']);
    $province = htmlentities($_POST['province']);
    $city = htmlentities($_POST['city']);

    $controller->addAirport($airport_code, $airport_name, $country, $province, $city);
    header("Location: ../airline_administrator_add_new_airport.php?error=SUCCESS");

}