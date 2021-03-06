<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

// print_array($_POST);

if(isset($_POST['fd_username_'])){
    $create_flight_dispatcher_controller = new Airline_Administrator_Controller;
    $create_flight_dispatcher_controller->checkUsernameFromModel($_POST['fd_username_']);
}

if(isset($_POST['fd_first_name'])){
    $_POST['fd_telephone_numbers']=rtrim($_POST['fd_telephone_numbers'],',');
    $_POST['fd_telephone_numbers']=explode(",",$_POST['fd_telephone_numbers']);

    $create_flight_dispatcher_controller = new Airline_Administrator_Controller();
    $flight_dispatcher = new Flight_Dispatcher($_POST['fd_user_id'], $_POST['fd_username'], $_POST['fd_first_name'], $_POST['fd_last_name'], $_POST['fd_airport_code'], $_POST['fd_telephone_numbers']);
    $flight_dispatcher->setEmail($_POST['fd_email']);

    $create_flight_dispatcher_controller->createFlightDispatcherFromModel($flight_dispatcher);
}
?>