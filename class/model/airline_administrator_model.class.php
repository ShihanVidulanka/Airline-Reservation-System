<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

// This class is for creating a new flight dispatcher and operations agent used by airline administrator
class Airline_Administrator_Model extends Dbh{
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

    public function createAccount($details, $type){
        try {
            $db = $this->connect();
            $db->beginTransaction();

            $query1 = "INSERT INTO user(username, password, email, account_type) VALUES(:username, :password, :email, :account_type)";
            $statement1 = $db->prepare($query1);
            $statement1->execute(array(
                ':username'=>$details['username'],
                ':password'=>$details['hashed_password'],
                ':email'=>$details['email'],
                ':account_type'=>$details['account_type']
            ));
            $user_id = $db->lastInsertId();
            // echo $user_id."<BR>";
            $statement1->closeCursor();

            if ($type == 1) {
                $query2 = "INSERT INTO operations_agent(user_id, first_name, last_name, airport_code) VALUES(:user_id, :first_name, :last_name, :airport_code)";
            
                $statement2 = $db->prepare($query2);
                $statement2->execute(array(
                    ':user_id'=>$user_id,
                    ':first_name'=>$details['first_name'],
                    ':last_name'=>$details['last_name'],
                    ':airport_code'=>$details['airport_code']
                ));
                $statement2->closeCursor();
            } else {
                $query2 = "INSERT INTO flight_dispatcher(user_id, first_name, last_name, airport_code) VALUES(:user_id, :first_name, :last_name, :airport_code)";
            
                $statement2 = $db->prepare($query2);
                $statement2->execute(array(
                    ':user_id'=>$user_id,
                    ':first_name'=>$details['first_name'],
                    ':last_name'=>$details['last_name'],
                    ':airport_code'=>$details['airport_code']
                ));
                $statement2->closeCursor();
            }
            
            $query3 = "INSERT INTO telephone_no(user_id, phone_no) VALUES(:user_id, :phone_no)";
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

    //get airplane details using tail_no or return null if empty
    public function getAirplaneDetailsFromModel($tail_no){
        $query = "SELECT * FROM airplane WHERE tail_no='{$tail_no}'";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $details;
    }
    
    //add new row to airplane table
    public function addNewAirplaneFromModel($tail_no, $model, $no_platinum_seats, $no_economy_seats, $no_business_seats, $image, $file_type)
    {
        $query = "INSERT INTO airplane(tail_no, model, no_platinum_seats, no_economy_seats, no_business_seats, in_service, image, file_type)
             VALUES ( :tail_no, :model, :no_platinum_seats, :no_economy_seats, :no_business_seats, :in_service, :image, :file_type)";
        $stmt = $this->connect()->prepare($query);
        $in_service = 0;
        $stmt->bindParam(':tail_no', $tail_no, PDO::PARAM_STR, 20);
        $stmt->bindParam(':model', $model, PDO::PARAM_STR, 20);
        $stmt->bindParam(':no_platinum_seats', $no_platinum_seats, PDO::PARAM_INT, 3);
        $stmt->bindParam(':no_economy_seats', $no_economy_seats, PDO::PARAM_INT, 3);
        $stmt->bindParam(':no_business_seats', $no_business_seats, PDO::PARAM_INT, 3);
        $stmt->bindParam(':in_service', $in_service, PDO::PARAM_INT, 1);
        $stmt->bindParam(':image', $image, PDO::PARAM_LOB);
        $stmt->bindParam(':file_type', $file_type, PDO::PARAM_STR, 255);

        if ($stmt->execute()) {

            echo " Data with Photo is added ";
        } else {
            echo " Not able to add data please contact Admin ";
            print_r($stmt->errorInfo());
        }
    }
}
// $airline_administrator_model = new Airline_Administrator_Model();
// $details = array(
//     'username'=>'osuracaldera',
//     'email'=>'osuracaldera2009@gmail.com',
//     'hashed_password'=>encryptPassword('abcd'),  // Question
//     'account_type'=>2,
//     'first_name'=>'Osura',
//     'last_name'=>'Thenuka',
//     'airport_code'=>'BIA',
//     'telephone_numbers'=>array('0718949089','0714629179')
// );
// $airline_administrator_model->createAccount($details, 2);
?>


