<?php

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";

class Flight_Dispatcher_Controller extends Flight_Dispatcher_Model
{

    public function getCurrentDate()
    {
        date_default_timezone_set('Asia/Colombo');
        $date = date('y-m-d');
        return $date;
    }

    public function getCurrentTime()
    {
        date_default_timezone_set('Asia/Colombo');
        $time = date('H:i:s');
        return $time;
    }

    public function getOutgoingFlightDetails()
    {
        $date = $this->getCurrentDate();
        $time = $this->getCurrentTime();
        $details = $this->getOutgoingFlightsFromGivenDateAndTime($_SESSION['airport_code'], $date, $time);
        return $details;
    }

    public function getIncomingFlightDetails(){
        $date = $this->getCurrentDate();
        $time = $this->getCurrentTime();
        $details = $this->getIncomingFlightsFromGivenDateAndTime($_SESSION['airport_code'], $date, $time);
        return $details;
    }

    public function getDestinations()
    {
        $date = $this->getCurrentDate();
        $time = $this->getCurrentTime();
        $details = $this->getDestinationsFromGivenDateAndTime($_SESSION['airport_code'], $date, $time);
        return $details;
    }

    public function getOrigins()
    {
        $date = $this->getCurrentDate();
        $time = $this->getCurrentTime();
        $details = $this->getOriginsFromGivenDateAndTime($_SESSION['airport_code'], $date, $time);
        return $details;
    }

    public function getOutgoingFlightDetailsFromDestination($destination)
    {
        $date = $this->getCurrentDate();
        $time = $this->getCurrentTime();
        $details = $this->getOutgoingFlightsFromDestination($_SESSION['airport_code'], $destination, $date, $time);
        return $details;
    }

    public function getIncomingFlightDetailsFromDestination($origin)
    {
        $date = $this->getCurrentDate();
        $time = $this->getCurrentTime();
        $details = $this->getIncomingFlightsFromDestination($origin, $_SESSION['airport_code'], $date, $time);
        return $details;
    }

    public function cancelFlight($flight_id)
    {
        $this->cancelFlightFromModel($flight_id);
        return;
    }

    public function confirmArrival($flight_id){
        $this->confirmArrivalFromModel($flight_id);
        return;
    }

    public function getAirportDetails($airport_code)
    {
        return $this->getAirportDetailsFromModel($airport_code);
    }

    public function checkDuplicateAirports($airport_code)
    {
        $airport_details = $this->getAirportDetails($airport_code);
        if (!empty($airport_details))
            return 'error';
    }

    public function addAirport($airport_code, $airport_name, $country, $province, $city)
    {
        $this->addFlightFromModel($airport_code, $airport_name, $country, $province, $city);
        return;
    }

    public function getAirplaneID($tail_no)
    {
        return $this->getAirplaneIDFromModel($tail_no);
    }

    public function getAirportCode($name)
    {
        return $this->getAirportCodeFromModel($name);
    }

    public function getFlightTime($departure_date_time_string, $arrival_date_time_string)
    {
        date_default_timezone_set('Asia/Colombo');
        $departure_date_time = new DateTime($departure_date_time_string);
        $arrival_date_time = new DateTime($arrival_date_time_string);

        $interval = $departure_date_time->diff($arrival_date_time);
        $minutes = $interval->days * 24 * 60;
        $minutes += $interval->h * 60;
        $minutes += $interval->i;
        // echo $minutes;
        return $minutes;
    }

    public function addNewFlight($tail_no, $destination, $economy_price, $platinum_price, $business_price, $departure_date_time_string, $arrival_date_time_string)
    {
        $origin_code = $_SESSION['airport_code'];
        $destination_code = $this->getAirportCode($destination);
        $airplane_id = $this->getAirplaneID($tail_no);
        $departure_date = date('Y-m-d', strtotime($departure_date_time_string));
        $departure_time = (new DateTime($departure_date_time_string))->format('H:i:s');

        $flight_time = $this->getFlightTime($departure_date_time_string, $arrival_date_time_string);
        
        // echo "<br>".$departure_date;
        // echo "<br>".$departure_time;
        // echo "<br>".$flight_time;
        //$id, $origin, $destination, $airplane_id, $business_price, $economy_price, $platinum_price, $departure_time, $departure_date, $flight_time, $state
        $this->addNewFlightFromModel($origin_code, $destination_code, $airplane_id, $business_price, $economy_price, $platinum_price, $departure_time, $departure_date, $flight_time, 0);
        
    }

    public function getFreeAriplanes($airport, $departure_date_time, $departure_date, $departure_time)
    {
        $arr= array("departure_datetime"=>$departure_date_time, "airport"=>$airport ,"departure_date"=>$departure_date, "departure_time"=>$departure_time);
        // print_array($this->getFreeplanesFromModel($arr));
        return $this->getFreeplanesFromModel($arr);
    }

    public function getNewAirplanes(){
        return $this->getNewPlanesFromModel();
    }

}
