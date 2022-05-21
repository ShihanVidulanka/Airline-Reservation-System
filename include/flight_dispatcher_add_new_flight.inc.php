<?php
// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

$controller =  new Flight_Dispatcher_Controller();

if (isset($_POST['departure_datetime_'])) {

    $departure_date_time_string = $_POST['departure_datetime_'];
    $arr = explode("T", $departure_date_time_string);

    $data = $controller->getFreeAriplanes($_SESSION['airport_code'], $departure_date_time_string, $arr[0], $arr[1]);
    echo json_encode($data);
}

if (isset($_POST['free_departure_datetime_'])) {
    $data = $controller->getNewAirplanes();
    echo json_encode($data);
}

// print_r($_POST);
