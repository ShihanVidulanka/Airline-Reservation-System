<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

if (isset($_POST['searchOrigin'])){
    
    if (!isset($_POST['dropdownOrigin'])) {
        header("Location: ../flight_dispatcher_flight_details.php");
        return;
    }else{
        $origin = htmlentities($_POST['dropdownOrigin']);
        header("Location: ../flight_dispatcher_flight_details.php?show_o={$origin}");
        return;
    }
}
?>