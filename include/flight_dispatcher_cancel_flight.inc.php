<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

if (isset($_GET['id'])){
    $controller =  new Flight_Dispatcher_Controller();
    $flight_id = htmlentities($_GET['id']);

    $controller->cancelFlight($flight_id);
    header("Location: ../flight_dispatcher_flight_details.php?show=none");
    return;
}

?>