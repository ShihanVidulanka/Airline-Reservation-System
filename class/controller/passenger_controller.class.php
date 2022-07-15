<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Passenger_Controller extends Passenger_Model{
    private $errors;

    public function __construct(){
        $this->errors = array();
    }

    public function editPassengerDetails(Registered_Passenger $registeredPassenger)
    {
        $this->validateDetails($registeredPassenger);
        if(empty($this->errors)){
            $details = array(
                'account_type'=>$registeredPassenger->getAccount_type(),
                'passenger_type'=>$registeredPassenger->getPassenger_type(),
                'first_name'=>remove_unnessaries($registeredPassenger->getFirst_name()),
                'last_name'=>remove_unnessaries($registeredPassenger->getLast_name()),
                'dob'=>$registeredPassenger->getDob(),
                'passport_number'=>remove_unnessaries($registeredPassenger->getPassport_number()),
                'category'=>$registeredPassenger->getCategory(),
                'is_deleted'=>$registeredPassenger->getIs_deleted(),
                'telephone_numbers'=>$registeredPassenger->getTelephone_numbers(),
                'email'=>remove_unnessaries($registeredPassenger->getEmail())
            );
//            print_array($details);
            $this->editPassengerDetailsFromModel($details);
        }else{
            $_SESSION['errors'] = $this->errors;
            header("location: ../passenger_edit_details.php?error=edit_error");
        }
    }
    public function checkUsernameFromModel($username){
        $this->check_username(remove_unnessaries($username,1));
    }
    public function checkPassportNoFromModel($phone_no){
        $this->checkPassportNo(remove_unnessaries($phone_no));
    }

    //validate details
    private function validateDetails(Registered_Passenger $rp){


        if(!$this->validateName($rp->getFirst_name())){
            $this->errors[] = $rp->getFirst_name()."- Invalid First Name!";
        }
        if(!$this->validateName($rp->getLast_name())){
            $this->errors[] = $rp->getLast_name()."- Invalid Last Name!";
        }
        if(!$this->validateDob($rp->getDob())){
            $this->errors[] = $rp->getDob()."- Invalid Birthday!";
        }
        if(!$this->validatePassport_number($rp->getPassport_number())){
            $this->errors[] = $rp->getPassport_number()."- Invalid Passport Number!";
        }
        if(!$this->validateEmail($rp->getEmail())){
            $this->errors[] = $rp->getEmail()."- Invalid Email";
        }
    }
    //telephone number validation

    private function validateTelephoneNumber($tpno){
        return preg_match('/^[\+a-zA-Z0-9\-().\s]{10,15}$/',$tpno);
    }

    //name validation
    private function validateName($name){
        return preg_match("/^(([A-Z])|([a-z]))([a-z]+)$/",$name);
    }



    //passport number validation
    private function validatePassport_number($passport_number){
        return preg_match('/^[A-PR-WYa-pr-wy][1-9]\d\s?\d{4}[1-9]$/',$passport_number);
    }
    private function validateDob($date){
        $timezoneId = 'Asia/Jayapura';
        date_default_timezone_set($timezoneId);
        $today = date("Y-m-d");
        return $date<$today;
    }
    private function validateEmail($email){
        return preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',$email);
    }

}


