<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

echo $_GET['id_o'];
if (isset($_GET['id_o'])){
    echo 'mmmmm1';
    $operation_agent_controller=new Operation_Agent_Controller();
    $flight_id=$_GET['id_o'];
    $_SESSION['flight_id']=$flight_id;
    $_SESSION['origin']=$_GET['origin'];
    $_SESSION['destination']=$_GET['destination'];
    $_SESSION['departure_time']=$_GET['departure_time'];
    $_SESSION['departure_date']=$_GET['departure_date'];
    header("Location: ../operation_agent_view_passenger.php?flight_id=$flight_id");
    echo $flight_id;
    
}
if (isset($_GET['view'])){
    echo 'mmmmm2';
    
}
?>