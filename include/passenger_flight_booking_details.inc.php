<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";

//print_array($_POST);
$cancel_booking_details_controller = new Cancel_Booking_Controller();
$seat_reservation_view = new Seat_Reservation_View();
if(isset($_POST['booking_id'])){
    $customer = $cancel_booking_details_controller->cancel_booking($_POST['booking_id']);
    if(strcmp($customer,"general")==0){
        header("Location: ../passenger_booking_details.php?error=general");
    }else if(strcmp($customer,"general-email")==0){
        header("Location: ../passenger_booking_details.php?error=general-email");
    }else if(strcmp($customer,"email")==0){
        header("Location: ../passenger_booking_details.php?error=email");
    }
    else{
        header("Location: ../passenger_booking_details.php?error=not-genaral");
    }
}
if(isset($_POST['dest'])){
//    print_array($_POST);
    $seat_reservation_view->getBookedFlightDetailsFromModel($_SESSION['passenger_id'],$_POST['dest']);
}
