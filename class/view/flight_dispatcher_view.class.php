<?php

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";

class Flight_Dispatcher_View extends Flight_Dispatcher_Model
{

    private $flight_dispatcher;
    private $flight_dispatcher_controller;

    public function __construct()
    {
        $this->flight_dispatcher = new Flight_Dispatcher($_SESSION['ID'], $_SESSION['username'], $_SESSION['first_name'], $_SESSION['last_name'], $_SESSION['airport_code'], $_SESSION["TP_no"]);

        $this->flight_dispatcher_controller = new Flight_Dispatcher_Controller();
    }

    public function getHomeDetails()
    {
        $details = array(
            "ID" => $this->getDispatcherNo($this->flight_dispatcher->getUserId()),
            "first_name" => $this->flight_dispatcher->getFirstName(),
            "last_name" => $this->flight_dispatcher->getLastName(),
            "username" => $this->flight_dispatcher->getUsername(),
            "airport_name" => $this->getAirportName($this->flight_dispatcher->getAirportCode()),
            "telephone_numbers" => $this->formatTelephoneNos($this->flight_dispatcher->getTelephoneNo())
        );
        return $details;
    }

    public function formatTelephoneNos($telephoneNosArray)
    {
        $string = implode("<br>", $telephoneNosArray);
        return $string;
    }

    public function getFlightDetails($show)
    {
        if ($show == 'none') {
            $flight_details = $this->flight_dispatcher_controller->getFlightDetails();
        } else {
            $flight_details = $this->flight_dispatcher_controller->getFlightDetailsFromDestination($show);
        }
        return $flight_details;
    }

    public function getDestinations()
    {
        $destinations = $this->flight_dispatcher_controller->getDestinations();
        return $destinations;
    }

    public function showError($error)
    {
        if ($error == 'SUCCESS'){
            echo '<div class="alert alert-success" role="alert">';
            echo "<p>Successfully Added</p>";
            echo '</div>';
        } 
        else{
            echo '<div class="alert alert-danger" role="alert">';
            echo "<p>{$error}</p>";
            echo '</div>';
        } 
    }

    public function getTailNos(){
        return $this->getTailNosFromModel();
    }

    public function getDestinationsWithoutOrigin($origin){
        return $this->getDestinationsFromModel($origin);
    }
}
