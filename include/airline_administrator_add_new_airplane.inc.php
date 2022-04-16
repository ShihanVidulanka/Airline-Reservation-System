<?php

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

if (isset($_POST['submit'])) {

    $controller = new Airline_Administrator_Controller();
    $tail_no = htmlentities($_POST['tail_no']);
    $model = htmlentities($_POST['model']);
    $no_platinum_seats = htmlentities($_POST['no_platinum_seats']);
    $no_economy_seats = htmlentities($_POST['no_economy_seats']);
    $no_business_seats = htmlentities($_POST['no_business_seats']);

    //Image
    $file_size = $_FILES['file_up']['size'];
    $image = file_get_contents($_FILES['file_up']['tmp_name']);


    $error = $controller->validateAddNewAirplane($tail_no, $model, $no_platinum_seats, $no_economy_seats, $no_business_seats, $image, $file_size);
    header("Location: ../airline_administrator_add_new_airplane.php?error={$error}");
    return;
}
