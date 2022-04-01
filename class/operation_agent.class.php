<?php
//shni//
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

 class Operation_Agent{

    private $account_no;
    private $user_name;
    private $user_id;
    private $name;
    private $state;
    private $airport_code;


    public function __construct($account_no,$user_name,$user_id,$name,$state,$airport_code)
    {
        $this->setAccount_no($account_no);
        $this->setUser_id($user_name);
        $this->setUser_id($user_id);
        $this->setName($name);
        $this->setState($state);
        $this->setAirport_code($airport_code);
        
        
    }
    //getters
    public function getUser_id()
    {
        return $this->user_id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getAccount_no()
    {
        return $this->account_no;
    }
    public function getState()
    {
        return $this->state;
    }
    public function getAirport_code()
    {
        return $this->airport_code;
    }
    public function getUser_name()
    {
        return $this->user_name;
    }



    //setters

    public function setAccount_no($account_no)
    {
        $this->account_no = $account_no;

        return $this;
    }
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }
    public function setAirport_code($airport_code)
    {
        $this->airport_code = $airport_code;

        return $this;
    }

    /**
     * Get the value of user_name
     */ 
    
    /**
     * Set the value of user_name
     *
     * @return  self
     */ 
    public function setUser_name($user_name)
    {
        $this->user_name = $user_name;

        return $this;
    }
 }


?>