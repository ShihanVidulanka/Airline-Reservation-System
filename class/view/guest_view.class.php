<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Guest_view extends Guest_Model{
    public function getGuest($username){
        $details =  $this->getGuestDetails($username);
        if($details['is_deleted']==0){
            $guest = new Guest();
            
            $guest->setFirst_name($details['first_name']);
            $guest->setLast_name($details['last_name']);
            $guest->setDob($details['dob']);
            $guest->setPassport_number($details['passport_number']);
            $guest->getPhone_no($details['phone_no']);
            $guest->setIs_deleted($details['is_deleted']);
            $guest->getCreated_date_time($details['created_date_time']);
            $guest->getPassenger_id($details['passenger_id']);
            return $guest;
        }else{
            return "error";
        }
    }
}