<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class SignUp_Model extends Dbh{

    protected function check_username($username){
        $db=$this->connect();
        $query = "SELECT COUNT(ID) FROM user WHERE BINARY username=:username";
        $stmt=$db->prepare($query);
        $stmt->execute(
            array(':username'=>$username)
        );
        $count=$stmt->fetch()['COUNT(ID)'];
        if($count!=0){
            echo "error";
        }
    }

    protected function checkPassportNo($passport_number){
       
        $db=$this->connect();
        $query = "SELECT COUNT(account_no) FROM  registered_passenger WHERE BINARY passport_number=:passport_number";
        $stmt=$db->prepare($query);
        $stmt->execute(
            array(':passport_number'=>$passport_number)
        );
        $count=$stmt->fetch()['COUNT(account_no)'];
        if($count!=0){
            echo "error";
        }
    }
    protected function createRegisteredPassenger($details){
        try {
            $db = $this->connect();
            $db->beginTransaction();

            $query1 = "INSERT INTO user(username,password,email,account_type)
                        VALUES(:username,:password,:email,:account_type)";
            $stmt = $db->prepare($query1);
            $stmt->execute(array(
                                ':username'=>$details['username'],
                                ':password'=>$details['hashed_password'],
                                ':email'=>$details['email'],
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
                                                    first_name,
                                                    last_name,
                                                    dob,
                                                    passport_number,
                                                    category,
                                                    state,
                                                    passenger_id)
                                    VALUES(
                                         :user_id,
                                         :first_name,
                                         :last_name,
                                         :dob,
                                         :passport_number,
                                         :category,
                                         :state,
                                         :passenger_id)";
            echo $passenger_id."<br>";
            // $stmt3 = $db->prepare($query3);
            $stmt3 = $db->prepare($query3);
            $stmt3->execute(array(
                ':user_id'=>$user_id,
                ':first_name'=>$details['first_name'],
                ':last_name'=>$details['last_name'],
                ':dob'=>$details['dob'],
                ':passport_number'=>$details['passport_number'],
                ':category'=>$details['category'],
                ':state'=>$details['state'],
                ':passenger_id'=>$passenger_id
            ));
            $stmt3->closeCursor();

            $query4="INSERT INTO telephone_no(user_id,phone_no) VALUES(:user_id,:phone_no)";
            foreach ($details['telephone_numbers'] as  $tpno) {
                echo $tpno."<br>";
                $stmt4=$db->prepare($query4);
                $stmt4->execute(
                    array(
                        ':user_id'=>$user_id,
                        ':phone_no'=>$tpno)
                    );
                $stmt4->closeCursor();
            }
            $db->commit();

        } catch (PDOException $e) {
            $db->rollBack();
            die($e->getMessage());
        }
        

    }
}

