<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";

$seat_reservation_view = new Seat_Reservation_View();
// print_array($_SESSION);
$destinations = $seat_reservation_view->getBookedFlightDestinationsFromModel($_SESSION['passenger_id']);
// print_array($destinations);
//$tcontent = $seat_reservation_view->getBookedFlightDetailsFromModel($_SESSION['passenger_id']);
// print_array($tcontent);

//if (isset($_POST['submit'])) {
//    $flights = $flight_view->getFlightDetailsFromModel($_POST['destination']);
//}
$bookingError = "";
if (isset($_GET['error'])) {
    $bookingError = $_GET['error'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <link rel="stylesheet" href="css/flight_details.css"> -->
    <title>Booking Details</title>
</head>

<body onload="filter()">
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">B Airline</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="passenger_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="passenger_flight_booking.php">Flight Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="passenger_booking_details.php">Booking Details</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="include/logout.inc.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    if(strcmp($bookingError,"SUCCESS")==0){
        echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
        Booking Removed Successfully!!!
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
      </div>";
    }
    ?>


    <div class="container p-3">

        <div class="search">
            <form class="d-flex mb-3">
            <label for="destination" id="destination_label">Select your destination:</label>
        <select name="destination" id="destination" class="form-control me-2" onchange="filter()">
          <option value="all">All</option>
        <?php
foreach ($destinations as $destination) {
  $option=$destination['airport_code'].'-'.$destination['name'].'-'.$destination['country'];
  echo '<option value="'.$destination['airport_code'].'">'.$option.'</option>';
}
?>
        </select>
            </form>

            <form action="include/passenger_flight_booking_details.inc.php" method="post" id="destform" hidden>
                <input type="text" id="dest" name="dest">
            </form>
        </div>

        <div class="wrapper p-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Air Plane NO</th>
                        <th>Origine</th>
                        <th>Destination</th>
                        <th>Class</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Book</th>
                    </tr>
                </thead>
                <tbody id="bookingtable">
                    <?php 

                    ?>
                </tbody>
            </table>

            <form action="include/passenger_flight_booking_details.inc.php" method="post" id="bookingform" hidden>
                <input type="text" id="booking" name="booking_id">
            </form>

        </div>

    </div>
    <script src="js/additional.js"></script>
    <script src="js/passenger_booking_details.js"></script>
</body>

</html>