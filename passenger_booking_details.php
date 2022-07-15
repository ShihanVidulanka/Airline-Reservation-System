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
                        <a class="nav-link" aria-current="page" href="passenger_edit_details.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="include/logout.inc.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    if(strcmp($bookingError,"not-genaral")==0){
        echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
        Booking Removed Successfully!!!
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
      </div>";
    }else if(strcmp($bookingError,"email")==0){
        echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
        Booking Removed Successfully and Payment refunding email has been sent Successfully!!!
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
      </div>";
    }

    else if(strcmp($bookingError,"general-email")==0){
        echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
        Booking Removed Successfully and Payment refunding email has been sent Successfully!!!
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
      </div>";

        echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
        You are now General Passenger!!!
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
      </div>";
    }
    else if(strcmp($bookingError,"general")==0) {
        echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
        Booking Removed Successfully and Payment refunding email has been sent Successfully!!!
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