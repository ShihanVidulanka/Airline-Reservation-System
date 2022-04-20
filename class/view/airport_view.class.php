<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Airport_View extends Airport_Model{
    public function getAirportsFromModel(){
        return $this->getAllAirports();
    }
}
// $av = new Airport_View();
// print_array($av->getAirportsFromModel());