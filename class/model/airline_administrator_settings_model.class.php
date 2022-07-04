<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";
class Airline_Administrator_Settings_Model extends Dbh{
    protected function getRegularPassengerDetailsFromModel(){
        $query = "SELECT * FROM regular_customer_settings WHERE id=1";
        $record= $this->connect()->query($query);
        $result = $record->fetch();
        return $result;
    }
    protected function setRegularPassengerDetailsFromModel($booking_count,$discount){
        $query = "UPDATE regular_customer_settings SET
                    booking_count=:booking_count, discount=:discount WHERE id=1";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(
            array(
                ":booking_count"=>$booking_count,
                ":discount"=>$discount
            )
        );
    }
}