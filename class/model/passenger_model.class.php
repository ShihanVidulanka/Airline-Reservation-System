<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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

        $query2="SELECT phone_no FROM telephone_no WHERE user_id=:user_id AND is_deleted=0";
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
    private function getUser_idFromModel($username){
        $query = "SELECT ID FROM user WHERE username=:username";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(
            array(
                ':username'=>$username
            )
        );
        $result = $stmt->fetch();
        return $result['ID'];
    }
    protected function editPassengerDetailsFromModel($details)
    {
        $user_id = $this->getUser_idFromModel($_SESSION['username']);
            try {
                $db = $this->connect();
                $db->beginTransaction();

                $query1 = "UPDATE user SET email=:email WHERE ID=:user_id";
                $stmt = $db->prepare($query1);
                $stmt->execute(
                    array(
                    ':email'=>$details['email'],
                    ':user_id'=>$user_id
                    )
                );
                $stmt->closeCursor();


                $query2 = "UPDATE registered_passenger SET
                                                    first_name=:first_name,
                                                    last_name=:last_name,
                                                    dob=:dob,
                                                    passport_number=:passport_number
                                    WHERE user_id=:user_id
                                    ";

                // $stmt3 = $db->prepare($query3);
                $stmt2 = $db->prepare($query2);
                $stmt2->execute(array(
                    ':user_id'=>$user_id,
                    ':first_name'=>$details['first_name'],
                    ':last_name'=>$details['last_name'],
                    ':dob'=>$details['dob'],
                    ':passport_number'=>$details['passport_number'],
                ));
                $stmt2->closeCursor();

                $query3="UPDATE telephone_no SET is_deleted=1 WHERE user_id=:user_id";
                $stmt=$this->connect()->prepare($query3);
                $stmt->execute(
                    array(
                        ':user_id'=>$user_id
                    )
                );

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
                header("location: ../passenger_edit_details.php?error=edit_successful");

            } catch (PDOException $e) {
                $db->rollBack();
                die($e->getMessage());
                header("location: ../passenger_edit_details.php?error=edit_failed");
            }


    }
}

// $passenger_model = new Passenger_Model();
// $details=$passenger_model->getPassegerDetails('harindubandara');
// print_array($details);