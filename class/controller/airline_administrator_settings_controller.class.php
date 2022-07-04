<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";

require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";
class Airline_Administrator_Settings_Controller extends Airline_Administrator_Settings_Model{
    public function getRegularPassengerDetails()
    {
        return $this->getRegularPassengerDetailsFromModel();
    }
    public function setRegularPassengerDetails($booking_count,$discount)
    {
        return $this->setRegularPassengerDetailsFromModel($booking_count,$discount);
    }
}
