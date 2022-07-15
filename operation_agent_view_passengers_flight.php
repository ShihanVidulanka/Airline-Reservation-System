<?php

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

if (!isset($_SESSION['ID'])) {
    header("Location: login.php");
    return;
}
$operation_agent_view = new Operation_Agent_View();
$arrived_flight_details = $operation_agent_view->arrivedFlightDetails();
$departure_flight_details = $operation_agent_view->departureFlightDetails();



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
    <link rel="stylesheet" href="css/operation_agent_view_passengers_flight_details.css">
    <title>Operation Agent View Passengers flight</title>
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
                        <a class="nav-link" href="operation_agent_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="operation_agent_view_passengers_flight.php">Flight Details</Details></a>

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




    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>Arrived Flights</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Flight Id</th>
                            <th scope="col">Origin</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Depature time</th>
                            <th scope="col">Departure date</th>
                            <th scope="col">View </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($arrived_flight_details  as $value) {
                            echo '<tr>';
                            echo '<td>' . $value['id'] . "</td>";
                            echo '<td>' . $value['origin'] . "</td>";
                            echo '<td>' . $value['destination'] . "</td>";
                            echo '<td>' . $value['departure_time'] . "</td>";
                            echo '<td>' . $value['departure_date'] . "</td>";
                            echo "<td><a class=\"btn btn-sm btn-info\" href=\"include/operation_agent_view_passengers_flight.inc.php?id_o={$value['id']}&origin={$value['origin']}&destination={$value['destination']}&departure_time={$value['departure_time']}&departure_date={$value['departure_date']}\">view</a></td>";
                            echo '</tr>';
                        }
                        ?>
                    </tbody>

                </table>
            </div>




            <div class="col-lg-6">
                <h3>Departure Flights</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Flight Id</th>
                            <th scope="col">Origin</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Depature time</th>
                            <th scope="col">Departure date</th>
                            <th scope="col">View </th>
                        </tr>
                    </thead>



                    <?php
                    foreach ($departure_flight_details  as $value) {
                        '<tbody>';

                        echo '<tr>';
                        echo '<td>' . $value['id'] . "</td>";
                        echo '<td>' . $value['origin'] . "</td>";
                        echo '<td>' . $value['destination'] . "</td>";
                        echo '<td>' . $value['departure_time'] . "</td>";
                        echo '<td>' . $value['departure_date'] . "</td>";
                        echo "<td><a class=\"btn btn-sm btn-info\" href=\"include/operation_agent_view_passengers_flight.inc.php?id_o={$value['id']}&origin={$value['origin']}&destination={$value['destination']}&departure_time={$value['departure_time']}&departure_date={$value['departure_date']}\">view</a></td>";
                        echo '</tr>';
                        '</tbody>';
                    }
                    ?>




                </table>
            </div>
        </div>
    </div>
    <div>
</body>

</html>