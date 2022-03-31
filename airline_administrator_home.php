<?php

// require_once $_SERVER['DOCUMENT_ROOT']."Airline-Reservation-System/include/autoloader.inc.php";
// require_once $_SERVER['DOCUMENT_ROOT']."Airline-Reservation-System/include/additional.inc.php";

// session_start();

// if (!isset($_SESSION['ID'])) {
//     header("Location: login.php");
//     return;
// }
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
    <link rel="stylesheet" href="css/flight_dispatcher_home.css">
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
                        <a class="nav-link active" href="airline_administrator_home.php">Home</a>
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
                    <p>19568-DEF</p>
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
                    <p>Admin</p>
                </div>
            </div>



            <div class="row mb-3">
                <div class="col-sm-4">
                    <label for="plane" class="form-label">Phone Number</label>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-6">
                    <p>0719955178</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-4">
                    <label for="plane" class="form-label">user id</label>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-6">
                    <p>admin-001</p>
                </div>
            </div>

        </div>

    </div>
    </table>






</body>

</html>