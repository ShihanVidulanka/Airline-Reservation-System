<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
$seat_reservation_view = new Seat_Reservation_View();
$airplane = $seat_reservation_view->getPlaneDetailsFromModel($_POST['flight_id']);
$flightView = new Flight_View();
$flight= $flightView->getFlightDetailsByFlightIdFromModel($_POST['flight_id']);
$reserved_seats = $seat_reservation_view->getReservedSeats($_POST['flight_id']);
// print_array($flight);
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
                <form id="seatbooking" class="form-horizontal p-4" action="include/passenger_seat_reservation.inc.php" method="post">
                  
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="seat">Select your seat:</label>
                        <div class="col-sm-8">
                            <select name="seat" class="form-control mb-4" id="seat"
                                onchange="addTicketPrice(
                                                    this.value,
                                                    <?php echo $airplane->getNo_platinum_seats();?>, 
                                                    <?php echo $airplane->getNo_business_seats();?>, 
                                                    <?php echo $airplane->getNo_economy_seats();?>, 
                                                    <?php echo $flight->getPlatinum_price();?>, 
                                                    <?php echo $flight->getBusiness_price();?>, 
                                                    <?php echo $flight->getEconomy_price();?> 
                                            )"
                            >
                            <option value="">Select</option>
                            <?php

                                $seat_count = $airplane->getNo_business_seats() + $airplane->getNo_economy_seats() + $airplane->getNo_platinum_seats();
                                
                                for ($i=1; $i <= $seat_count; $i++) {
                                    $seat=$i."-";
                                    if($i<=$airplane->getNo_platinum_seats()){
                                        $seat.="Platinum Class Seat";
                                    }else if($i<=$airplane->getNo_business_seats()+$airplane->getNo_platinum_seats()){
                                        $seat.="Business Class Seat";
                                    }else if($i<=$airplane->getNo_business_seats()+$airplane->getNo_platinum_seats()+$airplane->getNo_economy_seats()){
                                        $seat.="Economy Class Seat";
                                    } 
                                    if(in_array($i,$reserved_seats)){
                                        echo "<option class=\"unavailable\" value={$i} disabled>{$seat} - Unavailable</option>";
                                    }
                                    else{
                                        echo "<option class=\"available\" value={$i}>{$seat} - Available</option>";

                                    }
                                }

                            ?>
                            </select>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="seattype">Seat Type:</label>
                        <div class="col-sm-8">
                            <input disabled class="form-control"  type="text" name="" id="seattype">
                            <input hidden class="form-control"  type="text" name="seattype" id="seattype">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="seatno">Seat No:</label>
                        <div class="col-sm-8">
                            <input disabled class="form-control"  type="text" name="" id="seatno">
                            <input hidden class="form-control"  type="text" name="seat_no" id="seat_no">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="ticket_price">Ticket Price:</label>
                        <div class="col-sm-8">
                            <input disabled class="form-control"  type="text" name="" id="ticketprice">
                            <input hidden class="form-control"  type="text" name="ticket_price" id="ticket_price">
                        </div>
                    </div>
                    <input hidden type="text" id="flightid" name="flight_id" value="<?php echo $_POST['flight_id']; ?>">
                    <input hidden type="text" name="seat_type" id="seat_type">
                    <div class="button" >
                        <button type="button" onclick="checkSeatAvailability();" class="btn btn-primary">Book Now</button>
                    </div>
                </form>
            </div>
                
            
        </div>
        
    </div>
    <script src="js/passenger_seat_reservation.js"></script>

</body>
</html>