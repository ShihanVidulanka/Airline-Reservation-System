<?php

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

if (!isset($_SESSION['ID'])) {
  header("Location: login.php");
  return;
}

$flight_dispatcher_view = new Flight_Dispatcher_View();

$flight_details = $flight_dispatcher_view->getFlightDetails($_GET['show']);
$destinations = $flight_dispatcher_view->getDestinations();

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
            <a class="nav-link active" href="flight_dispatcher_flight_details.php?show=none">Flight Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="flight_dispatcher_add_new_flight.php">Add New Flight</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="flight_dispatcher_add_new_airport.php">Add New Airport</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="flight_dispatcher_add_new_airplane.php">Add New Airplane</a>
          </li> -->
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
          foreach ($flight_details as $value) {
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
            echo "<td><a class=\"btn btn-sm btn-primary\" href=\"include/flight_dispatcher_cancel_flight.inc.php?id={$value['id']}\">Cancel</a></td>";
            echo '</tr>';
          }
          ?>


        </tbody>
      </table>

    </div>

  </div>
</body>

</html>