<?php

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

if (!isset($_SESSION['ID'])) {
    header("Location: login.php");
    return;
}

$view = new Airline_Administrator_View();

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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>AView Generated Report</title>
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
                        <a class="nav-link" href="airline_administrator_generate_report.php">Generate Reports</Details></a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="airline_administrator_create_user.php">Create User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="airline_administrator_view_user.php">View User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="airline_administrator_add_new_airplane.php">Add New Airplane</a>
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
            <h1 id="heading" class="mb-4">Report</h1>
            <?php 
                 echo $_POST['case'];
                // print_array( $_GET['output']);
             ?>
             <?php
                    $age = $_POST['CourseID'];
                    echo $age;
                    echo$_POST['CourseID2'];
                    echo$_POST['CourseID3'];
                    // foreach($age as $x => $x_value) {
                    // echo "Key=" . $x . ", Value=" . $x_value;
                    // echo "<br>";
// }
?>


            <div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>

                
            
        </div>

    </div>

    

</body>

</html>
<script>
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['Contry', 'Mhl'],
                ['Italy',54.8],
                ['France',48.6],
                ['Spain',44.4],
                ['USA',23.9],
                ['Argentina',14.5]
                ]);

                var options = {
                title:'World Wide Wine Production'
                };

                var chart = new google.visualization.PieChart(document.getElementById('myChart'));
                chart.draw(data, options);
                }
</script>