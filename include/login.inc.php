<<?php 
include_once('./class/controller/login_Controller.class.php');
include_once('db.inc.php');
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
