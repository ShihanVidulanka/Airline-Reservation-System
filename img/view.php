<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

    if(isset($_GET['id'])) {
        $dbh = new Dbh();
        $pdo = $dbh->connect();
        $query = "SELECT * FROM airplane WHERE id=12";
        $stmt = $pdo->query($query);
        $row = $stmt->fetch();
		header("Content-type: " . $row["file_type"]);
        echo $row["image"];
	}
    
?>