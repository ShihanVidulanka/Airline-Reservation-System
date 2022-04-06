<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Operation_Agent_Model extends Dbh{
    function getPassenger_details(){
        $query="SELECT passenger_id from passenger";
        $stmt=$this->connect()->prepare($query);
        $stmt->execute();
        $passenger_id=$stmt->fetch(PDO::FETCH_ASSOC)['passenger_id'];
        return $passenger_id;
    }

    protected function getOperationAgentNo($userID){
        $query = "SELECT account_no FROM operations_agent WHERE user_id={$userID}";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $account_no = $stmt->fetch(PDO::FETCH_ASSOC)['account_no'];
        return $account_no;
    }
   
    protected function getAirportName($airport_code){
        $query = "SELECT name FROM airport WHERE airport_code='{$airport_code}'";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $airport_name = $stmt->fetch(PDO::FETCH_ASSOC)['name'];
        return $airport_name;
    }
    protected function getarrivedflightdetails($airport_code, $date, $time){
        //$query="SELECT id,origin,destination,departure_time,departure_date FROM flight WHERE origin='{$airport_code}'";
        $query = "SELECT flight.id, airplane.tail_no, flight.origin, flight.destination, flight.economy_price, flight.business_price, 
        flight.platinum_price, flight.departure_date, flight.departure_time, flight.flight_time
        FROM flight JOIN airplane where airplane.ID=flight.airplane_id AND state=0 AND destination='{$airport_code}' 
         AND ( departure_date<'{$date}' OR (departure_date='{$date}' AND departure_time<'{$time}'))";
        
        $stmt=$this->connect()->prepare($query);
        $stmt->execute();
        $flight_details=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $flight_details;
    }
    protected function getdepartureflightdetails($airport_code,$date,$time){
        //$query="SELECT id,origin,destination,departure_time,departure_date FROM flight WHERE destination='{$airport_code}' AND state!=1 ORDER BY departure_time,departure_date";
        $query = "SELECT flight.id, airplane.tail_no, flight.origin, flight.destination, flight.economy_price, flight.business_price, 
        flight.platinum_price, flight.departure_date, flight.departure_time, flight.flight_time
        FROM flight JOIN airplane where airplane.ID=flight.airplane_id AND state=0 AND origin='{$airport_code}' 
         AND ( departure_date>'{$date}' OR (departure_date='{$date}' AND departure_time>'{$time}'))";
        
        $stmt=$this->connect()->prepare($query);
        $stmt->execute();
        $flight_details=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $flight_details;

    }

}
?>