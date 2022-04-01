<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";



$_POST['telephone_numbers']=rtrim($_POST['telephone_numbers'],',');
$_POST['telephone_numbers']=explode(",",$_POST['telephone_numbers']);
// print_array($_POST);

$signUp_Controller = new SignUp_Controller();
$registered_passenger = new Registered_Passenger();

$registered_passenger->setUsername($_POST['username']);
$registered_passenger->setPassword($_POST['password']);
$registered_passenger->setAccount_type(3);
$registered_passenger->setPassenger_type(0);
$registered_passenger->setNIC($_POST['NIC']);
$registered_passenger->setFirst_name($_POST['first_name']);
$registered_passenger->setLast_name($_POST['last_name']);
$registered_passenger->setDob($_POST['dob']);
$registered_passenger->setPassport_number($_POST['passport_number']);
$registered_passenger->setCategory(0);
$registered_passenger->setState(0);
$registered_passenger->setTelephone_numbers($_POST['telephone_numbers']);

$signUp_Controller->createRegisteredPassengerFromModel($registered_passenger);
