<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";

$flight_view = new Flight_View();
$destinations = $flight_view->getDestinations();
if (isset($_POST['submit'])) {
    $flights = $flight_view->guest_getFlightDetailsFromModel($_POST['destination']);
}
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
    <link rel="stylesheet" href="css/passenger_flight_booking.css">
    <title>Flight Details</title>
</head>

<body onload="changeTable();">
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">B Airline</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="main_page.php">Main Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="guest_flight_booking.php">Flight Details</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <?php
    if (strcmp($bookingError, "success") == 0) {
        echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
        Booking Successfull!!!
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
        </div>";
    } else if (strcmp($bookingError, "alreadyBooked") == 0) {
        echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
        Seat is already booked. Try another seat!!!
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
        </div>";
    } else if (strcmp($bookingError, "cancelled") == 0) {
        echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
        Payment cancelled!!!
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
        </div>";
    } else if (strcmp($bookingError, "regular") == 0) {
        echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
        Payment is success and You are Regular Passenger now!!!
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
        </div>";
    }
    ?>
    <div class="container p-3">

        <div class="search">
            <form class="d-flex mb-3" action="guest_flight_booking.php" method="post">
                <label for="destination" id="destination_label">Select your destination:</label>
                <select name="destination" id="destination" class="form-control me-2">
                    <!-- <option value="all">Select Your Destination</option> -->
                    <option value="all">All</option>
                    <?php
                    foreach ($destinations as $destination) {
                        $option = $destination['airport_code'] . '-' . $destination['name'] . '-' . $destination['country'];
                        echo '<option value="' . $destination['airport_code'] . '">' . $option . '</option>';
                    }
                    ?>
                </select>
            </form>
        </div>

        <div class="wrapper p-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Air Plane NO</th>
                        <th>Origine</th>
                        <th>Destination</th>
                        <th>Economy Price</th>
                        <th>Buisiness Price</th>
                        <th>Platinum Price</th>
                        <th>Departure Date</th>
                        <th>Departure Time</th>
                        <th>Flight Time</th>
                        <th>Book</th>
                    </tr>
                </thead>
                <tbody id="flightTable"></tbody>
            </table>

            <form id="flight_id_form" action="guest_seat_reservation.php" method="post" hidden>
                <input type="text" name='flight_id' id='flight_id'>
            </form>

        </div>

    </div>
    <script src="js/guest_flight_booking.js"></script>
</body>

</html>