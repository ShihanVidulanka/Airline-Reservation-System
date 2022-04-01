<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";
class Check_Username_Model extends Dbh{
    public function check_username($username){
        $db=$this->connect();
        $query = "SELECT COUNT(ID) FROM user WHERE username=:username";
        $stmt=$db->prepare($query);
        $stmt->execute(
            array(':username'=>$username)
        );
        $count=$stmt->fetch()['COUNT(ID)'];
        if($count!=0){
            echo "Username already used";
        }
    }
}
// $sum=new Check_Username_Model();
// $sum->check_username("ashensiva");