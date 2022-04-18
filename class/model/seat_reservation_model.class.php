<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";

class Seat_Reservation_Model extends Dbh{
    public function addNewPlane($details){

        $query1 = "INSERT INTO airplane(
                    tail_no,
                    model,
                    no_platinum_seats,
                    no_economy_seats,
                    no_business_seats,
                    in_service,
                    image,
                    file_type
        ) VALUES(
                    ':tail_no',
                    ':model',
                    ':no_platinum_seats',
                    ':no_economy_seats',
                    ':no_business_seats',
                    ':in_service',
                    ':image',
                    ':file_type'
        )";
        
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