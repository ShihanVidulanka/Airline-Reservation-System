<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";


class Flight_Model extends Dbh{
    protected function getFlightDetails($destination=null){
        $pdo = $this->connect();

        date_default_timezone_set("Asia/Colombo");
        $date = Date("Y-m-d");
        $time = date("H:i:s");
//        echo $date;
        if(is_null($destination)||strcmp($destination,'all')==0){
            $query="SELECT * FROM flight WHERE state=0 AND 
                           (departure_date>'".$date."' OR (departure_date='".$date."'"." AND departure_time>"."'".$time."'))"." 
                           ORDER BY departure_date,departure_time";

        // $query = "SELECT * FROM flight 
        //             WHERE state=0
        //             AND id NOT IN (SELECT flight_id FROM booking WHERE passenger_id=:passenger_id)
        //             ORDER BY departure_date,departure_time";

        $stmt = $pdo->prepare($query);
        $stmt->execute(
                // array(
                //     ':passenger_id'=> $_SESSION['passenger_id'] 
                // )
        );
        }else{
            $query="SELECT * FROM flight WHERE state=0 AND 
                           (departure_date>'".$date."' OR (departure_date='".$date."'"." AND departure_time>"."'".$time."'))"." 
                           AND destination=:destination ORDER BY departure_date,departure_time ";
            // $query = "SELECT * FROM flight
            //             WHERE state=0 AND destination=:destination
            //             AND id NOT IN (SELECT flight_id FROM booking WHERE passenger_id=:passenger_id)
            //             ORDER BY departure_date,departure_time";

            // $query="SELECT 
            //         DISTINCT(flight.id),
            //         flight.origin,
            //         flight.destination,
            //         flight.airplane_id,
            //         flight.business_price,
            //         flight.economy_price,
            //         flight.platinum_price,
            //         flight.departure_time,
            //         flight.flight_time,flight.state,
            //         booking.id,		
            //         booking.passenger_id,	
            //         booking.booking_time,	
            //         booking.ticket_price,	
            //         booking.seat_no,	
            //         booking.seat_type,	
            //         booking.state	
            //         FROM `flight` LEFT JOIN booking 
            //         ON flight.id=booking.flight_id 
            //         WHERE flight.state=0 AND flight.destination=:destination
            //         AND (booking.passenger_id!=:passenger_id OR booking.passenger_id IS NULL) 
            //         ORDER BY departure_date,departure_time;";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':destination'=>$destination
                    // ':passenger_id'=> $_SESSION['passenger_id']                   
                )
            );
        }
        
        $details=$stmt->fetchAll();
        return $details;
    }
    protected function getFlightDetailsByFlightId($flight_id){
        $pdo = $this->connect();
        $query = "SELECT * FROM flight where id=:flight_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(
            array(
                ':flight_id'=>$flight_id
            )
            );
        $result = $stmt->fetch();
        $flight = new Flight();
        $flight->setId($result['id']);
        $flight->setOrigin($result['origin']);
        $flight->setDestination($result['destination']);
        $flight->setAirplane_id($result['airplane_id']);
        $flight->setBusiness_price($result['business_price']);
        $flight->setEconomy_price($result['economy_price']);
        $flight->setPlatinum_price($result['platinum_price']);
        $flight->setDeparture_time($result['departure_time']);
        $flight->setFlight_time($result['flight_time']);
        $flight->setState($result['state']);
        return $flight;
    }
                                                                                                                                                                                                                                                     
}

// $fm = new Flight_Model();
// print_array($fm->getFlightDetails(''));