<<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
if (isset($_SESSION['login'])) {
    header("Location: index.php");
}

if (isset($_POST['login'])) {

    // $username = htmlentities($_POST["username"]);
    $username = remove_unnessaries($_POST["username"]);
    // $password = htmlentities($_POST["password"]);
    $password = remove_unnessaries($_POST["password"]);

    $loginctrlobj = new Login_Controller($username,$password);
    $loginctrlobj->loginUser();
}

?>
