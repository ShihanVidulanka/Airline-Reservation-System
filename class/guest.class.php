<?php
class Guest{

    private $guest_no;
    private $first_name;
    private $last_name;
    private $dob;
    private $passport_number;
    private $phone_no;
    private $is_deleted;
    private $created_date_time;
    private $passenger_id;
    private $email;


    public function getGuest_no(){return $this->guest_no;}
    public function getFirst_name(){return $this->first_name;}
    public function getLast_name(){return $this->last_name;}
    public function getDob(){return $this->dob;}
    public function getPassport_number(){return $this->passport_number;}
    public function getPhone_no(){return $this->phone_no;}
    public function getIs_deleted(){return $this->is_deleted;}
    public function getCreated_date_time(){return $this->created_date_time;}
    public function getPassenger_id(){return $this->passenger_id;}
    public function getEmail(){return $this->email;}

    
    public function setGuest_no($guest_no){$this->guest_no = $guest_no;return $this;}
    public function setFirst_name($first_name){$this->first_name = $first_name;return $this;}
    public function setLast_name($last_name){$this->last_name = $last_name;return $this;}
    public function setDob($dob){$this->dob = $dob;return $this;}
    public function setPassport_number($passport_number){$this->passport_number = $passport_number;return $this;}
    public function setPhone_no($phone_no){$this->phone_no = $phone_no;return $this;}
    public function setIs_deleted($is_deleted){$this->is_deleted = $is_deleted;return $this;}
    public function setCreated_date_time($created_date_time) {$this->created_date_time = $created_date_time;return $this;}
    public function setPassenger_id($passenger_id){$this->passenger_id = $passenger_id;return $this;}
    public function setEmail($email){$this->email = $email;return $this;}

    
}
