<?php

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";

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
        if (empty($airport_details))
            return true;
        else
            return false;
    }

    public function validateAirportCode($airport_code)
    {
        if (strlen($airport_code) != 3)
            return 'Length of Airport Code should be 3';
        elseif (preg_match('~[0-9]+~', $airport_code))
            return 'Remove Numbers in the Airport Code';
        elseif (preg_match('/[a-z]/', $airport_code))
            return 'No Lowercase Letters should be included in Airport Code';
        else
            return 'SUCCESS';
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

    public function validateAddNewFlight($tail_no, $destination, $economy_price, $platinum_price, $business_price, $departure_date_time_string, $arrival_date_time_string)
    {
        $origin_code = $_SESSION['airport_code'];
        $destination_code = $this->getAirportCode($destination);
        $airplane_id = $this->getAirplaneID($tail_no);
        $departure_date = date('Y-m-d', strtotime($departure_date_time_string));
        $departure_time = (new DateTime($departure_date_time_string))->format('H:i:s');

        $flight_time = $this->getFlightTime($departure_date_time_string, $arrival_date_time_string);
        echo $flight_time;
        
        if (is_numeric($economy_price) == false || $economy_price < 0) {
            echo 'inside';
            $error = 'Invalid Economy Seat Price';
        } elseif (is_numeric($platinum_price) == false || $platinum_price < 0) {
            echo 'inside';
            $error = 'Invalid Economy Seat Price';
        } elseif (is_numeric($business_price) == false || $business_price < 0) {
            echo 'inside';
            $error = 'Invalid Economy Seat Price';
        } elseif ($departure_date_time_string > $arrival_date_time_string) {
            echo 'tak';
            $error = 'Invalid Departure Date/Time and Arrival Date/Time';
        }
        elseif($flight_time<=0 || $flight_time>1440){
            echo 'time';
            $error = 'Invalid Flight T. :Flight T. should be less than 24hrs';
        }
    }



}
