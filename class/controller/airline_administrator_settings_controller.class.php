<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";

require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";
class Airline_Administrator_Settings_Controller extends Airline_Administrator_Settings_Model{
    public function getSettingsDetails()
    {
        return $this->getSettingsFromModel();
    }
    public function setRegularPassengerDetails($booking_count,$discount,$url)
    {
        return $this->setSettingsFromModel($booking_count,$discount,$url);
    }
}
