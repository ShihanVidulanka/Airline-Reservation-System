<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";

// // print_array($_POST);
// if (!isset($_SESSION['passenger_id'])) {
//     $Guest_Controller = new Guest_Controller();
//     $guest = new Guest();
//     $guest->setDob("0000-00-00");
//     $guest-> setPhone_no(0);
//     $Guest_Controller->createGuestFromModel($guest);
// }

if (isset($_POST['destination'])) {
    $flight_view = new Flight_View();
    $flight_view->guest_getFlightDetailsFromModel($_POST['destination']);
}
?>