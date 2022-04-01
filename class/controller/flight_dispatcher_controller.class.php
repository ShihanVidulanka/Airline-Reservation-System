<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Flight_Dispatcher_Controller extends Flight_Dispatcher_Model{
    
    public function getCurrentDate(){
        date_default_timezone_set('Asia/Colombo');
        $date = date('y-m-d');
        return $date;
    }

    public function getCurrentTime(){
        date_default_timezone_set('Asia/Colombo');
        $time = date('H:i:s');
        return $time;
    }

    public function getFlightDetails(){
        $date = $this->getCurrentDate();
        $time = $this->getCurrentTime();
        $details = $this->getFlightsFromGivenDateAndTime($_SESSION['airport_code'], $date, $time);
        return $details;
    }

    public function getDestinations(){
        $date = $this->getCurrentDate();
        $time = $this->getCurrentTime();
        $details = $this->getDestinationsFromGivenDateAndTime($_SESSION['airport_code'], $date, $time);
        return $details;
    }


}
