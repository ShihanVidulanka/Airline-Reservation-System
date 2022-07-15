<?php

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

if (!isset($_SESSION['ID'])) {
  header("Location: login.php");
  return;
}
if (isset($_GET['success'])) {
  $error = 'Flight Succesfully Added';
}

$view = new Flight_Dispatcher_View();
$destinations = $view->getDestinationsWithoutOrigin($_SESSION['airport_code']);

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

  <div class="container pt-5">
    <div class="wrapper p-3">
      <h1 id="heading" class="mb-4">Add New Flight</h1>
      <form id="add_new_flight_form" action="include/flight_dispatcher_add_new_flight2.inc.php" method="POST">

        <div class="row mb-3" id="error">
          <?php
          if (isset($_GET['error'])) {
            if ($_GET['error'] == 'SUCCESS') {
              $error = 'Flight Succesfully Added';
              echo "<p>" . "{$error}" . "</p>";
            }
          }

          ?>

        </div>

        <!-- Destination in Words -->
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

        <!-- Departure Date/Time -->
        <div class="row mb-3">
          <div class="col-sm-6">
            <label for="departure_date" class="form-label">Departure Date/Time</label>
            <input required class="form-control" type="datetime-local" name="departure_date_time" id="departure_date_time" placeholder="Enter the Date/Time" min="<?php echo date("Y-m-d") . "T01:30"; ?>">
          </div>

          <!-- Apprx. Arrival Date/Time -->
          <div class="col-sm-6">
            <label for="arrival_date" class="form-label">Apprx. Arrival Date/Time</label>
            <input required class="form-control" type="datetime-local" name="arrival_date_time" id="arrival_date_time" placeholder="Enter the Time/Date" min="<?php echo date("Y-m-d") . "T01:30"; ?>">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-sm-6" id="departure_date_validation"></div>
          <div class="col-sm-6" id="arrival_date_validation"></div>
        </div>

        <div class="row mb-3">

          <div class="col-sm-6">
            <!-- Select Prefered Method -->
            <label for="method" class="form-label">Select Prefered Method of Airplane</label>
            <div class="form-check">
              <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" onchange="changeContent1('tail_no_val', 'include/flight_dispatcher_add_new_flight.inc.php', 'departure_datetime_');">Select Existing Airplane
              <label class="form-check-label" for="radio1"></label>
            </div>

            <div class="form-check">
              <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2" onchange="changeContent2('tail_no_val', 'include/flight_dispatcher_add_new_flight.inc.php', 'free_departure_datetime_');">Select Brand New Airplane
              <label class="form-check-label" for="radio2"></label>
            </div>
          </div>

          <!-- Existing Airplane Tail No. -->
          <div class="col-sm-6 hide" id="show1">
            <label class="form-label">Airplane Tail No.</label>
            <select required="" class="form-control" name="tail_no" id="tail_no">
              <option value="" selected hidden disabled>--Select the Airplane Tail No--</option>

            </select>
          </div>

          <!-- NEW Airplane Tail No. -->
          <div class="col-sm-6 hide" id="show2">
            <label class="form-label">Free Airplane Tail No.</label>
            <select required="" class="form-control" name="free_tail_no" id="free_tail_no">
              <option value="" selected hidden disabled>--Select the Airplane Tail No--</option>

            </select>
            <div id="free_tail_no_val" class="m-3"></div>
          </div>
        </div>

        <!-- Table of free airplanes -->
        <div id="tail_no_val" class="row mb-3 hide">
          <table class="table" id="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">ORG</th>
                <th scope="col">DSTN</th>
                <th scope="col">DDate</th>
                <th scope="col">DTime</th>
                <th scope="col">FTime</th>
                <th scope="col">ADate</th>
                <th scope="col">ATime</th>
              </tr>
            </thead>
            <tbody id="tBody">
              <!-- new rows will be added by javascript -->
            </tbody>
          </table>
        </div>


        <div class="row mb-3">

          <!-- Economy Class Price -->
          <div class="col-sm-4">
            <label class="form-label">Economy Class Price</label>
            <input required class="form-control" type="text" name="economy_price" id="economy_price" placeholder="Enter the Price">
          </div>

          <!-- Business Class Price -->
          <div class="col-sm-4">
            <label class="form-label">Business Class Price</label>
            <input required class="form-control" type="text" name="business_price" id="business_price" placeholder="Enter the Price">
          </div>

          <!-- Platinum Class Price -->
          <div class="col-sm-4">
            <label class="form-label">Platinum Class Price</label>
            <input required class="form-control" type="text" name="platinum_price" id="platinum_price" placeholder="Enter the Price">
          </div>

        </div>

        <!-- validations for prices -->
        <div class="row mb-3">
          <div class="col-sm-4" id="economy_validation">
          </div>
          <div class="col-sm-4" id="business_validation">
          </div>
          <div class="col-sm-4" id="platinum_validation">
          </div>
        </div>

        <!-- Submit button -->
        <div class="btn-group">
          <input onclick="checkAll();" class="btn btn-primary buttons" type="button" name='create' value="ADD">

        </div>
      </form>
    </div>

  </div>
  <script src="js/flight_dispatcher_add_new_flight.js"></script>
</body>



</html>