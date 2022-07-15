<?php

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

if (!isset($_SESSION['ID'])) {
  header("Location: login.php");
  return;
}

$flight_dispatcher_view = new Flight_Dispatcher_View();

$outgoing_flight_details = $flight_dispatcher_view->getOutgoingFlightDetails();
$incoming_flight_details = $flight_dispatcher_view->getIncomingFlightDetails();
$destinations = $flight_dispatcher_view->getDestinations();
$origins = $flight_dispatcher_view->getOrigins();

// print_r($outgoing_flight_details);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/flight_dispatcher_flight_details.css">
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
            <a class="nav-link" href="flight_dispatcher_home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="flight_dispatcher_flight_details.php">Flight Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="flight_dispatcher_add_new_flight.php">Add New Flight</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="flight_dispatcher_add_new_airport.php">Add New Airport</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="flight_dispatcher_confirm_arrival.php">Confirm Arrival</a>
          </li> -->
        </ul>

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="change_password.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
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

  <div class="container p-3">
    <p class="h2 text-danger">Destination Details</p>
    <div class="search">
      <form class="d-flex mb-3" action="include/flight_dispatcher_filter_destination.inc.php" method="POST">
        <select required class="select" data-mdb-filter="true" name="dropdown">
          <option value="" selected disabled hidden>--- Choose a destination ---</option>
          <?php
          foreach ($destinations as $destination) {
            echo "<option value='{$destination['destination']}'>" . $destination['destination'] . "</option>";
          }
          ?>
        </select>
        <button class="btn btn-primary" type="submit" name='search'>Search</button>
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
            <th>Cancel</th>
          </tr>
        </thead>
        <tbody>

          <?php
          foreach ($outgoing_flight_details as $value) {
            echo '<tr>';
            echo '<td>' . $value['tail_no'] . "</td>";
            echo '<td>' . $value['origin'] . "</td>";
            echo '<td>' . $value['destination'] . "</td>";
            echo '<td>' . $value['economy_price'] . "</td>";
            echo '<td>' . $value['business_price'] . "</td>";
            echo '<td>' . $value['platinum_price'] . "</td>";
            echo '<td>' . $value['departure_date'] . "</td>";
            echo '<td>' . $value['departure_time'] . "</td>";
            echo '<td>' . $value['flight_time'] . "</td>";
            echo "<td><a class=\"btn btn-sm btn-danger\" href=\"include/flight_dispatcher_cancel_flight.inc.php?id_d={$value['id']}\">Cancel</a></td>";
            echo '</tr>';
          }
          ?>


        </tbody>
      </table>

    </div>

  </div>

  <div class="container p-3">
    <p class="h2 text-danger">Arrival Details</p>
    <div class="search">
      <form class="d-flex mb-3" action="include/flight_dispatcher_filter_origins.inc.php" method="POST">
        <select required class="select" data-mdb-filter="true" name="dropdownOrigin">
          <option value="" selected disabled hidden>--- Choose a origins ---</option>
          <?php
          foreach ($origins as $origin) {
            echo "<option value='{$origin['origin']}'>" . $origin['origin'] . "</option>";
          }
          ?>
        </select>
        <button class="btn btn-primary" type="submit" name='searchOrigin'>Search</button>
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
            <th>Arrived</th>
          </tr>
        </thead>
        <tbody>

          <?php
          foreach ($incoming_flight_details as $value) {
            echo '<tr>';
            echo '<td>' . $value['tail_no'] . "</td>";
            echo '<td>' . $value['origin'] . "</td>";
            echo '<td>' . $value['destination'] . "</td>";
            echo '<td>' . $value['economy_price'] . "</td>";
            echo '<td>' . $value['business_price'] . "</td>";
            echo '<td>' . $value['platinum_price'] . "</td>";
            echo '<td>' . $value['departure_date'] . "</td>";
            echo '<td>' . $value['departure_time'] . "</td>";
            echo '<td>' . $value['flight_time'] . "</td>";
            echo "<td><a class=\"btn btn-sm btn-primary\" href=\"include/flight_dispatcher_arrived_flight.inc.php?id_o={$value['id']}\">Arrived</a></td>";
            echo '</tr>';
          }
          ?>


        </tbody>
      </table>

    </div>

  </div>
</body>

</html>