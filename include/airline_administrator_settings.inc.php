<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";
if (isset($_POST['submit'])){
    $booking_count = $_POST['booking_count'];
    $discount = $_POST['discount'];

    $airline_administrator_settings_controller = new Airline_Administrator_Settings_Controller();
    if((!empty($booking_count) && (!empty($discount))) && $booking_count!=0){
        $airline_administrator_settings_controller->setRegularPassengerDetails($booking_count,$discount);
        header('Location:../airline_administrator_settings.php?error=success');
    }else{
        header('Location:../airline_administrator_settings.php?error=zerocount');
    }

}