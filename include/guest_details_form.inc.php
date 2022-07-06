<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

// print_array($_POST);

if(isset($_POST['Submit'])){
    $Guest_Controller = new Guest_Controller();
    $guest = new Guest();

    $guest->setFirst_name($_POST['first_name']);
    $guest->setLast_name($_POST['last_name']);
    $guest->setDob($_POST['dob']);
    $guest->setPassport_number($_POST['passport_number']);
    $guest->setPhone_no($_POST['telephone']);

    $Guest_Controller->UpdateGuestFromModel($guest);
}
