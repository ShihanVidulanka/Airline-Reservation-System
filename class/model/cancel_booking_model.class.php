<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";

class Cancel_Booking_Model extends Dbh{

    public function cancel_booking_from_model($booking_id){
        $seat_reservation_controller = new Seat_Reservation_Controller();
        $pdo = $this->connect();
        $query = "UPDATE booking SET state=1 WHERE id=:id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(
            array(
                ":id"=>$booking_id
            )
        );

        if($this->getNumberofBookingsFromModel()){
            $this->removeRegularCustomer();
            return "general";
        }
        return "";

    }
    public function getNumberofBookingsFromModel(){
        $pdo = $this->connect();
        $username = $_SESSION['username'];
        $query = "SELECT * FROM booking as b INNER JOIN 
                    (SELECT * FROM registered_passenger INNER JOIN user ON registered_passenger.user_id = user.ID) as p 
                        ON b.passenger_id = p.passenger_id 
                    WHERE b.state=3 AND p.username=:username";
        $stmt= $pdo->prepare($query);
        $stmt->execute(
            array(
                ":username"=>$username
            )
        );
        $rows=$stmt->rowCount();
        if($rows+1==2){
            return true;
        }else{
            return false;
        }
    }
    private function removeRegularCustomer(){
        $passenger_id = $_SESSION['passenger_id'];
        $pdo = $this->connect();
        $query = "UPDATE registered_passenger SET category=:category where passenger_id=:passenger_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(
            array(
                ":category"=>0,
                ":passenger_id"=>$passenger_id
            )
        );
    }
}