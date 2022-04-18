<?php

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

$controller = new Airline_Administrator_Controller();

if (isset($_POST['tail_no_'])) {
    if (!empty($controller->getAirplaneDetails($_POST['tail_no_']))) {
        echo 'error';
    }
}

// print_r($_POST);
if (isset($_POST['model']) && isset($_POST['no_platinum_seats']) && isset($_POST['no_economy_seats']) && isset($_POST['no_business_seats']) && isset($_POST['tail_no'])) {
    

    $tail_no = htmlentities($_POST['tail_no']);
    $model = htmlentities($_POST['model']);
    $no_platinum_seats = htmlentities($_POST['no_platinum_seats']);
    $no_economy_seats = htmlentities($_POST['no_economy_seats']);
    $no_business_seats = htmlentities($_POST['no_business_seats']);

    //Image
    $file_size = $_FILES['file_up']['size'];
    $file_type = $_FILES['file_up']['type'];
    $image = file_get_contents($_FILES['file_up']['tmp_name']);


    $controller->addNewAirplane($tail_no, $model, $no_platinum_seats, $no_economy_seats, $no_business_seats, $image, $file_type);
    header("Location: ../airline_administrator_add_new_airplane.php?error=SUCCESS");
    return;
}
