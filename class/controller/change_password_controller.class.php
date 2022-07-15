<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Change_Password_Controller extends Change_Password_Model{
    public function changePassword($resetCondition=false,$username,$currentPassword,$password,$retypePassword){
        echo 1;
        if (!$resetCondition){
            echo $currentPassword;
            if($this->checkCurrentPasswordFromModel($currentPassword,$username)){
                echo 3;
                if ($this->validatePassword($password)&&($password==$retypePassword)){
                    echo 4;
                    $this->changePasswordFromModel($username,$password);
                }
            }
        }else{
            echo 5;
            if ($this->validatePassword($password)&&($password==$retypePassword)){
                echo 6;
                $this->changePasswordFromModel($username,$password);
            }
        }


    }
    private function validatePassword($password){
        return preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/',$password);
    }
}
