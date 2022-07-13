<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";

class Guest_Model extends Dbh
{
    public function getGuestDetails($guestno)
    {
        $pdo = $this->connect();
        $query1 = "SELECT * FROM  guest
                WHERE guest.guest_no=:guestno";
        $stmt1 = $pdo->prepare($query1);
        $stmt1->execute(
            array(
                ":guestno" => $guestno
            )
        );
        $details = $stmt1->fetch();
        return $details;
    }

    protected function createGuest($details)
    {
        try {
            $db = $this->connect();
            $db->beginTransaction();

            $query1  = "INSERT INTO passenger(passenger_type)
                            VALUES(:passenger_type)";
            $stmt1 = $db->prepare($query1);
            $stmt1->execute(array(
                ":passenger_type" => 1
            ));

            $passenger_id = $db->lastInsertId();
            $stmt1->closeCursor();

            $query2 = "INSERT INTO guest(
                                                    first_name,
                                                    last_name,
                                                    dob,
                                                    passport_number,
                                                    phone_no,
                                                    passenger_id,
                                                    email)
                                VALUES(
                                    :first_name,
                                    :last_name,
                                    :dob,
                                    :passport_number,
                                    :phone_no,
                                    :passenger_id,
                                    :email)";
            //echo $passenger_id."<br>";
            $stmt2 = $db->prepare($query2);
            $stmt2->execute(array(
                ':first_name' => $details['first_name'],
                ':last_name' => $details['last_name'],
                ':dob' => $details['dob'],
                ':passport_number' => $details['passport_number'],
                ':phone_no' => $details['phone_no'],
                ':passenger_id' => $passenger_id,
                ':email' => $details['email']
            ));
            $stmt2->closeCursor();
            $db->commit();
            $_SESSION["passenger_id"] = $passenger_id;
            $_SESSION["passenger_type"] = 1;
        } catch (PDOException $e) {
            $db->rollBack();
            die($e->getMessage());
        }
    }
    // protected function updateGuest($details)
    // {   
    //     try {
    //         $pdo = $this->connect();
    //         $query1 = "UPDATE guest SET first_name=':first_name',
    //                                 last_name=':last_name',
    //                                 dob=':dob',
    //                                 passport_number=':passport_number',
    //                                 phone_no=':phone_no',
    //                             WHERE passenger_id=':passenger_id'";
    //         $stmt1 = $pdo->prepare($query1);
    //         $stmt1->execute(
    //             array(
    //                 ':first_name' => $details['first_name'],
    //                 ':last_name' => $details['last_name'],
    //                 ':dob' => $details['dob'],
    //                 ':passport_number' => $details['passport_number'],
    //                 ':phone_no' => $details['phone_no'],
    //                 ':passenger_id' => $details['passenger_id']
    //             )
    //         );
    //         return true;
    //     }catch (PDOException $e) {
    //         return false;
    //     }
    // }
    // protected function deleteGuest($passenger_id)
    // {
    //     try {
    //         $db = $this->connect();
    //         $db->beginTransaction();
    //         $query1 = "DELETE FROM booking WHERE passenger_id = :passenger_id ";
    //         $stmt1 = $db->prepare($query1);
    //         $stmt1->execute(array(':passenger_id' => $passenger_id));
    //         $stmt1->closeCursor();

    //         $query2 = "DELETE FROM guest WHERE passenger_id = :passenger_id ";
    //         $stmt2 = $db->prepare($query2);
    //         $stmt2->execute(array(':passenger_id' => $passenger_id));
    //         $stmt2->closeCursor();

    //         $query3 = "DELETE FROM passenger WHERE passenger_id = :passenger_id ";
    //         $stmt3 = $db->prepare($query3);
    //         $stmt3->execute(array(':passenger_id' => $passenger_id));
    //         $stmt3->closeCursor();
    //         $db->commit();
    //         return true;
    //     } catch (PDOException $e) {
    //         $db->rollBack();
    //         die($e->getMessage());
    //     }
    // }
}
