<?php
ob_start();

if (!isset($_SESSION)) {
    session_start();
}

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "airline_reservation_system";
$connection = new mysqli($hostname, $username, $password, $dbname) or die("Database connection not established.");

?>