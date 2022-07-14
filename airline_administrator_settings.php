<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

session_start();

//if (!isset($_SESSION['ID'])) {
//    header("Location: login.php?");
//    return;
//}
$airline_administrator_settings_controller = new Airline_Administrator_Settings_Controller();
$details = $airline_administrator_settings_controller->getSettingsDetails();
$booking_count = $details['booking_count'];
$discount = $details['discount'];
$url = $details['url']



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
    <link rel="stylesheet" href="css/airline_administrator_settings.css">



    <title>Settings</title>
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
                    <a class="nav-link" href="airline_administrator_add_new_airplane.php">Add New Airplane</a>
                </li>

            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="airline_administrator_settings.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
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

    <div class="wrapper">
        <h1 id="heading">Regular Customer settings</h1>

        <form method="post" class="form-horizontal p-3" action="include/airline_administrator_settings.inc.php">

            <?php
            if(isset($_GET['error']) && strcmp($_GET['error'],"zerocount")==0){
                echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">Invalid Details!!!<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                  </div>";
            }else if(isset($_GET['error']) && strcmp($_GET['error'],"success")==0){
                echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">Successfully changed!!!<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                  </div>";
            }

            ?>


            <div class="form-group mb-3">
                <label class="control-label" for="booking_count">Booking Count:</label>
                <input name="booking_count" value="<?php echo $booking_count?>" type="text" class="form-control" id="booking_count" placeholder="Enter Booking count to be regular customer">
            </div>
            <div class="form-group mb-3">
                <label class="control-label" for="discount">Discount:</label>
                <input name="discount" value="<?php echo $discount?>" type="text" class="form-control" id="discount" placeholder="Enter Discount of regular customer">
            </div>
            <div class="form-group mb-3">
                <label class="control-label" for="url">URL of email:</label>
                <input name="url" value="<?php echo $url?>" type="text" class="form-control" id="url" placeholder="Enter URL of email">
            </div>

            <div class="form-group">
                <div class="buttons">
                    <button type="submit"  name="submit" class="btn btn-primary button">Set</button>
                </div>
            </div>
        </form>
    </div>


</div>







</body>

</html>