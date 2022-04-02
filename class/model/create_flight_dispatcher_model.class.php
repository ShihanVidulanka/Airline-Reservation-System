<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

// This class is for creating a new flight dispatcher used by airline administrator
class CreateFlightDispatcher_Model extends Dbh{
    protected function check_username($username){
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

    protected function createFlightDispatcher($details){
        try {
            $db = $this->connect();
            $db->beginTransaction();

            $query1 = "INSERT INTO user(username, password, account_type) VALUES(:username, :password, :account_type)";
            $statement1 = $db->prepare($query1);
            $statement1->execute(array(
                ':username'=>$details['username'],
                ':password'=>$details['hashed_password'],
                ':account_type'=>$details['account_type']
            ));
            $user_id = $db->lastInsertId();
            // echo $user_id."<BR>";
            $statement1->closeCursor();

            $query2 = "INSERT INTO flight_dispatcher(user_id, first_name, last_name, airport_code) VALUES(:user_id, :first_name, :last_name, :airport_code)";
            
            $statement2 = $db->prepare($query2);
            $statement2->execute(array(
                ':user_id'=>$user_id,
                ':first_name'=>$details['first_name'],
                ':last_name'=>$details['last_name'],
                ':airport_code'=>$details['airport_code']
            ));
            $statement2->closeCursor();

            $query3 = "INSERT INTO telephone_no(user_id, phone_no) VALUES(:user_id, :telephone_no)";
            foreach ($details['telephone_numbers'] as $telephone_number){
                $statement3 = $db->prepare($query3);
                $statement3->execute(array(
                    ':user_id'=>$user_id,
                    ':phone_no'=>$telephone_number
                ));
                $statement3->closeCursor();
            }
            $db->commit();
        } catch (PDOException $e) {
            $db->rollBack();
            die($e->getMessage());
        }
    }
}

class CreateOperartionsAgent_Model extends Dbh{
    protected function check_username($username){
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

    protected function createOperationsAgent($details){
        try {
            $db = $this->connect();
            $db->beginTransaction();

            $query1 = "INSERT INTO user(username, password, account_type) VALUES(:username, :password, :account_type)";
            $statement1 = $db->prepare($query1);
            $statement1->execute(array(
                ':username'=>$details['username'],
                ':password'=>$details['hashed_password'],
                ':account_type'=>$details['account_type']
            ));
            $user_id = $db->lastInsertId();
            $statement1->closeCursor();

            $query2 = "INSERT INTO operations_agent(user_id, first_name, last_name, state, airport_code) VALUES(:user_id, :first_name, :last_name, :state, :airport_code)";
            $statement2 = $db->prepare($query2);
            $statement2->execute(array(
                ':user_id'=>$user_id,
                ':first_name'=>$details['first_name'],
                ':last_name'=>$details['last_name'],
                ':state'=>$details['state'],
                ':airport_code'=>$details['airport_code']
            ));
            $statement2->closeCursor();

            $query3 = "INSERT INTO telephone_no(user_id, phone_no) VALUES(:user_id, :telephone_no)";
            foreach ($details['telephone_numbers'] as $telephone_number){
                $statement3 = $db->prepare($query3);
                $statement3->execute(array(
                    ':user_id'=>$user_id,
                    ':phone_no'=>$telephone_number
                ));
                $statement3->closeCursor();
            }
            $db->commit();
        } catch (PDOException $e) {
            $db->rollBack();
            die($e->getMessage());
        }
    }
}
?>