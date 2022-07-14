<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";

if(isset($_POST['seatno-flightid'])){
    $post = explode('-',$_POST['seatno-flightid']);
    $seat_reservation_view = new Seat_Reservation_View();
    $reserved_seats = $seat_reservation_view->getReservedSeatsFromModel($post[1]);
    if(in_array($post[0],$reserved_seats)){
        echo 'alreadybooked';
    }else{
        echo 'success';
    }
}

if(isset($_POST['flight_id'])){
    $coefficient = $_SESSION['coefficient'];
    $details=array(
        'passenger_id'=>$_SESSION['passenger_id'],
        'flight_id'=>$_POST['flight_id'],
        'ticket_price'=>$_POST['ticket_price']*$coefficient,
        'seat_no'=>$_POST['seat_no'],
        'seat_type'=>$_POST['seat_type'],
        'state'=>2
    );
    unset($_SESSION['coefficient']);
    $seat_reservation_controller = new Seat_Reservation_Controller();
    $seat_reservation_controller->reserveSeatFromModel($details);
}