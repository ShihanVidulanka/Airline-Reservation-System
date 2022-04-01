<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class SignUp_Model extends Dbh{
    protected function createRegisteredPassenger($details){
        try {
            $db = $this->connect();
            $db->beginTransaction();

            $query1 = "INSERT INTO user(username,password,account_type)
                        VALUES(:username,:password,:account_type)";
            $stmt = $db->prepare($query1);
            $stmt->execute(array(
                                ':username'=>$details['username'],
                                ':password'=>$details['hashed_password'],
                                ':account_type'=>$details['account_type']
            ));
            $user_id = $db->lastInsertId();
            echo $user_id."<BR>";
            $stmt->closeCursor();

            $query2  = "INSERT INTO passenger(passenger_type)
                            VALUES(:passenger_type)
            ";
            $stmt2 = $db->prepare($query2);
            $stmt2->execute(array(
                        ":passenger_type"=>$details['passenger_type']));
    
            $passenger_id=$db->lastInsertId();
            $stmt2->closeCursor();

            $query3 = "INSERT INTO registered_passenger(
                                                    user_id,
                                                    NIC,
                                                    name,
                                                    age,
                                                    passport_number,
                                                    category,
                                                    state,
                                                    passenger_id)
                                    VALUES(
                                        :user_id,
                                        :NIC,
                                        :name,
                                        :age,
                                         :passport_number,
                                         :category,
                                         :state,
                                         :passenger_id)";
            echo $passenger_id."<br>";
            // $stmt3 = $db->prepare($query3);
            $stmt3 = $db->prepare($query3);
            $stmt3->execute(array(
                ':user_id'=>$user_id,
                ':NIC'=>$details['NIC'],
                ':name'=>$details['name'],
                ':age'=>$details['age'],
                ':passport_number'=>$details['passport_number'],
                ':category'=>$details['category'],
                ':state'=>$details['state'],
                ':passenger_id'=>$passenger_id
            ));
            $stmt3->closeCursor();
            $db->commit();

        } catch (PDOException $e) {
            $db->rollBack();
            die($e->getMessage());
        }
        

    }
}
$SignUp_Model = new SignUp_Model();
$SignUp_Model->createRegisteredPassenger(
    array(
        'username'=>'sisirajayalath',
        'hashed_password'=>'abcd',
        'account_type'=>3,
        'passenger_type'=>0,
        'NIC'=>'972661180v',
        'name'=>'Sisira Jayalath',
        'age'=>25,
        'passport_number'=>'012345',
        'category'=>2,
        'state'=>0,
    )
);
