<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Operation_Agent_Controller extends Operation_Agent_Model{


    function getPassenger_details()
    {
        $passenger_details=$this->getPassenger_details();
        return $passenger_details;
    }
    

}
?>