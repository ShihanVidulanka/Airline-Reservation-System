<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Flight_Model extends Dbh{
    public function getFlightDetails(){
        $pdo = $this->connect();
        $query="SELECT * FROM flight WHERE state=0 ORDER BY departure_date,departure_time";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $details=$stmt->fetchAll();
        return $details;
    }

    public function getDestinations(){
        $pdo = $this->connect();
        $query="SELECT DISTINCT destination FROM flight WHERE state=0";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $details=$stmt->fetchAll();
        return $details;
    }                                                                                                                                                                                                                                                       
}

// $fm = new Flight_Model();
// print_array($fm->getFlightDetails());