<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";
class SignUp_Controller extends Signup_Model{

    private $errors;

    public function __construct(){
        $this->errors = array();
    }
    public function createRegisteredPassengerFromModel(Registered_Passenger $registeredPassenger){
        // $this->validateDetails($registeredPassenger);
        print_array($this->errors);
        if(empty($this->errors)){
            $details = array(
                'username'=>remove_unnessaries($registeredPassenger->getUsername()),
                'hashed_password'=>encryptPassword(remove_unnessaries($registeredPassenger->getPassword(),1)),
                'account_type'=>$registeredPassenger->getAccount_type(),
                'passenger_type'=>$registeredPassenger->getPassenger_type(),
                // 'NIC'=>remove_unnessaries($registeredPassenger->getNIC()),
                'first_name'=>remove_unnessaries($registeredPassenger->getFirst_name()),
                'last_name'=>remove_unnessaries($registeredPassenger->getLast_name()),
                'dob'=>$registeredPassenger->getDob(),
                'passport_number'=>remove_unnessaries($registeredPassenger->getPassport_number()),
                'category'=>$registeredPassenger->getCategory(),
                'is_deleted'=>$registeredPassenger->getIs_deleted(),
                'telephone_numbers'=>$registeredPassenger->getTelephone_numbers(),
                'email'=>remove_unnessaries($registeredPassenger->getEmail())
            );
            $this->createRegisteredPassenger($details);
         }else{
            $_SESSION['errors'] = $this->errors;
            header("location: ../sign_up.php?error=signup_error");
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
        if(!$this->validateUsername($rp->getUsername())){
            $this->errors[] =  $rp->getUsername().'- Invalid Username!';
        }
        if(!$this->validatePassword($rp->getPassword())){
            $this->errors[] = "Invalid Password!";
        }
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

    //username validation
    private function validateUsername($username){
        return preg_match('/^([\w\W\d]+){1,}$/',$username);
    }

    //password validation
    private function validatePassword($password){
        return preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/',$password);
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


// $signup_ctrl = new SignUp_Controller();
// $registered_passenger = new Registered_Passenger();

// $registered_passenger->setUsername('');
// $registered_passenger->setFirst_name('fdfdf fdf');
// $registered_passenger->setLast_name('df343 ');
// $registered_passenger->setDob("2023-03-26");
// $registered_passenger->setPassword('123');
// $registered_passenger->setPassport_number('565');
// $registered_passenger->setEmail('yhes');

// $signup_ctrl->createRegisteredPassengerFromModel($registered_passenger);
