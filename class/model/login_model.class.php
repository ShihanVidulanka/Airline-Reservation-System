<?php 
include_once("./class/model/dbh.php");

class Login_Model extends Dbh{
    protected function getUser($username, $password){
        $query = "SELECT * FROM user WHERE username='{$username}';";
        $result_set = mysqli_query($this->connect(), $query);

        if (!$result_set) {
            //echo $result_set;
            header("location: login.php?error=ConnectionFails1");
            exit();
        }

        if (!mysqli_num_rows($result_set) == 1) {
            header("location: login.php?error=UserNotFound1");
            exit();
        }

        $user = mysqli_fetch_assoc($result_set);
        $userType = $user['account_type'];
        $hashedPassword = $user['password'];
        $checkPassword = password_verify($password, $hashedPassword);

        if ($checkPassword == false) {
            header("location: login.php?error=WrongPassword");
            exit();
        }
        elseif ($checkPassword == true) {
            // When Password is verified
            switch ($userType) {
                case '0':
                    $user_details = $user;
                    $_SESSION["username"] = $user["username"];
                    $_SESSION["account_type"] = $user["account_type"];
                    $_SESSION["account_no"] = $user["account_no"];
                    header("location: airline_administrator_home.php");
                    exit();
                    break;

                case '1':
                    $query2 = "SELECT * FROM operations_agent WHERE account_no ={$user["account_no"]}";
                    break;

                case '2':
                    $query2 = "SELECT * FROM flight_dispatcher WHERE account_no={$user["account_no"]}";
                    break;

                case '3':            
                    $query2 = "SELECT * FROM registered_passenger WHERE account_no={$user["account_no"]}";
                    break;
                default:
                    header("location: login.php?error=UserNotFound2");
                    break;
            }
            $query3 =  "SELECT * FROM telephone_no WHERE user_id ='{$user["ID"]}'";
            $result_set2 = mysqli_query($this->connect(), $query2);
            $result_set3 = mysqli_query($this->connect(), $query3);

            if (!($result_set2 && $result_set3) ) {
                header("location: login.php?error=ConnectionFail2");
                exit();
            }

            if (!mysqli_num_rows($result_set2) == 1) {
                header("location: login.php?error=UserNotFound3");
                exit();
            }

            $user_details = mysqli_fetch_assoc($result_set2);
            $user_TP = mysqli_fetch_assoc($result_set3);
            $array_Tp_no = array();
            foreach ($user_TP as $TP_no) {
                array_push($array_Tp_no, $TP_no['phone_number']);
            }

            session_start();
            $_SESSION["username"] = $user["username"];
            $_SESSION["account_type"] = $user["account_type"];
            $_SESSION["account_no"] = $user["account_no"];
            $_SESSION["name"] = $user_details["name"];
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
                    $_SESSION["age"] = $user_details["age"];
                    $_SESSION["passport_number"] = $user_details["passport_number"];
                    $_SESSION["state"] = $user_details["state"];
                    $_SESSION["category"] = $user_details["category"];
                    $_SESSION["state"] = $user_details["state"];
                    break;
                default:
                    header("location: login.php?error=UserNotFound4");
                    break;
            }
            return $userType;
        }
        return -1;
    }
}

?>