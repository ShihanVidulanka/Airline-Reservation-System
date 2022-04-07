<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Passenger_View extends Passenger_Model{
    public function getRegisteredPassenger($username){
        $details =  $this->getPassegerDetails($username);
        if($details['is_deleted']==0){
            $registered_passenger = new Registered_Passenger();
            
            $registered_passenger->setFirst_name($details['first_name']);
            $registered_passenger->setLast_name($details['last_name']);
            $registered_passenger->setDob($details['dob']);
            $registered_passenger->setPassport_number($details['passport_number']);
            $registered_passenger->setCategory($details['category']);
            $registered_passenger->setIs_deleted($details['is_deleted']);
            $registered_passenger->setId($details['ID']);
            $registered_passenger->setUsername($details['username']);
            $registered_passenger->setPassword($details['password']);
            $registered_passenger->setEmail($details['email']);
            $registered_passenger->setAccount_type($details['account_type']);
            $registered_passenger->setTelephone_numbers($details['phone_no']);
            $registered_passenger->setPassenger_type($details['passenger_type']);
            return $registered_passenger;
        }else{
            return "error";
        }
    }
}

// $pc = new Passenger_View();
// $rp=$pc->getRegisteredPassenger('HarshaniBandara');
// print_array($rp);