<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

if (!isset($_SESSION['ID'])) {
    header("Location: login.php");
    return;
}
//echo $_SESSION['ID'];
$operation_agent_view = new Operation_Agent_View();
$details = $operation_agent_view->getHomeDetails();

$name=$details['first_name']." ".$details['second_name'];
$user_name=$details['username'];
$user_id=$details['ID'];
$airport_name=$details['airport_name'];
$tp=$details['telephone_numbers'];
//echo $name;

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
    <link rel="stylesheet" href="css/operation_agent_view_passenger.css">
    <title>Operation Agent Home</title>
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
                        <a class="nav-link active" href="operation_agent_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="operation_agent_view_passenger.php">Passenger Details</Details></a>
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
            <h1 id="heading" class="mb-4">Home</h1>

            <div class="row mb-3">
                <div class="col-sm-4">
                    <p>Account Number</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-6">
                    <p><?php echo $user_id;?></p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-4">
                    <p>Name</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-6">
                    <p><?php echo $name;?></p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-4">
                    <p>User Name</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-6">
                    <p><?php echo $user_name;?></p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-4">
                    <label for="plane" class="form-label">Phone Numbers</label>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-6">
                    <p><?php echo $tp;?></p>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-sm-4">
                    <label for="plane" class="form-label">Aiport name</label>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-6">
                    <p><?php echo $airport_name;?></p>
                </div>
            </div>

        </div>

    </div>
    </table>
    

       

   

</body>

</html>