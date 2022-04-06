<?php
class Registered_Passenger extends User{
   private $username;
   private $password;
   private $account_type;
   private $passenger_type;
   private $NIC;
   private $first_name;
   private $last_name;
   private $dob;
   private $passport_number;
   private $category;
   private $state;
   private $telephone_numbers;

    // public function setUsername($username){$this->username=$username;}
    // public function setPassword($password){$this->password=$password;}
    // public function setAccount_type($account_type){$this->account_type=$account_type;}
    public function setPassenger_type($passenger_type){$this->passenger_type=$passenger_type;}
    public function setNIC($NIC){$this->NIC=$NIC;}
    public function setFirst_name($first_name){$this->first_name=$first_name;}
    public function setLast_name($laststname){$this->last_name=$laststname;}
    public function setDob($dob){$this->dob=$dob;}
    public function setPassport_number($passport_number){$this->passport_number=$passport_number;}
    public function setCategory($category){$this->category=$category;}
    public function setState($state){$this->state=$state;}
    public function setTelephone_numbers($telephone_numbers){$this->telephone_numbers=$telephone_numbers;}

    // public function getUsername(){return $this->username;}
    // public function getPassword(){return $this->password;}
    // public function getAccount_type(){return $this->account_type;}
    public function getPassenger_type(){return $this->passenger_type;}
    public function getNIC(){return $this->NIC;}
    public function getFirst_name(){return $this->first_name;}
    public function getLast_name(){return $this->last_name;}
    public function getDob(){return $this->dob;}
    public function getPassport_number(){return $this->passport_number;}
    public function getCategory(){return $this->category;}
    public function getState(){return $this->state;}
    public function getTelephone_numbers(){return $this->telephone_numbers;}

}
