<?php

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

if (!isset($_SESSION['ID'])) {
    header("Location: login.php");
    return;
}

$view = new Flight_Dispatcher_View();

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

    <title>Add New Airplane</title>
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
                        <a class="nav-link " href="flight_dispatcher_flight_details.php?show=none">Flight Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="flight_dispatcher_add_new_flight.php">Add New Flight</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="flight_dispatcher_add_new_airport.php">Add New Airport</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="flight_dispatcher_add_new_airplane.php">Add New Airplane</a>
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

    <div class="container pt-5">
        <div class="wrapper p-3">

            <?php
            if (isset($_GET['error'])) {
                $view->showError($_GET['error']);
            }
            ?>

            <h1 id="heading" class="mb-4">Add New Airport</h1>
            <form action="include/flight_dispatcher_add_new_airplane.inc.php" method="POST">

                <div class="row mb-3">

                    <div class="col-sm-6">
                        <label for="plane" class="form-label">Airplane Tail No.</label>
                        <input required class="form-control" type="text" name="tail_no" placeholder="Enter Airplane Tail No.">
                    </div>

                    <div class="col-sm-6">
                        <label for="model" class="form-label">Model:</label>
                        <select required name="model" class="form-control" id="model">
                            <option value="" selected disabled hidden>---Select the Model---</option>
                            <option value="Boeing 737">Boeing 737</option>
                            <option value="Boeing 757">Boeing 757</option>
                            <option value="Airbus A380">Airbus A380</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">

                    

                    <div class="col-sm-4">
                        <label for="destination" class="form-label">No. of Platinum Seats</label>
                        <input required class="form-control" type="text" name="no_platinum_seats" placeholder="Enter No. of Platinum Seats">
                    </div>

                    <div class="col-sm-4">
                        <label for="destination" class="form-label">No. of Platinum Seats</label>
                        <input required class="form-control" type="text" name="no_economy_seats" placeholder="Enter No. of Economy Seats">
                    </div>

                    <div class="col-sm-4">
                        <label for="destination" class="form-label">No. of Platinum Seats</label>
                        <input required class="form-control" type="text" name="no_business_seats" placeholder="Enter No. of Business Seats">
                    </div>

                </div>

                <div class="btn-group">
                    <button class="btn btn-primary buttons" type="submit" name='submit'>Add</button>
                </div>
            </form>
        </div>

    </div>

</body>

</html>