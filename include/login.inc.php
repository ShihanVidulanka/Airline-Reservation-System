<<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";
if (isset($_SESSION['login'])) {
    header("Location: main_page.php");
}

if (isset($_POST['login'])) {

    $username = htmlentities($_POST["username"]);
    $password = htmlentities($_POST["password"]);

    $loginctrlobj = new Login_Controller($username,$password);
    $loginctrlobj->loginUser();
}

?>
