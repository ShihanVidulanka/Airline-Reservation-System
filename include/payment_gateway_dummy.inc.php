<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
if(isset($_POST['submit']) && strcmp($_POST['submit'],'pay')==0){
    $booking_id = $_SESSION['booking_id']['booking_id'];
    unset($_SESSION['booking_id']);
    $seat_reservation_controller = new Seat_Reservation_Controller();
    $seat_reservation_controller->pay(remove_unnessaries($booking_id));
}else{
    $booking_id = $_SESSION['booking_id']['booking_id'];
    unset($_SESSION['booking_id']);
    $seat_reservation_controller = new Seat_Reservation_Controller();
    $seat_reservation_controller->cancel(remove_unnessaries($booking_id));
}
