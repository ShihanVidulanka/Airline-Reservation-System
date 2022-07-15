<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

if(isset($_POST['submit'])){
    if(isset($_SESSION['verification_code'])) {
        if (strcmp($_POST['verification'], $_SESSION['verification_code']) == 0) {
            $_SESSION['resetCondition'] = true;
            unset($_SESSION['verification_code']);
            header("location: ../change_password.php");
        } else {
            header("location: ../forget_password.php?error=verification_failed");
        }
    }else {
        header("location: ../forget_password.php?error=verification_failed");
    }

}
