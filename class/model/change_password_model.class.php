<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Change_Password_Model extends Dbh{

    protected function getEmailFromModel($username){
        $email = "empty";
        $query="SELECT email FROM user WHERE username=:username";
        $stmt=$this->connect()->prepare($query);
        $stmt->execute(
            array(
                ':username'=>$username
            )
        );
        $result = $stmt->fetch();
        if(isset($result['email'])&& !(empty($result['email']))){
            $email = $result['email'];
        }

        return $email;
    }

    protected function checkCurrentPasswordFromModel($currentPassword,$username){
        $query = "SELECT password FROM user WHERE username=:username";
        $stmt=$this->connect()->prepare($query);
        $stmt->execute(
            array(
                ':username'=>$username
            )
        );
        $result = $stmt->fetch();

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
        $rows=$stmt->rowCount();
        if($rows>0){
            if(isset($_SESSION['username'])){
                header("location: ../change_password.php?error=change_successful");
            }else{
                header("location: ../login.php?error=change_successful");
            }
        }else{
            if(isset($_SESSION['username'])){
                header("location: ../change_password.php?error=change_unsuccessful");
            }else{
                header("location: ../login.php?error=change_unsuccessful");
            }
        }

    }


}
