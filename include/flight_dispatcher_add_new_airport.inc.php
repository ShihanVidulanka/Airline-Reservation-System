<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

if (isset($_POST['create'])) {
    
    $controller = new Flight_Dispatcher_Controller();
    $airport_code = htmlentities($_POST['airport_code']);
    $airport_name = htmlentities($_POST['airport_name']);
    $country = htmlentities($_POST['country']);
    $province = htmlentities($_POST['province']);
    $city = htmlentities($_POST['city']);

    $validityAirportCode = $controller->validateAirportCode($airport_code);
    $checkEmpty = $controller->checkDuplicateAirports($airport_code);

    if ($validityAirportCode=='SUCCESS' and $checkEmpty) {
        $controller->addAirport($airport_code, $airport_name, $country, $province, $city);
        header("Location: ../flight_dispatcher_add_new_airport.php?error={$validityAirportCode}");
        return;
    }else if(!$checkEmpty){
        $error = 'Duplicate Airport Found!';
        header("Location: ../flight_dispatcher_add_new_airport.php?error={$error}");
        return;
    }else{
        header("Location: ../flight_dispatcher_add_new_airport.php?error={$validityAirportCode}");
        return;
    }
}

?>