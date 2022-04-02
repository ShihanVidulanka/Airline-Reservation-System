<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Operations_Agent{
    private $user_id;
    private $username;
    private $first_name;
    private $last_name;
    private $state;
    private $airport_code;
    private $telephone_nos; // array

    public function __construct($username, $first_name,  $last_name, $state, $airport_code, $telephone_nos) {
    
    }

    // getters
    public function getUserId(){return $this->user_id;}
    public function getUsername(){return $this->username;}
    public function getFirstName(){return $this->first_name;}
    public function getLastName(){return $this->last_name;}
    public function getState(){return $this->state;}
    public function getAirportCode(){return $this->airport_code;}
    public function getTelephoneNo(){return $this->telephone_nos;}

    //setters
    public function setUsername($username){$this->username=$username;}
    public function setUserId($user_id){$this->user_id=$user_id;}
    public function setFirstName($first_name){$this->first_name=$first_name;}
    public function setLastName($last_name){$this->last_name=$last_name;}
    public function setState($state){$this->state = $state;}
    public function setAirportCode($airport_code){$this->airport_code=$airport_code;}
    public function setTelephoneNo($telephone_nos){$this->telephone_nos=$telephone_nos;}
}
?>