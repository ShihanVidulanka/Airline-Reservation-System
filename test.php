<?php

require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

$cbm = new Cancel_Booking_Model();
$cbm->cancel_booking(5);

//    $dbh = new Dbh();
//    $pdo = $dbh->connect();
//    $query = "SELECT * FROM airplane WHERE id=12 ";
//    $stmt = $pdo->query($query);
//    $result = $stmt->fetch();
//?>
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>Testing page</title>-->
<!--</head>-->
<!--<body>-->
<!--    <form action="">-->
<!--        <!-- use ajaxPost function to realtime submiting for oninput event -->-->
<!--        <input type="text" id="testinput" oninput="ajaxPost('response','postingPage.php','input',this.value)" >-->
<!--        <p id="response"></p>-->
<!--    </form>-->
<!--    -->
<!--    <!-- <img src="view.php?id=12"> -->-->
<!--    <img src="data:--><?php //echo $result['file_type'];?><!--;charset=utf8;base64,--><?php //echo base64_encode($result['image']); ?><!--" /> -->
<!--    <script src="js/additional.js"></script>-->
<!--</body>-->
<!--</html>-->

