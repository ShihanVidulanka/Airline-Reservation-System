<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Airport_Model extends Dbh{
    public function getAllAirports(){
        $pdo = $this->connect();
        $query = "SELECT airport_code,name,country FROM airport";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $details = $stmt->fetchAll();
        return $details;
    }
}