<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

print_array($_POST);
// Copied from Yasith
if(isset($_POST['username_'])){
    $create_flight_dispatcher_controller = new Airline_Administrator_Controller;
    $create_flight_dispatcher_controller->checkUsernameFromModel($_POST['username_']);
}

if(isset($_POST['submit'])){
    $_POST['telephone_numbers']=rtrim($_POST['telephone_numbers'],',');
    $_POST['telephone_numbers']=explode(",",$_POST['telephone_numbers']);

    $create_flight_dispatcher_controller = new Airline_Administrator_Controller();
    $flight_dispatcher = new Flight_Dispatcher($_POST['user_id'], $_POST['fd_username'], $_POST['fd_first_name'], $_POST['fd_last_name'], $_POST['fd_airport_code'], $_POST['fd_telephone_numbers']);
    $flight_dispatcher->setEmail($_POST['fd_email']);

    $create_flight_dispatcher_controller->createFlightDispatcherFromModel($flight_dispatcher);
}
?>