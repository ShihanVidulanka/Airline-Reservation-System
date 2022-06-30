<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";

//print_array($_POST);
$cancel_booking_details_controller = new Cancel_Booking_Controller();
if(isset($_POST)){
    $cancel_booking_details_controller->cancel_booking($_POST['booking_id']);
    header("Location: ../passenger_booking_details.php?error=SUCCESS");

}
