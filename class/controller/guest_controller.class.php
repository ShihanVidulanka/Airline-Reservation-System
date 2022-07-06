<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";
class Guest_Controller extends Guest_Model{

    private $errors;

    public function __construct(){
        $this->errors = array();
    }
    public function createGuestFromModel(Guest $guest){
        $this->validateDetails($guest);
        // print_array($this->errors);
        if(empty($this->errors)){
            $details = array(
                'first_name'=>remove_unnessaries($guest->getFirst_name()),
                'last_name'=>remove_unnessaries($guest->getLast_name()),
                'dob'=>$guest->getDob(),
                'passport_number'=>remove_unnessaries($guest->getPassport_number()),
                'phone_no'=>$guest->getPhone_no()
            );
            $passenger_id = $this->createGuest($details);
        }else{
            $_SESSION['errors'] = $this->errors;
        }
    }
    // public function updateGuestFromModel(Guest $guest){
    //     $this->validateDetails($guest);
    //     // print_array($this->errors);
    //     if(empty($this->errors)){
    //         $details = array(
    //             'first_name'=>remove_unnessaries($guest->getFirst_name()),
    //             'last_name'=>remove_unnessaries($guest->getLast_name()),
    //             'dob'=>$guest->getDob(),
    //             'passport_number'=>remove_unnessaries($guest->getPassport_number()),
    //             'phone_no'=>$guest->getPhone_no(),
    //             'passenger_id'=>$_SESSION['passenger_id']
    //         );
    //         $result = $this->updateGuest($details);
    //         if ($result) {
    //             header("location: ../guest_flight_booking.php?error=successfull");
    //         }else{
    //             header("location: ../guest_flight_booking.php?error=notsuccessfull");
    //         }
    //     }else{
    //         $_SESSION['errors'] = $this->errors;
    //     }
    // }

    // Public function deleteGuestFromModel($passenger_id){
    //     if($this->deleteGuest($passenger_id)){
    //         session_destroy();
    //         header("location: ../guest_flight_booking.php");
    //     }
    //     $this->errors[] = "Cancel Cannot be done!";
    //     $_SESSION['errors'] = $this->errors;
    // }

    //validate details
    private function validateDetails(Guest $rp){
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
}