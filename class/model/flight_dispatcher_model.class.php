<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Flight_Dispatcher_Model extends Dbh{

    protected function getAirportName($airport_code){
        $query = "SELECT name FROM airport WHERE airport_code='{$airport_code}'";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $airport_name = $stmt->fetch(PDO::FETCH_ASSOC)['name'];
        return $airport_name;
    }

    protected function getDispatcherNo($userID){
        $query = "SELECT account_no FROM flight_dispatcher WHERE user_id={$userID}";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $account_no = $stmt->fetch(PDO::FETCH_ASSOC)['account_no'];
        return $account_no;
    }

    //Get details of flights from a given origin,date and a time 
    protected function getFlightsFromGivenDateAndTime($airport_code, $date, $time){
        $query = "SELECT * FROM flight JOIN airplane where airplane.ID=flight.airplane_id AND state=0 AND origin='{$airport_code}' AND ( departure_date>'{$date}' OR (departure_date='{$date}' AND departure_time>'{$time}'))";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $details;
    }

    //get list of destinations from a given origin,date and a time 
    protected function getDestinationsFromGivenDateAndTime($airport_code, $date, $time){
        $query = "SELECT DISTINCT destination FROM flight JOIN airplane where airplane.ID=flight.airplane_id AND state=0 AND origin='{$airport_code}' AND ( departure_date>'{$date}' OR (departure_date='{$date}' AND departure_time>'{$time}')) order by destination";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $details;
    }

    //get details of flights from a given origin,destination, date and a time 
    protected function getFlightsFromDestination($origin, $destination, $date, $time){
        $query = "SELECT * FROM flight JOIN airplane where airplane.ID=flight.airplane_id AND state=0 AND destination='{$destination}' AND origin='{$origin}' AND ( departure_date>'{$date}' OR (departure_date='{$date}' AND departure_time>'{$time}'))";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $details;
    }

    //cancel a specific flight by ID
    protected function cancelFlightFromModel($flight_id){
        $query = "UPDATE flight SET flight.state = 1 WHERE flight.id = {$flight_id}";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
    }
}

?>