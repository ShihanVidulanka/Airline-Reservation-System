<?php 
include_once("./class/model/dbh.php");

class Login_Model extends Dbh{
    protected function getUser($username, $password){
        $query = "SELECT * FROM user WHERE username='{$username}';";
        $result_set = mysqli_query($this->connect(), $query);
        echo "hello";
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

            $query2 =  "SELECT phone_no FROM telephone_no WHERE user_id ={$user["ID"]}";
            $result_set2 = mysqli_query($this->connect(), $query2);

            if (!($result_set2) ) {
                header("location: login.php?error=ConnectionFail2");
                exit();
            }
            $array_Tp_no = array();
            while ($user_tp = mysqli_fetch_assoc($result_set2)) {
                array_push($array_Tp_no, $user_tp['phone_no']);
            }

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
                    $query3 = "SELECT * FROM operations_agent WHERE user_id ={$user["ID"]}";
                    break;

                case '2':
                    $query3 = "SELECT * FROM flight_dispatcher WHERE user_id={$user["ID"]}";
                    break;

                case '3':            
                    $query3 = "SELECT * FROM registered_passenger WHERE user_id={$user["ID"]}";
                    break;
                default:
                    header("location: login.php?error=UserNotFound2");
                    break;
            }
            $result_set3 = mysqli_query($this->connect(), $query3);
            if (!$result_set3) {
                header("location: login.php?error=ConnectionFail3");
                exit();
            }

            if (!mysqli_num_rows($result_set3) == 1) {
                header("location: login.php?error=UserNotFound3");
                exit();
            }

            $user_details = mysqli_fetch_assoc($result_set3);

            session_start();
            $_SESSION["ID"] = $user["ID"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["account_type"] = $user["account_type"];
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
                    $_SESSION["category"] = $user_details["category"];
                    $_SESSION["state"] = $user_details["state"];
                    $_SESSION["passenger_id"] = $user_details["passenger_id"];
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