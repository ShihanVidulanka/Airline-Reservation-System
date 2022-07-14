<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Passenger_Model extends Dbh{
    protected function getPassegerDetails($username){
        $pdo=$this->connect();
        $query1="SELECT * FROM  registered_passenger AS rp INNER JOIN user as u 
                ON rp.user_id=u.ID
                WHERE u.username=:username";
        $stmt1 = $pdo->prepare($query1);
        $stmt1->execute(
            array(
                ":username"=>$username
            )
            );
        $details_1 = $stmt1->fetch();

        $user_id = $details_1['ID'];
        $passenger_id=$details_1['passenger_id'];

        $query2="SELECT phone_no FROM telephone_no WHERE user_id=:user_id";
        $stmt2 = $pdo->prepare($query2);
        $stmt2->execute(
            array(
                ':user_id'=>$user_id
            )
        );
        $telephone_numbers_array=$stmt2->fetchAll();
        $telephone_numbers = array();
        foreach ($telephone_numbers_array as $value) {
            $telephone_numbers[] = $value['phone_no'];
        }
        $details_2=array(
            'phone_no'=>$telephone_numbers
        );
        
        $query3 = "SELECT passenger_type FROM passenger WHERE passenger_id=:passenger_id";
        $stmt3 = $pdo->prepare($query3);
        $stmt3->execute(
            array(
                ':passenger_id'=>$passenger_id
            )
            );
        $details_3=$stmt3->fetch();

        $details = array_merge($details_1,$details_2,$details_3);
        return $details;
    }
    
}

// $passenger_model = new Passenger_Model();
// $details=$passenger_model->getPassegerDetails('harindubandara');
// print_array($details);