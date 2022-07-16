<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";


if($_POST['password']){
//    print_array($_SESSION);
    $reset_condition=false;
    $current_password="";
    $password=$_POST['password'];
    $retypePassword = $_POST['retypepwd'];
    $username=$_SESSION['username'];
    if(isset($_SESSION['resetCondition'])){
        $reset_condition=true;
        unset($_SESSION['resetCondition']);
        unset($_SESSION['username']);
    }
    if(!$reset_condition){
        $current_password=$_POST['current_password'];
    }
//    echo $username;
    $change_password_controller = new Change_Password_Controller();
    $change_password_controller->changePassword($reset_condition,$username,$current_password,$password,$retypePassword);

}