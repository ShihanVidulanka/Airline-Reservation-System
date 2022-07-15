<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

// print_array($_POST);

if(isset($_POST['oa_username_'])){
    $create_operations_agent_controller = new Airline_Administrator_Controller;
    $create_operations_agent_controller->checkUsernameFromModel($_POST['oa_username_']);
}

if(isset($_POST['oa_first_name'])){
    $_POST['oa_telephone_numbers']=rtrim($_POST['oa_telephone_numbers'],',');
    $_POST['oa_telephone_numbers']=explode(",",$_POST['oa_telephone_numbers']);

    $create_operations_agent_controller = new Airline_Administrator_Controller();
    $operations_agent = new Operations_Agent($_POST['oa_username'],$_POST['oa_user_id'],$_POST['oa_first_name'], $_POST['oa_last_name'], '', $_POST['oa_airport_code'], $_POST['oa_telephone_numbers']);
    $operations_agent->setEmail($_POST['oa_email']);

    $create_operations_agent_controller->createOperationsAgentFromModel($operations_agent);
}
?>