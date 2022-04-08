<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Operation_Agent_Model extends Dbh{
    function getPassengers_details($flight_id){
        $query = "SELECT flight_id,booking.passenger_id,booking.booking_time,registered_passenger.first_name,registered_passenger.last_name,
        registered_passenger.passport_number,registered_passenger.dob
        FROM booking JOIN registered_passenger where booking.passenger_id=registered_passenger.passenger_id  AND flight_id='{$flight_id}'";
        
        $stmt=$this->connect()->prepare($query);
        
        $stmt->execute();
        $passenger_details=$stmt->fetchAll(PDO::FETCH_ASSOC);
        // echo $passenger_details;
        return $passenger_details;
    }
    function remove_passenger($id){
        $query="UPDATE booking set state=1 where passenger_id=$id";
        $stmt=$this->connect()->prepare($query);
        $stmt->execute();
        
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