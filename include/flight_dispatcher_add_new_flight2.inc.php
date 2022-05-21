<?php
// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

$controller =  new Flight_Dispatcher_Controller();
print_r($_POST);

if (isset($_POST['tail_no'])) {
    
    $tail_no = htmlentities($_POST['tail_no']);
    $destination = htmlentities($_POST['destination']);
    $economy_price = htmlentities($_POST['economy_price']);
    $platinum_price = htmlentities($_POST['platinum_price']);
    $business_price = htmlentities($_POST['business_price']);
    $departure_date_time_string = htmlentities($_POST['departure_date_time']);
    $arrival_date_time_string = htmlentities($_POST['arrival_date_time']);

    $controller->addNewFlight(
        $tail_no,
        $destination,
        $economy_price,
        $platinum_price,
        $business_price,
        $departure_date_time_string,
        $arrival_date_time_string
    );
    header("Location: ../flight_dispatcher_add_new_flight.php?error=SUCCESS");
    return;
}
elseif (isset($_POST['free_tail_no'])) {
    // echo 'OP2';
    $free_tail_no = htmlentities($_POST['free_tail_no']);
    $destination = htmlentities($_POST['destination']);
    $economy_price = htmlentities($_POST['economy_price']);
    $platinum_price = htmlentities($_POST['platinum_price']);
    $business_price = htmlentities($_POST['business_price']);
    $departure_date_time_string = htmlentities($_POST['departure_date_time']);
    $arrival_date_time_string = htmlentities($_POST['arrival_date_time']);

    $controller->addNewFlight(
        $free_tail_no,
        $destination,
        $economy_price,
        $platinum_price,
        $business_price,
        $departure_date_time_string,
        $arrival_date_time_string
    );

    header("Location: ../flight_dispatcher_add_new_flight.php?error=SUCCESS");
    return;
}
