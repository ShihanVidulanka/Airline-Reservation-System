<?php

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

if (!isset($_SESSION['ID'])) {
  header("Location: login.php");
  return;
}

$view = new Flight_Dispatcher_View();
$tail_nos = $view->getTailNos();
$destinations = $view->getDestinationsWithoutOrigin($_SESSION['airport_code']);
// print_r($destinations);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/flight_dispatcher_add_new_flight.css">
  <title>Add New Flight</title>
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
            <a class="nav-link " href="flight_dispatcher_flight_details.php">Flight Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="flight_dispatcher_add_new_flight.php">Add New Flight</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="flight_dispatcher_add_new_airport.php">Add New Airport</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="flight_dispatcher_confirm_arrival.php">Confirm Arrival</a>
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

  <div class="container pt-5">
    <div class="wrapper p-3">
      <h1 id="heading" class="mb-4">Add New Flight</h1>
      <form action="include/flight_dispatcher_add_new_flight.inc.php" method="POST">


        <div class="row mb-3">
          <div class="col-sm-12">
            <label class="form-label">Destination</label>
            <select required class="form-control" name="destination" id="destination">
              <option value="" selected hidden disabled>----------Select the Destination-----------</option>
              <?php
              foreach ($destinations as $destination) {
                echo "<option value='{$destination['name']}'>" . $destination['name'] . "</option>";
              }
              ?>
            </select>
          </div>

        </div>

        <div class="row mb-3">

          <div class="col-sm-6">
            <label for="date" class="form-label">Departure Date/Time</label>
            <input required class="form-control" type="datetime-local" name="departure_date_time" id="departure_date_time" placeholder="Enter the Date/Time">
          </div>

          <div class="col-sm-6">
            <label for="telephone" class="form-label">Apprx. Arrival Date/Time</label>
            <input required class="form-control" type="datetime-local" name="arrival_date_time" id="arrival_date_time" placeholder="Enter the Time/Date">
          </div>

        </div>

        <div class="row mb-3">
          <div class="col-sm-6">
            <label class="form-label">Airplane Tail No.</label>
            
            <select oninput="validateTailNo('tail_no_val', 'include/flight_dispatcher_add_new_flight.inc.php', 'tail_no_', this.value)" 
            required class="form-control" name="tail_no" id="tail_no">

              <option value="" selected hidden disabled>--Select the Airplane Tail No--</option>
              <?php
              foreach ($tail_nos as $tail_no) {
                echo "<option value='{$tail_no['tail_no']}'>" . $tail_no['tail_no'] . "</option>";
              }
              ?>
            </select>
            <div id="tail_no_val" class="m-3"></div>
          </div>

          <div class="col-sm-8"></div>
        </div>

        <div class="row mb-3">

          <div class="col-sm-4">
            <label class="form-label">Economy Class Price</label>
            <input required class="form-control" type="text" name="economy_price" placeholder="Enter the Price">
          </div>

          <div class="col-sm-4">
            <label class="form-label">Business Class Price</label>
            <input required class="form-control" type="text" name="business_price" placeholder="Enter the Price">
          </div>

          <div class="col-sm-4">
            <label class="form-label">Platinum Class Price</label>
            <input required class="form-control" type="text" name="platinum_price" placeholder="Enter the Price">
          </div>

        </div>

        <div class="btn-group">
          <button class="btn btn-primary buttons" name='submit' type="submit">Add</button>
        </div>
      </form>
    </div>

  </div>
  <script src="js/flight_dispatcher_add_new_flight.js"></script>
</body>

</html>