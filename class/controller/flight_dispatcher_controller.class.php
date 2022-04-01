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

    public function getFlightDetailsFromDestination($destination){
        $date = $this->getCurrentDate();
        $time = $this->getCurrentTime();
        $details = $this->getFlightsFromDestination($_SESSION['airport_code'], $destination, $date, $time);
        return $details;
    }

    public function cancelFlight($flight_id){
        $this->cancelFlightFromModel($flight_id);
        return;
    }

    public function getAirportDetails($airport_code){
        return $this->getAirportDetailsFromModel($airport_code);
    }

    public function checkDuplicateAirports($airport_code){
        $airport_details = $this->getAirportDetails($airport_code);
        if (empty($airport_details))
            return true;
        else
            return false;
    }

    public function validateAirportCode($airport_code){
        if (strlen($airport_code)!=3)
            return 'Length of Airport Code should be 3';
        elseif(preg_match('~[0-9]+~', $airport_code))
            return 'Remove Numbers in the Airport Code';
        elseif(preg_match('/[a-z]/', $airport_code))
            return 'No Lowercase Letters should be included in Airport Code';
        else
            return 'SUCCESS';
    }

    public function addAirport($airport_code, $airport_name, $country, $province, $city){
        $this->addFlightFromModel($airport_code, $airport_name, $country, $province, $city);
        return;
    }


}
