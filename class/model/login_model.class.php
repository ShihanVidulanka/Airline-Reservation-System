<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Login_Model extends Dbh{

    //get the user details from the database and insert into the session variable.
    protected function getUser($username, $password){

        //check for the availability of username.
        $query = "SELECT * FROM user WHERE username=:username;";
        $result_set = $this->connect()->prepare($query);
        $result_set->bindParam(':username',$username);
        $result_set->execute();

        if (!$result_set) {
            echo $result_set;
            header("location: login.php?error=ConnectionFails1");
            exit();
        }

        if(!$result_set->rowCount()==1){
            header("location: login.php?error=UserNotFound1");
            exit();
        }

        //if user found  check for the password.
        $user = $result_set->fetch();
        print_array($user);
        $userType = $user['account_type'];
        $hashedPassword = $user['password'];
        $checkPassword = password_verify($password, $hashedPassword);

        if ($checkPassword == false) {
            header("location: login.php?error=WrongPassword");
            exit();
        }
        elseif ($checkPassword == true) {

            // When Password is verified get the user telephone numbers using  user id.
            $query2 =  "SELECT phone_no FROM telephone_no WHERE user_id =:ID";
            $result_set2 = $this->connect()->prepare($query2);
            $result_set2->bindParam(':ID',$user['ID']);
            $result_set2->execute();
            
            if (!($result_set2) ) {
                header("location: login.php?error=ConnectionFail2");
                exit();
            }
            $array_Tp_no = array();
            while ($user_tp = $result_set2->fetch()) {
                array_push($array_Tp_no, $user_tp['phone_no']);
            }

            //get the special details of user according to the user type.
            switch ($userType) {
                case '0':
                    $user_details = $user;
                    $_SESSION["ID"] = $user["ID"];
                    $_SESSION["username"] = $user["username"];
                    $_SESSION["account_type"] = $user["account_type"];
                    $_SESSION["TP_no"] = $array_Tp_no;
                    // header("location: airline_administrator_home.php");
                    return $userType;
                    break;

                case '1':
                    $query3 = "SELECT * FROM operations_agent WHERE user_id =:ID";
                    break;

                case '2':
                    $query3 = "SELECT * FROM flight_dispatcher WHERE user_id=:ID";
                    break;

                case '3':            
                    $query3 = "SELECT * FROM registered_passenger WHERE user_id=:ID";
                    break;
                default:
                    header("location: login.php?error=UserNotFound2");
                    break;
            }

            $result_set3 = $this->connect()->prepare($query3);
            $result_set3->bindParam(':ID',$user['ID']);
            $result_set3->execute();
            if (!$result_set3) {
                header("location: login.php?error=ConnectionFail3");
                exit();
            }

            if(!$result_set3->rowCount()==1){
                header("location: login.php?error=UserNotFound3");
                exit();
            }

            $user_details = $result_set3->fetch();

            //all user details added to the session variable according to the user type.
            session_start();
            $_SESSION["ID"] = $user["ID"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["account_type"] = $user["account_type"];
            $_SESSION["first_name"] = $user_details["first_name"];
            $_SESSION["last_name"] = $user_details["last_name"];

            $_SESSION["TP_no"] = $array_Tp_no;

            switch ($userType) {

                case '1':
                    $_SESSION["state"] = $user_details["state"];
                    $_SESSION["airport_code"] = $user_details["airport_code"];
                    break;

                case '2':
                    $_SESSION["airport_code"] = $user_details["airport_code"];
                    break;

                case '3':            
                    $_SESSION["NIC"] = $user_details["NIC"];
                    $_SESSION["dob"] = $user_details["dob"];
                    $_SESSION["passport_number"] = $user_details["passport_number"];
                    $_SESSION["category"] = $user_details["category"];
                    $_SESSION["state"] = $user_details["state"];
                    $_SESSION["passenger_id"] = $user_details["passenger_id"];
                    break;
                default:
                    header("location: login.php?error=UserNotFound4");
                    break;
            }
            return $userType;   //return the user type if user found.
        }
        return -1;  //else return -1.
    }
}

?>