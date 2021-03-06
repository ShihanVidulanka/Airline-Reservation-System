<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

// print_array($_POST);


if(isset($_POST['username_'])){
    $signup_controller=new SignUp_Controller;
    $signup_controller->checkUsernameFromModel($_POST['username_']);
}
if(isset($_POST['passport_number_'])){
    $signup_controller=new SignUp_Controller;
    $signup_controller->checkPassportNoFromModel($_POST['passport_number_']);
}
if(isset($_POST['username'])){
    $_POST['telephone_numbers']=rtrim($_POST['telephone_numbers'],',');
    $_POST['telephone_numbers']=explode(",",$_POST['telephone_numbers']);

    $signUp_Controller = new SignUp_Controller();
    $registered_passenger = new Registered_Passenger();

    $registered_passenger->setUsername($_POST['username']);
    $registered_passenger->setPassword($_POST['password']);
    $registered_passenger->setAccount_type(3);
    $registered_passenger->setPassenger_type(0);
    // $registered_passenger->setNIC($_POST['NIC']);
    $registered_passenger->setFirst_name($_POST['first_name']);
    $registered_passenger->setLast_name($_POST['last_name']);
    $registered_passenger->setDob($_POST['dob']);
    $registered_passenger->setPassport_number($_POST['passport_number']);
    $registered_passenger->setCategory(0);
    $registered_passenger->setIs_deleted(0);
    $registered_passenger->setTelephone_numbers($_POST['telephone_numbers']);
    $registered_passenger->setEmail($_POST['email']);

    $signUp_Controller->createRegisteredPassengerFromModel($registered_passenger);
}