<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

if(isset($_POST['username_'])){
    $create_operations_agent_controller = new Airline_Administrator_Controller;
    $create_operations_agent_controller->checkUsernameFromModel($_POST['username_']);
}

if(isset($_POST['submit'])){
    $_POST['telephone_numbers']=rtrim($_POST['telephone_numbers'],',');
    $_POST['telephone_numbers']=explode(",",$_POST['telephone_numbers']);

    $create_operations_agent_controller = new Airline_Administrator_Controller();
    $operations_agent = new Operations_Agent($_POST['user_name'],$_POST['user_id'],$_POST['first_name'], $_POST['last_name'], $_POST['state'], $_POST['airport_code'], $_POST['telephone_nos']);

    $create_operations_agent_controller->createOperationsAgentFromModel($operations_agent);
}
?>