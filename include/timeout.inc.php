<?php
session_start();
unset($_SESSION['verification_code']);
header("Location: ../forget_password.php");
?>