<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";
    // print_array($_SESSION);
    $seat_reservation_controller = new Seat_Reservation_Controller();
    $seat_reservation_controller->createRegularCustomerFromModel();
    $passenger_view = new Passenger_View();
    $registered_passenger = $passenger_view->getRegisteredPassenger(remove_unnessaries($_SESSION['username'],1));
    // print_array($registered_passenger);

    $first_name=$registered_passenger->getFirst_name();
    $last_name=$registered_passenger->getLast_name();
    $full_name = $first_name." ".$last_name;
    $username=$registered_passenger->getUsername();
    $dob=$registered_passenger->getDob();
    $telephone_numbers=$registered_passenger->getTelephone_numbers();
    $passport_number=$registered_passenger->getPassport_number();
    $category=$registered_passenger->getCategory();
    $email = $registered_passenger->getEmail();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/passenger_home.css">
    <title>Passenger Home</title>
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
                        <a class="nav-link active" href="passenger_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="passenger_flight_booking.php">Flight Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="passenger_booking_details.php">Booking Details</a>
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
            <h1 id="heading" class="mb-4">Welcome <?php echo $first_name;?>!</h1>

            <div class="row mb-3">
                <div class="col-sm-4">
                    <p>User Name</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-6">
                    <p><?php echo $username;?></p>
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
                    <p><?php echo $full_name;?></p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-4">
                    <p>Passport Number</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-6">
                    <p><?php echo $passport_number;?></p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-4">
                    <p>Age</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-6">
                    <?php
                    $timezoneId = 'Asia/Jayapura';
                    date_default_timezone_set($timezoneId);
                    $today = date("Y-m-d");
                    $age=date_diff(date_create($dob), date_create($today));
                    ?>
                    <p><?php echo $age->format('%y')?></p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-4">
                    <p>Passport Number</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-6">
                    <p><?php echo $passport_number; ?></p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-4">
                    <p>Category</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-6">
                    <?php
                        if($category==1){
                          echo "
                            <p>Regular Passenger</p>
                          ";
                        }else{
                            echo "
                            <p>General Passenger</p>
                          ";
                        }
                    ?>


                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-4">
                    <p>Telephone</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-6">
                    <?php
                        foreach ($telephone_numbers as $tpno) {
                            echo "<p>".$tpno."</p>";
                        }
                    ?>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-4">
                    <label for="plane" class="form-label">Email</label>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-6">
                    <p><?php echo $email;?></p>
                </div>
            </div>

        </div>

    </div>
</body>

</html>