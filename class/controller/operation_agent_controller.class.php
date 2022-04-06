<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Operation_Agent_Controller extends Operation_Agent_Model{


    function getPassenger_details()
    {
        $passenger_details=$this->getPassenger_details();
        return $passenger_details;
    }

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

    public function arrivedFlightDetails()
    {
        $date = $this->getCurrentDate();
        $time = $this->getCurrentTime();
        $details = $this->getarrivedflightdetails($_SESSION['airport_code'], $date, $time);
        return $details;
    }

    public function departureFlightDetails(){
        $date = $this->getCurrentDate();
        $time = $this->getCurrentTime();
        $details = $this->getdepartureflightdetails($_SESSION['airport_code'], $date, $time);
        return $details;
    }

    

}
?>