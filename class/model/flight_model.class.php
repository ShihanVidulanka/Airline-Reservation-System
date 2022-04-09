<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Flight_Model extends Dbh{
    public function getFlightDetails($destination=null){
        $pdo = $this->connect();
        if(is_null($destination)){
            $query="SELECT * FROM flight WHERE state=0 ORDER BY departure_date,departure_time";
            $stmt = $pdo->prepare($query);
        $stmt->execute();
        }else{
            $query="SELECT * FROM flight WHERE state=0 AND destination=:destination ORDER BY departure_date,departure_time" ;
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':destination'=>$destination
                )
            );
        }
        
        $details=$stmt->fetchAll();
        return $details;
    }
                                                                                                                                                                                                                                                     
}

// $fm = new Flight_Model();
// print_array($fm->getFlightDetails());