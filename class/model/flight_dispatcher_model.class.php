<?php

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";

class Flight_Dispatcher_Model extends Dbh
{

    protected function getAirportName($airport_code)
    {
        $query = "SELECT name FROM airport WHERE airport_code='{$airport_code}'";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $airport_name = $stmt->fetch(PDO::FETCH_ASSOC)['name'];
        return $airport_name;
    }

    protected function getDispatcherNo($userID)
    {
        $query = "SELECT account_no FROM flight_dispatcher WHERE user_id={$userID}";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $account_no = $stmt->fetch(PDO::FETCH_ASSOC)['account_no'];
        return $account_no;
    }

    //Get details of flights from a given origin,date and a time 
    protected function getOutgoingFlightsFromGivenDateAndTime($airport_code, $date, $time)
    {
        $query = "SELECT flight.id, airplane.tail_no, flight.origin, flight.destination, flight.economy_price, flight.business_price, 
            flight.platinum_price, flight.departure_date, flight.departure_time, flight.flight_time FROM flight JOIN 
            airplane where airplane.ID=flight.airplane_id AND state=0 AND origin='{$airport_code}' AND ( departure_date>'{$date}' 
            OR (departure_date='{$date}' AND departure_time>'{$time}')) ORDER BY departure_date, departure_time";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $details;
    }

    //Get details of flights from a given destination,date and a time 
    protected function getIncomingFlightsFromGivenDateAndTime($airport_code, $date, $time)
    {
        $query = "SELECT flight.id, airplane.tail_no, flight.origin, flight.destination, flight.economy_price, flight.business_price, 
            flight.platinum_price, flight.departure_date, flight.departure_time, flight.flight_time FROM flight JOIN airplane 
            where airplane.ID=flight.airplane_id AND state=0 AND destination='{$airport_code}' AND ( departure_date>'{$date}' OR 
            (departure_date='{$date}' AND departure_time>'{$time}')) ORDER BY departure_date, departure_time";
        // echo $query;
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $details;
    }

    //get list of destinations from a given origin,date and a time 
    protected function getDestinationsFromGivenDateAndTime($airport_code, $date, $time)
    {
        $query = "SELECT DISTINCT destination FROM flight JOIN airplane where airplane.ID=flight.airplane_id AND state=0 AND origin='{$airport_code}' AND ( departure_date>'{$date}' OR (departure_date='{$date}' AND departure_time>'{$time}')) order by origin";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $details;
    }

    //get list of destinations from a given origin,date and a time 
    protected function getOriginsFromGivenDateAndTime($airport_code, $date, $time)
    {
        $query = "SELECT DISTINCT origin FROM flight JOIN airplane where airplane.ID=flight.airplane_id AND state=0 AND destination='{$airport_code}' AND ( departure_date>'{$date}' OR (departure_date='{$date}' AND departure_time>'{$time}')) order by destination";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $details;
    }

    //duplicate of below function
    //get details of flights from a given origin,destination, date and a time 
    protected function getOutgoingFlightsFromDestination($origin, $destination, $date, $time)
    {
        $query = "SELECT flight.id, airplane.tail_no, flight.origin, flight.destination, flight.economy_price, flight.business_price, 
            flight.platinum_price, flight.departure_date, flight.departure_time, flight.flight_time
            FROM flight JOIN airplane where airplane.ID=flight.airplane_id AND state=0 AND destination='{$destination}' 
            AND origin='{$origin}' AND ( departure_date>'{$date}' OR (departure_date='{$date}' AND departure_time>'{$time}'))";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $details;
    }

    //get details of flights from a given origin,destination, date and a time 
    protected function getIncomingFlightsFromDestination($origin, $destination, $date, $time)
    {
        $query = "SELECT flight.id, airplane.tail_no, flight.origin, flight.destination, flight.economy_price, flight.business_price, 
            flight.platinum_price, flight.departure_date, flight.departure_time, flight.flight_time
            FROM flight JOIN airplane where airplane.ID=flight.airplane_id AND flight.state=0 AND 
            flight.destination='{$destination}' AND flight.origin='{$origin}' AND ( flight.departure_date>'{$date}' OR 
            (flight.departure_date='{$date}' AND flight.departure_time>'{$time}'))";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $details;
    }

