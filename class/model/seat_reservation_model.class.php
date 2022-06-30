<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
class Seat_Reservation_Model extends Dbh{

    public function checkForBookedSeat($flight_id,$passenger_id){
        $pdo = $this->connect();
        $query="SELECT * FROM booking WHERE flight_id=:flight_id AND passenger_id=:passenger_id AND state=0";
        $stmt=$pdo->prepare($query);
        $stmt->execute(
                array(
                    ':flight_id'=>$flight_id,
                    ':passenger_id'=>$passenger_id
                )
                );
        $rows=$stmt->rowCount();
        if($rows>0){
            return true;
        }else{
            return false;
        }
    }
    public function reserveSeat(Booking $booking){
        $pdo = $this->connect();
       $query = "INSERT INTO booking(
                    flight_id,
                    passenger_id,
                    ticket_price,
                    seat_no,
                    seat_type,
                    state
                ) VALUES(
                    :flight_id,
                    :passenger_id,
                    :ticket_price,
                    :seat_no,
                    :seat_type,
                    :state
                ) ";
        $stmt = $pdo->prepare($query);
        $stmt->execute(
            array(
                ':flight_id'=>$booking->getFlight_id(),
                ':passenger_id'=>$booking->getPassenger_id(),
                ':ticket_price'=>$booking->getTicket_price(),
                ':seat_no'=>$booking->getSeat_no(),
                ':seat_type'=>$booking->getSeat_type(),
                ':state'=>$booking->getState(),
            )
            );
            header('Location:../passenger_flight_booking.php?error=success');
        
        
    }
    public function getPlaneDetails($id){
        $pdo = $this->connect();
        $query = "SELECT * FROM airplane INNER JOIN flight 
                    ON flight.airplane_id=airplane.id
                    WHERE flight.id=:id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(
                array(
                    ':id'=>$id
                )
            );
        $result = $stmt->fetch();
        return $result;
    }

    public function getReservedSeats($flight_id){
        $pdo = $this->connect();
        $query = "SELECT * FROM booking WHERE flight_id=:flight_id AND state=0";
        $stmt = $pdo->prepare($query);
        $stmt->execute(
            array(
                ':flight_id'=>$flight_id
            )
        );
        $results = $stmt->fetchAll();
        $reserved=array();
        foreach ($results as $record) {
            $reserved[]=$record['seat_no'];
        }
        return $reserved;
    }
    public function getBookedFlightDestinations($passenger_id){
        $pdo = $this->connect();
        $query = "SELECT af.id, af.airport_code,af.name,af.country, b.passenger_id,b.state
                    FROM booking AS b INNER JOIN 
                    (SELECT f.id, a.airport_code,a.name,a.country FROM airport AS a INNER JOIN flight AS f ON a.airport_code = f.destination) 
                    AS af ON af.id = b.flight_id 
                    WHERE passenger_id=:passenger_id AND b.state=0";
        $stmt = $pdo->prepare($query);
        $stmt->execute(
            array(
                ':passenger_id'=>$passenger_id
            )
            );
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getBookedFlightDetails($passenger_id){
        $pdo = $this->connect();
        $query="SELECT CONCAT(a.tail_no,'-',a.model) AS airplane,bf.* 
                    FROM airplane AS a 
                    INNER JOIN 
                    (SELECT b.passenger_id, f.origin, f.destination, b.seat_type, b.state, b.ticket_price, f.airplane_id, f.departure_time, f.departure_date 
                    FROM booking as b INNER JOIN flight as f ON b.flight_id = f.id WHERE b.state=0 AND b.passenger_id=:passenger_id) 
                    as bf ON a.id = bf.airplane_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(
            array(
                ':passenger_id'=>$passenger_id
            )
            );
        $results=$stmt->fetchAll();
        return $results;
    }
}

// $a = new Seat_Reservation_Model();
// print_array($a->getPlaneDetails(1));