<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Flight_Dispatcher{

    // private $account_no;
    private $user_id;
    private $username;
    private $name;
    private $airport_code;
    private $telephone_nos; //needs to be array

    public function __construct($user_id, $username, $name, $airport_code, $telephone_nos)
    {
        // $this->setAccountNo($account_no);
        $this->setUsername($username);
        $this->setUserId($user_id);
        $this->setName($name);
        $this->setAirportCode($airport_code);
        $this->setTelephoneNo($telephone_nos);
    }
    
    //getters
    // public function getAccountNo(){return $this->account_no;}
    public function getUserId(){return $this->user_id;}
    public function getUsername(){return $this->username;}
    public function getName(){return $this->name;}
    public function getAirportCode(){return $this->airport_code;}
    public function getTelephoneNo(){return $this->telephone_nos;}

    //setters
    // public function setAccountNo($account_no){$this->account_no=$account_no;}
    public function setUsername($username){$this->username=$username;}
    public function setUserId($user_id){$this->user_id=$user_id;}
    public function setName($name){return $this->name=$name;}
    public function setAirportCode($airport_code){return $this->airport_code=$airport_code;}
    public function setTelephoneNo($telephone_nos){return $this->telephone_nos=$telephone_nos;}


    
}


?>