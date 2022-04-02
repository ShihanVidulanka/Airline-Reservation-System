<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";
class SignUp_Controller extends Signup_Model{
    public function createRegisteredPassengerFromModel(Registered_Passenger $registeredPassenger){
        $details = array(
            'username'=>remove_unnessaries($registeredPassenger->getUsername()),
            'hashed_password'=>remove_unnessaries($registeredPassenger->getPassword(),1),
            'account_type'=>$registeredPassenger->getAccount_type(),
            'passenger_type'=>$registeredPassenger->getPassenger_type(),
            'NIC'=>remove_unnessaries($registeredPassenger->getNIC()),
            'first_name'=>remove_unnessaries($registeredPassenger->getFirst_name()),
            'last_name'=>remove_unnessaries($registeredPassenger->getLast_name()),
            'dob'=>$registeredPassenger->getDob(),
            'passport_number'=>remove_unnessaries($registeredPassenger->getPassport_number()),
            'category'=>$registeredPassenger->getCategory(),
            'state'=>$registeredPassenger->getState(),
            'telephone_numbers'=>$registeredPassenger->getTelephone_numbers()
        );
        $this->createRegisteredPassenger($details);
    }
    public function checkUsernameFromModel($username){
        $this->check_username(remove_unnessaries($username,1));
    }
}