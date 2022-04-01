<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

if (isset($_POST['search'])){
    

    if (!isset($_POST['dropdown'])) {
        header("Location: ../flight_dispatcher_flight_details.php");
        return;
    }else{
        $destination = htmlentities($_POST['dropdown']);
        header("Location: ../flight_dispatcher_flight_details.php?show={$destination}");
        return;
    }
}
