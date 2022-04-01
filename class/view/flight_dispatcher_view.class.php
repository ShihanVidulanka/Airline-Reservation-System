<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Flight_Dispatcher_View extends Flight_Dispatcher_Model{

    private $flight_dispatcher;
    private $flight_dispatcher_controller;

    public function __construct()
    {
        $this->flight_dispatcher= new Flight_Dispatcher($_SESSION['ID'], $_SESSION['username'], $_SESSION['name'], $_SESSION['airport_code'], $_SESSION["TP_no"]);
    
        $this->flight_dispatcher_controller= new Flight_Dispatcher_Controller();
    }

    public function getHomeDetails(){
        $details = array(
            "ID" => $this->getDispatcherNo($this->flight_dispatcher->getUserId()),
            "name" => $this->flight_dispatcher->getName(),
            "username" => $this->flight_dispatcher->getUsername(),
            "airport_name" => $this->getAirportName($this->flight_dispatcher->getAirportCode()),
            "telephone_numbers" => $this->formatTelephoneNos($this->flight_dispatcher->getTelephoneNo())
        );
        return $details;
    }

    public function formatTelephoneNos($telephoneNosArray){
        $string=implode("<br>",$telephoneNosArray);
        return $string;
    }

    public function getFlightDetails(){
        $flight_details = $this->flight_dispatcher_controller->getFlightDetails();
        return $flight_details;
    }

    public function getDestinations(){
        $destinations = $this->flight_dispatcher_controller->getDestinations();
        return $destinations;
    }


}

?>