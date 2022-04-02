<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

if(isset($_POST['username_'])){
    $create_operations_agent_controller = new CreateOperationsAgent_Ccontroller;
    $create_opereations_agent_controller->checkUsernameFromModel($_POST['username_']);
}

if(isset($_POST['submit'])){
    $_POST['telephone_numbers']=rtrim($_POST['telephone_numbers'],',');
    $_POST['telephone_numbers']=explode(",",$_POST['telephone_numbers']);

    $create_operations_agent_controller = new CreateOperationsAgent_Ccontroller();
    // $operations_agent = new Operations_Agent();
    // Then set everything with ($_POST['everyrthing])

    // $create_operations_agent_controller->createOperationsAgentFromModel($operations_agent);
}
?>