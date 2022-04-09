<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";
  $flight_view = new Flight_View();
  $flights= $flight_view->getFlightDetailsFromModel();
  $destinations = $flight_view->getDestinations();
  if(isset($_POST['submit'])){
    $flights= $flight_view->getFlightDetailsFromModel($_POST['destination']);
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
  <!-- <link rel="stylesheet" href="css/passenger_flight_booking.css"> -->
  <title>Flight Details</title>
</head>

<body>
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
            <a class="nav-link active" href="passenger_flight_booking.php">Flight Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="passenger_booking_details.php">Booking Details</a>
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

  <div class="container p-3">

    <div class="search">
      <form class="d-flex mb-3" action="passenger_flight_booking.php" method="post">
        <!-- <input class="form-control me-2" type="text" placeholder="Search Your Destination" /> -->
        <select name="destination" id="destination" class="form-control me-2">
          <option value="">Select Your Destination</option>
        <?php
            foreach ($destinations as $destination) {
              $option=$destination['airport_code'].'-'.$destination['name'].'-'.$destination['country'];
              // print_array($destination);
              echo '<option value="'.$destination['airport_code'].'">'.$option.'</option>';
            }
          ?>
        </select>
        <button name="submit" type="submit" value="Search" class="btn btn-primary">Search</button>
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
        <tbody>
        <?php
            foreach ($flights as $flight) {

              echo "<tr>";
                
                echo '<td>'.$flight->getAirplane_id().'</td>';  
                echo '<td>'.$flight->getOrigin().'</td>';  
                echo '<td>'.$flight->getDestination().'.</td>';  
                echo '<td>'.$flight->getEconomy_price().'</td>';  
                echo '<td>'.$flight->getBusiness_price().'</td>';
                echo '<td>'.$flight->getPlatinum_price().'</td>';  
                echo '<td>'.$flight->getDeparture_date().'</td>';  
                echo '<td>'.$flight->getDeparture_time().'</td>';  
                echo '<td>'.$flight->getFlight_time().'</td>';  
                echo '<td><button class="btn btn-primary" onclick="sendFlightId('.$flight->getId().');">Book this Flight</button></td>'; 
              echo "</tr>";
              // echo "<input id='id_{$flight->getId()}' value='{$flight->getId()}'>";

              
            }
          ?>
        </tbody>
      </table>
      <!-- <a href="passenger_seat_reservation.php" class="button">Book This Flight</a> -->

      <form id="flight_id_form" action="passenger_seat_reservation.php" method="post" hidden>
        <input type="text" name='flight_id' id='flight_id'>
      </form>

    </div>

  </div>
  <script src="js/passenger_flight_booking.js"></script>
</body>

</html>