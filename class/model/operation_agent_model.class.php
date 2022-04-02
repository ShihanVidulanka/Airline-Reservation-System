<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Operation_Agent_Model extends Dbh{
    function getPassenger_details(){
        $query="SELECT passenger_id from passenger";
        $stmt=$this->connect()->prepare($query);
        $stmt->execute();
        $passenger_id=$stmt->fetch(PDO::FETCH_ASSOC)['passenger_id'];
        return $passenger_id;
    }

    protected function getOperationAgentNo($userID){
        $query = "SELECT account_no FROM operations_agent WHERE user_id={$userID}";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $account_no = $stmt->fetch(PDO::FETCH_ASSOC)['account_no'];
        return $account_no;
    }
   
    protected function getAirportName($airport_code){
        $query = "SELECT name FROM airport WHERE airport_code='{$airport_code}'";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $airport_name = $stmt->fetch(PDO::FETCH_ASSOC)['name'];
        return $airport_name;
    }

}
?>