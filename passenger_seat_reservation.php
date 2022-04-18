<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
$seat_reservation_view = new Seat_Reservation_View();
$airplane = $seat_reservation_view->getPlaneDetailsFromModel($_POST['flight_id']);
$reserved_seats = $seat_reservation_view->getReservedSeats($_POST['flight_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/seat_reservation.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Seat Reservation</title>
</head>
<body>
    <div class="container">
        <h1 id="heading">Reserve Your Seat</h1>
        <div class="row">
            <div class="col-sm-5 red">
                <img id="seatmap" src="data:<?php echo $airplane->getFile_type; ?>;charset=utf8;base64,<?php echo base64_encode($airplane->getImage()); ?>" > 
            </div>
            <div class="col-sm-7 wrapper">
                <form class="form-horizontal p-4" action="includes/passenger_seat_reservation.inc.php" method="post">
                  
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="seat">Select your seat:</label>
                        <div class="col-sm-10">
                            <select name="seat" class="form-control mb-4" id="seat">
                            <option value=""></option>
                            <?php

                                $seat_count = $airplane->getNo_business_seats() + $airplane->getNo_economy_seats() + $airplane->getNo_platinum_seats();
                                
                                for ($i=1; $i <= $seat_count; $i++) { 
                                    if(in_array($i,$reserved_seats)){
                                        echo "<option class=\"unavailable\" value={$i} disabled>{$i} - Unavailable</option>";
                                    }
                                    else{
                                        echo "<option class=\"available\" value={$i}>{$i} - Available</option>";

                                    }
                                }

                            ?>
                            </select>
                        </div>
                        
                    </div>
                    
                    <button class="btn btn-primary">Book Now</button>
                </form>
            </div>
                
            
        </div>
        
    </div>
</body>
</html>