<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
class Seat_Reservation_Model extends Dbh{

    public function checkForBookedSeat($flight_id,$passenger_id){
        $pdo = $this->connect();
        $query="SELECT * FROM booking WHERE flight_id=:flight_id AND passenger_id=:passenger_id";
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
        $query = "SELECT * FROM booking WHERE flight_id=:flight_id";
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
}

// $a = new Seat_Reservation_Model();
// print_array($a->getPlaneDetails(1));