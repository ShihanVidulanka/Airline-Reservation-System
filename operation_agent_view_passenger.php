<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

if (!isset($_SESSION['ID'])) {
    header("Location: login.php");
    return;
}
if(isset($_SESSION['flight_id'])){
    // echo $_SESSION['flight_id'];
    // echo '<br>';
    // echo $_SESSION['origin'];
    // echo '<br>';
    // echo $_SESSION['destination'];
    $operation_agent_view=new Operation_Agent_View();
    $passengers_details_of_flight= $operation_agent_view->showPassengers($_SESSION['flight_id']);
    // foreach ($passengers_details_of_flight  as $value) {
    //     echo '<tr>';
    //     echo '<td>' . $value['flight_id'] . "</td>";
    //     echo '<td>' . $value['passenger_id'] . "</td>";
    //     echo '<td>' . $value['booking_time'] . "</td>";
    //     echo '<td>' . $value['first_name'] . "</td>";
    //     echo '<td>' . $value['last_name'] . "</td>";
    //     echo "<td><a class=\"btn btn-sm btn-info\" href=\"include/operation_agent_delete_passenger.inc.php?id_o={$value['first_name']}\">DELETE</a></td>";
    //     echo '</tr>';
    // }
}


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
   
    <link rel="stylesheet" href="css/operation_agent_view_passengers_flight_details.css">  <title>Operation Agent View Passenger</title>
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
   
    <div class="container xxl">
        <div class="col-sm-12" style="align-self: center;align-items:center">
            <h1>Passengers of Flight No <?php echo $_SESSION['flight_id'];?></h1>
            <div class="wrapper p-3"style="align-self: center">
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <p>Flight Id</p>
                    </div>
                    <div class="col-sm-2">
                        <p>:</p>
                    </div>
                    <div class="col-sm-3">
                        <p><?php echo $_SESSION['flight_id'];?></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <p>Origin</p>
                    </div>
                    <div class="col-sm-2">
                        <p>:</p>
                    </div>
                    <div class="col-sm-3">
                        <p><?php echo $_SESSION['origin'];?></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <p>Destination</p>
                    </div>
                    <div class="col-sm-2">
                        <p>:</p>
                    </div>
                    <div class="col-sm-3">
                        <p><?php echo $_SESSION['destination'];?></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <p>Departure Date</p>
                    </div>
                    <div class="col-sm-2">
                        <p>:</p>
                    </div>
                    <div class="col-sm-3">
                        <p><?php echo $_SESSION['departure_date'];?></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <p>Departure Time</p>
                    </div>
                    <div class="col-sm-2">
                        <p>:</p>
                    </div>
                    <div class="col-sm-3">
                        <p><?php echo $_SESSION['departure_time'];?></p>
                    </div>
                </div>

        </div>
        <div class="container-fluid">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">PASSENGER ID</th>
                <th scope="col">FIRST NAME</th>
                <th scope="col">LAST NAME</th>
                <th scope="col">PASSPORT ID</th>
                <th scope="col">BOOKING TIME</th>
                <th scope="col">DATE OF BIRTH</th>
                
                
                <th scope="col">DELETE PASSENGER</th>
                </tr>
            </thead>
            <tbody>
                <tr><th scope="row">Registered Passengers</th></tr>
                <?php
            foreach ($passengers_details_of_flight  as $value) {
                echo '<tr>';
                // echo '<td>' . $value['flight_id'] . "</td>";
                echo '<td>' . $value['passenger_id'] . "</td>";
                
                echo '<td>' . $value['first_name'] . "</td>";
                echo '<td>' . $value['last_name'] . "</td>";
                echo '<td>' . $value['passport_number'] . "</td>";
                echo '<td>' . $value['booking_time'] . "</td>";
                echo '<td>' . $value['dob'] . "</td>";
                echo "<td><a class=\"btn btn-sm btn-info\" href=\"include/operation_agent_remove_passenger.inc.php?passenger_id={$value['passenger_id']}\">DELETE</a></td>";
                echo '</tr>';
                
            }?>
                <tr><th scope="row">Guests</th></tr>
                <tr>
                <th scope="row">1</th>
                <td>Sahan</td>
                <td>Caldera</td>
                <td>@mdo</td>
                <td>colombo</td>
                <td><button type="button" class="btn btn-info">View</button></td>
                <td><button type="button" class="btn btn-danger"onclick="document.getElementById('id01').style.display='block'">Delete</button></td>
                
                </tr>
                
                <tr>
                <th scope="row">3</th>
                    <td>Larry</td>
                    <td>theek</td>
                    <td>@twitter</td>
                    <td>india</td>
                    <td><button type="button" class="btn btn-info">View</button></td>

                    <td><button type="button" class="btn btn-danger"onclick="document.getElementById('id01').style.display='block'">Delete</button></td>
                    
                </tr>
            </tbody>
        </table>
        </div>
        </div>
    </div>
    
    
    











<!--pop up delete confirm-->
    <div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    <form class="modal-content" action="/action_page.php">
        <div class="container">
        <h1>Delete Account</h1>
        <p>Are you sure you want to delete your account?</p>

        <div class="clearfix">
            <button type="button" class="cancelbtn">Cancel</button>
            <button type="button" class="deletebtn">Delete</button>
        </div>
        </div>
    </form>
    </div>   



    
</body>

</html>

<script>
// Get the  delete modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>