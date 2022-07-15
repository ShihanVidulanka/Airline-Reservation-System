<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

$change_password_controller = new Change_Password_Controller();
if(isset($_POST['username'])){
    $responce=$change_password_controller->getEmail($_POST['username']);
    if(!(strcmp($responce,"empty")==0)){
        $varification_num = rand(100000, 999999);
        $email_api = new Email_Api();
        $body = "B Airways: Your verification code is ".$varification_num.".";
        $subject = "Verifycation code for resetting password";
        $recipient = $responce;
        $email = new Email($recipient,$subject,$body);
        $email_api->sendMail($email);
        $_SESSION['verification_code']=$varification_num;
        header("location: ../reset_verification.php");
    }else{
        header("location: ../forget_password.php?error=invalid_username");
    }
}