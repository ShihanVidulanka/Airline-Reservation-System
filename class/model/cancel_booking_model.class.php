<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";

class Cancel_Booking_Model extends Dbh{

    public function cancel_booking_from_model($booking_id){

        $pdo = $this->connect();
        $query = "UPDATE booking SET state=1 WHERE id=:id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(
            array(
                ":id"=>$booking_id
            )
        );

    }
}