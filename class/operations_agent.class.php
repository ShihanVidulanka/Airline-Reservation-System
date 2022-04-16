<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Operations_Agent{
    private $user_name;
    private $user_id;
    private $first_name;
    private $last_name;
    private $state;
    private $airport_code;
    private $telephone_nos;

    public function __construct($user_name,$user_id,$first_name,$last_name,$state,$airport_code,$telephone_nos)
    {
        $this->setUser_name($user_name);
        $this->setUser_id($user_id);
        $this->setFirst_name($first_name);
        $this->setLast_name($last_name);
        $this->setState($state);
        $this->setAirport_code($airport_code);
        $this->setTelephone_nos($telephone_nos);
        
    }
    //getters
    public function getUser_id(){return $this->user_id;}
    public function getUser_name(){return $this->user_name;}
    public function getState(){return $this->state;}
    public function getAirport_code(){return $this->airport_code;}
    public function getFirst_name(){return $this->first_name;}
    public function getLast_name(){return $this->last_name;}
    public function getTelephone_nos(){return $this->telephone_nos;}

    //setters

    public function setUser_id($user_id){$this->user_id = $user_id;return $this;}
    public function setState($state){$this->state = $state;return $this;}
    public function setAirport_code($airport_code){$this->airport_code = $airport_code;return $this;}
    public function setUser_name($user_name){$this->user_name = $user_name;return $this;}
    public function setLast_name($last_name){$this->last_name = $last_name;return $this;}    
    public function setFirst_name($first_name){$this->first_name = $first_name;return $this;}
    public function setTelephone_nos($telephone_nos){$this->telephone_nos = $telephone_nos;return $this;}

}
?>