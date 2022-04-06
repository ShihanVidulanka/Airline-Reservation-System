<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

if (!isset($_SESSION['ID'])) {
    header("Location: login.php");
    return;
}
$operation_agent_view = new Operation_Agent_View();
$arrived_flight_details =$operation_agent_view->arrivedFlightDetails();
$departure_flight_details=$operation_agent_view->departureFlightDetails();



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
                        <a class="nav-link active" href="operation_agent_view_passengers_flight.php">Passenger Details</Details></a>
                    
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
                    <?php foreach ($arrived_flight_details as $value) {
                    ?>

                    <tbody>
                        <tr>
                        <th scope="row"><?php echo $value['id']?></th>
                            <td><?php echo $value['origin']?></td>
                            <td><?php echo $value['destination']?></td>
                            <td><?php echo $value['departure_time']?></td>
                            <td><?php echo $value['departure_date']?></td>
                            <td><button type="button" class="btn btn-info">View</button></td>
                            
                        </tr>
                    </tbody><?php } ?>
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
                        <?php foreach ($departure_flight_details as $value){?>
                        <tbody>
                            <tr>
                            <th scope="row"><?php echo $value['id']?></th>
                                
                                <td><?php echo $value['origin']?></td>
                                <td><?php echo $value['destination']?></td>
                                <td><?php echo $value['departure_time']?></td>
                                <td><?php echo $value['departure_date']?></td>
                                <td><button type="button" class="btn btn-info">View </button></td>
                                
                            </tr>
                        </tbody>
                        <?php }?>
                    </table>
            </div>
            </div>
        </div>
    <div>
</body>

</html>
