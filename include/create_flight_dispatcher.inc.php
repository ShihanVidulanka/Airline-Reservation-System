<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

// Copied from Yasith
if(isset($_POST['username_'])){
    $create_flight_dispatcher_controller = new Airline_Administrator_Controller;
    $create_flight_dispatcher_controller->checkUsernameFromModel($_POST['username_']);
}

if(isset($_POST['submit'])){
    $_POST['telephone_numbers']=rtrim($_POST['telephone_numbers'],',');
    $_POST['telephone_numbers']=explode(",",$_POST['telephone_numbers']);

    $create_flight_dispatcher_controller = new Airline_Administrator_Controller();
    // $flight_dispatcher = new Flight_Dispatcher();
    // Then set everthing with ($_POST['everything'])

    // $create_flight_dispatcher_controller->createFlightDispatcherFromModel($flight_dispatcher);
}
?>