    //cancel a specific flight by ID
    protected function cancelFlightFromModel($flight_id)
    {
        $query = "UPDATE flight SET flight.state = 1 WHERE flight.id = {$flight_id}";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
    }

    //Confirm arrival of a flight by ID
    protected function confirmArrivalFromModel($flight_id)
    {
        $query = "UPDATE flight SET flight.state = 2 WHERE flight.id = {$flight_id}";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
    }

    //return aiport details usning airport code
    protected function getAirportDetailsFromModel($airport_code)
    {
        $query = "SELECT * FROM airport where airport_code='{$airport_code}'";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $details;
    }

    //add new row to Flight table using Airport Code
    protected function addFlightFromModel($airport_code, $airport_name, $country, $province, $city)
    {
        $query = "INSERT INTO airport(airport_code, name, city, province, country) VALUES ('{$airport_code}', '{$airport_name}', '{$country}', '{$province}', '{$city}' ) ";
        echo $query;
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
    }

    //get all the tail nos of available airplanes
    protected function getTailNosFromModel()
    {
        $query = "SELECT tail_no FROM airplane WHERE in_service=0;";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $tail_nos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $tail_nos;
    }

    //get all the destinations except origin
    protected function getDestinationsFromModel($origin)
    {
        $query = "SELECT name FROM airport WHERE airport_code!='{$origin}' order by name;";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $tail_nos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $tail_nos;
    }

    //get a Airplane if by tail_no
    protected function getAirplaneIDFromModel($tail_no)
    {
        $query = "SELECT id FROM airplane WHERE tail_no='{$tail_no}'";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];
        return $id;
    }

    //get Airport code by airport name
    protected function getAirportCodeFromModel($name)
    {
        $query = "SELECT airport_code FROM airport WHERE name='{$name}'";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $code = $stmt->fetch(PDO::FETCH_ASSOC)['airport_code'];
        return $code;
    }

    //get free planes on given time period from given airport which are already assigned to flights 
    protected function getFreeplanesFromModel($arr){
        $query = "SELECT flight.id, flight.origin, flight.destination, flight.airplane_id, flight.departure_date, flight.departure_time, flight.flight_time, flight.state, airplane.id, airplane.tail_no, airplane.model, airplane.no_platinum_seats, airplane.no_economy_seats, airplane.no_business_seats, airplane.in_service, 
        DATE_ADD(CONCAT_WS(' ', flight.departure_date,flight.departure_time),INTERVAL flight.flight_time MINUTE)AS arrival_time FROM flight LEFT OUTER JOIN airplane ON flight.airplane_id= airplane.id WHERE 
        DATE_ADD(CONCAT_WS(' ', flight.departure_date,flight.departure_time), INTERVAL flight.flight_time MINUTE)<'{$arr['departure_datetime']}' AND destination='{$arr['airport']}' AND state = 2 AND airplane_id NOT IN (SELECT airplane_id FROM flight where departure_time>='{$arr['departure_time']}'
        AND departure_date >= '{$arr['departure_date']}' AND origin = '{$arr['airport']}')";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $available_plane_details = $stmt->fetchALL(PDO::FETCH_ASSOC);
        // print_array($available_plane_details);
        return $available_plane_details;
    } 

    // get planes which are not assign to flights(Indonesian Airport)
    protected function getNewPlanesFromModel(){
        $query = "SELECT airplane.tail_no, airplane.no_platinum_seats, airplane.no_economy_seats, airplane.no_business_seats FROM airplane WHERE airplane.id NOT IN (SELECT DISTINCT airplane_id FROM flight  WHERE state = 0 OR state = 2)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $new_planes = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $new_planes;
    }
    
    //insert the new flight into database
    protected function addNewFlightFromModel($origin, $destination, $airplane_id, $business_price, $economy_price, $platinum_price, $departure_time, $departure_date, $flight_time, $state){
        $query = "INSERT INTO flight(origin, destination, airplane_id, business_price, economy_price, platinum_price, departure_time, departure_date, flight_time, state) VALUES
        ('{$origin}', '{$destination}', '{$airplane_id}', '{$business_price}', '{$economy_price}', '{$platinum_price}', '{$departure_time}', '{$departure_date}', '{$flight_time}', '{$state}')";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
    }

}
