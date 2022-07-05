<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

if (isset($_GET['passenger_id'])){
    $controller =  new Operation_Agent_Controller();
    $passenger_id = htmlentities($_GET['passenger_id']);
    echo $_GET['onclick'];
    echo $passenger_id;
   
    //  header("Location: ../operation_agent_view_passenger.php");
    // return;
}
if (isset($_GET['id'])){
    $controller =  new Operation_Agent_Controller();
    $passenger_id = htmlentities($_GET['id']);
    $flight_id=htmlentities($_GET['flight_id']);
    echo $passenger_id;
    $controller->removePassenger($passenger_id,$flight_id);
    header("Location: ../operation_agent_view_passenger.php");
    return;
    echo "ddddddddddddddddddddddddd";
}

?>