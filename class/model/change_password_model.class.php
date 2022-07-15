<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Change_Password_Model extends Dbh{


    protected function checkCurrentPasswordFromModel($currentPassword,$username){
        $query = "SELECT password FROM user WHERE username=:username";
        $stmt=$this->connect()->prepare($query);
        $stmt->execute(
            array(
                ':username'=>$username
            )
        );
        $result = $stmt->fetch();
        print_array($result);
        echo $currentPassword;
        echo checkThePassword($currentPassword,$result['password']);
        return checkThePassword($currentPassword,$result['password']);
    }
    protected function changePasswordFromModel($username,$password){
        $query="UPDATE user SET password=:password WHERE username=:username";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(
          array(
              ':password'=>encryptPassword($password),
              ':username'=>$username
          )
        );
        if(isset($_SESSION['username'])){
                header("location: ../change_password.php?error=change_successful");
        }else{
            header("location: ../login.php?error=change_successful");
        }
    }


}
