<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

if (!isset($_SESSION['ID'])) {
    header("Location: login.php");
    return;
}
$controller=new Airline_Administrator_Controller();
$origin=$controller->get_name_of_origins();
$destination=$controller->get_name_of_destinations();
$flight_id=$controller->get_flight_id();
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
    <link rel="stylesheet" href="css/airline_Administrator_generate_reports.css">
    <title>Home</title>
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
                        <a class="nav-link" href="airline_administrator_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active " href="airline_administrator_generate_report.php">Generate Reports</Details></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="airline_administrator_create_user.php">Create User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="airline_administrator_view_user.php">View User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="airline_administrator_add_new_airplane.php">Add New Airplane</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="airline_administrator_add_new_airport.php">Add New Flight</a>
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




    

<div class="flex-shrink-0 p-3 bg-transparent" style="width: 90%;">
    <a href="airline_administrator_generate_report.php" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
      <svg class="bi me-2" width="30" height="24"></svg>
      <span class="fs-5 fw-semibold">Generate Reports</span>
    </a>
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
        Given a flight no, all passengers travelling in it (next immediate flight) below age 18,above age 18
        </button>
        <div class="collapse" id="home-collapse">
            <div class="container ">
                <form method="post" action="include/airline_Administrator_generate_report.inc.php">

                    <legend>Given a flight no, all passengers travelling in it (next immediate flight) below age 18,above age 18</legend>
                    <div class="mb-3">
                        <label for="Flight no" class="form-label">Flight no</label>
                        <!-- <input required type="number" id="FlightNumber" name='FlightNumber1'class="form-control" placeholder="Flight no"value=''min=1 max=10000> -->
                        <select  required id="FlightNumber"name="FlightNumber1" class="form-control" placeholder="Flight no">
                            <option value=""selected hidden disabled style="text-align : center;align-items:center">=========select flight no=========</option>
                        <?php
                            foreach ($flight_id as $value) {
                                echo "<option value='{$value['flight_id']}'>" . $value['flight_id'] . "</option>";
                            }
                        ?>
                        </select>
                    </div>
                    
                    <br>
                    <button type="submit"name='get_no_passenger_by_flightno' class="btn btn-primary">Create Report</button>
                    <br>
                </form>
                <br>
            </div>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
        Given a date range, number of passengers travelling to a given destination 
        </button>
        <div class="collapse" id="dashboard-collapse">
            <div class="container ">
                <form method="post" action="include/airline_administrator_generate_report.inc.php">

                    <legend>Given a date range, number of passengers travelling to a given destination</legend>
                    <div class="mb-3">
                        <label for="destination" class="form-label">Destination</label>
                        <select  required id="Destination"name="destination2" class="form-control" placeholder="destination">
                            <option value=""selected hidden disabled style="text-align : center;align-items:center">=========select destination=========</option>
                        <?php
                            foreach ($destination as $value) {
                                echo "<option value='{$value['destination']}'>" . $value['destination'] . "</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="StartingDate" class="form-label">Starting Date</label><br>
                        <input required type="date" id="startingdate2"name="startingdate2"placeholder="starting date">
                    </div>
                    <div class="mb-6">
                        <label for="EndiningDate" class="form-label">Ending Date</label><br>
                        <input required type="date"id='endingdate2' name="endingdate2" placeholder="Ending date" >
                    </div>
                    <br>
                    <button type="submit"name='get_no_passenger_by_daterange_destination' class="btn btn-primary">Create Report</button>
                    <br>
                </form>
                <br>
            </div>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
        Given a date range, number of bookings by each passenger type
        </button>
        <div class="collapse" id="orders-collapse">
            <div class="container ">
                <form method="post" action="include/airline_administrator_generate_report.inc.php">

                    <legend>Given a date range, number of bookings by each passenger type</legend>
                    
                    <div class="mb-6">
                        <label for="StartingDate" class="form-label">Starting Date</label><br>
                        <input required type="date" id='startingdate3'name='startingdate3'placeholder="starting date">
                    </div>
                    <div class="mb-6">
                        <label for="EndiningDate" class="form-label">Ending Date</label><br>
                        <input required type="date" id='endingdate3' name='endingdate3'placeholder="Ending date">
                    </div>
                    <br>
                    <button type="submit" name='get_no_passenger_by_daterange' class="btn btn-primary">Create Report</button>

                </form>
            </div>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
        Given origin and destination, all past flights, states, passenger counts data
        </button>
        <div class="collapse" id="account-collapse">
            <div class="container ">
                <form action="include/airline_administrator_generate_report.inc.php"method="post">

                    <legend>Given origin and destination, all past flights, states, passenger counts data</legend>
                    <div class="mb-3">
                        <label for="origin" class="form-label">Origin</label>
                        
                        <select  required id="origin4"name="origin4" class="form-control" placeholder="origin">
                            <option value=""selected hidden disabled >=========select origin=========</option>
                        <?php
                            foreach ($origin as $value) {
                                echo "<option value='{$value['origin']}'>" . $value['origin'] . "</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="destination" class="form-label">Destination</label>
                        <!-- <input required type="text" id="destination4"name="destination4" class="form-control" placeholder="destination"> -->
                        <select  required id="Destination4"name="destination4" class="form-control" placeholder="destination">
                            <option value=""selected hidden disabled >=========select destination=========</option>
                        <?php
                            foreach ($destination as $value) {
                                echo "<option value='{$value['destination']}'>" . $value['destination'] . "</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary"name="flight_details_by_origin_destination">Create Report</button>
                    <br>
                </form>
            </div>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#accounts-collapse" aria-expanded="false">
        Total revenue generated by each Aircraft type
        </button>
        <div class="collapse" id="accounts-collapse">
            <div class="container ">
                <form method="post" action="include/airline_administrator_generate_report.inc.php">

                    <legend>Total revenue generated by each Aircraft type</legend>
                    <!-- <div class="mb-3">
                        <label for="aircraft" class="form-label">Aircraft</label>
                        <input required type="text" id="aircraft" class="form-control" placeholder="aircraft">
                    </div> -->
                    <div class="mb-6">
                        <label for="StartingDate" class="form-label">Starting Date</label><br>
                        <input required type="date" id="startingdate5"name='startingdate5' placeholder="starting date">
                    </div>
                    <div class="mb-6">
                        <label for="EndiningDate" class="form-label">Ending Date</label><br>
                        <input required type="date" id="endingdate5"name='endingdate5'placeholder="Ending date">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary"name='get_revenue_by_aircraft'>Create Report</button>
                    <br>
                </form>
            </div>
          
        </div>
      </li>
    </ul>
  </div>


</body>

</html>




<script type="text/javascript">
    document.getElementById('startingdate2').onchange = function () {
        document.getElementById('endingdate2').setAttribute('min',  this.value);
   };

   document.getElementById('startingdate3').onchange = function () {
        document.getElementById('endingdate3').setAttribute('min',  this.value);
   };

   document.getElementById('startingdate5').onchange = function () {
        document.getElementById('endingdate5').setAttribute('min',  this.value);
   };
</script>
