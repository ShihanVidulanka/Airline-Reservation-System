<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";

session_start();

if (!isset($_SESSION['ID'])) {
    header("Location: login.php");
    return;
}

$errors = array();
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
// print_array($errors)
$controller = new Airline_Administrator_Controller();
$destinations = $controller->get_all_airports();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/airline_administrator_create_user.css">
    <title>Create User</title>
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
                        <a class="nav-link active" href="airline_administrator_create_user.php">Create User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="airline_administrator_view_user.php">View User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="airline_administrator_add_new_airplane.php">Add New Airplane</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
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

    <!-- create a form  -->
    <div class="container p-3">
        <form STYLE="padding-left:5px" id="topics">
            <input TYPE="radio" NAME="RadioGroupName" ID="GroupName1" ONCLICK="ShowRadioButtonDiv('GroupName', 2)" />Add New Flight Dispatcher<br>
            <input TYPE="radio" NAME="RadioGroupName" ID="GroupName2" ONCLICK="ShowRadioButtonDiv('GroupName', 2)" />Add New Operations Agent<br>
        </FORM>

        <div ID="GroupName1Div" STYLE="display:none;">
            <div class="container pt-5">
                <div class="wrapper p-3">
                    <h1 id="heading" class="mb-4">New Flight Dispatcher</h1>
                    <form class="was-validated" id="fd_signup_form" action="include/create_flight_dispatcher.inc.php" method="POST">
                        <?php
                        if (!empty($errors)) {
                            echo '<div class="alert alert-danger errors" role="alert">';
                            foreach ($errors as $error) {
                                echo " <p>" . $error . "</P>";
                            }
                            echo "</div>";
                        }
                        ?>
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <label for="fd_first_name" class="form-label">First Name</label>
                                <input required class="form-control" type="text" name="fd_first_name" id="fd_first_name" placeholder="Enter User First Name:">
                                <div id="fd_first_name_val" class="m-3"></div>
                            </div>
                            <div class="col-sm-4">
                                <label for="fd_last_name" class="form-label">Last Name</label>
                                <input required class="form-control" type="text" name="fd_last_name" id="fd_last_name" placeholder="Enter User Last Name:">
                                <div id="fd_last_name_val" class="m-3"></div>
                            </div>
                            <div class="col-sm-4">
                                <label for="fd_username" class="form-label">Username</label>
                                <input required class="form-control" type="text" name="fd_username" id="fd_username" placeholder="Enter Username:">
                                <div Id="fd_username_val" class="m-3"></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label for="fd_email" class="form-label">Email</label>
                                <input required class="form-control" type="text" name="fd_email" id="fd_email" placeholder="Enter Email:">
                                <div Id="fd_email_val" class="m-3"></div>
                            </div>
                            <div class="col-sm-6">
                                <label for="plane" class="form-label">Airport Code</label>
                                <!-- <input required class="form-control" type="text" name="fd_airport_code" id="fd_airport_code" placeholder="Enter Airport Code:"> -->
                                <select required class="form-control me-2" name="fd_airport_code" id="fd_airport_code">

                                    <option value="all">Select an Airport</option>
                                    <?php
                                    foreach ($destinations as $destination) {
                                        $option = $destination['airport_code'] . '-' . $destination['name'] . '-' . $destination['country'];
                                        // $option = $destination['airport_code'];
                                        echo '<option value="' . $destination['airport_code'] . '">' . $option . '</option>';
                                    }
                                    ?>
                                </select>
                                <div id="fd_airport_code_val" class="m-3"></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label for="fd_telephone" class="form-label">Telephone Number:</label>
                                <div class="input-group mb-3">
                                    <input required class="form-control" type="tel" name="fd_user_id" id="fd_telephone" placeholder="Enter Your Telephone No:">
                                    <button type="button" id="fd_add" class="btn btn-primary btn-outline-secondry" onclick="fd_addTelephone();">Add</button>
                                </div>
                                <div Id="fd_telephone_val" class="m-3"></div>
                            </div>
                            <div class="col-sm-6">
                                <label for="fd_telephone_numbers" class="form-label">Telephone Numbers List:</label>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <select name="" id="fd_telephone_numbers_list" class="form-control" multiple></select>
                                    </div>
                                    <div class="col-sm-4">
                                        <button class="btn btn-primary" onclick="fd_remove_telephone()">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="text" id="fd_telephone_numbers" class="form-control" name="fd_telephone_numbers" hidden>
                        <div class="btn-group">
                            <button onclick="fd_checkAll();" type="button" class="btn btn-primary buttons" value="fd_create">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div ID="GroupName2Div" STYLE="display:none;">
            <div class="container pt-5">
                <div class="wrapper p-3">
                    <h1 id="heading" class="mb-4">New Operations Agent</h1>
                    <form class="was-validated" id="oa_signup_form" action="include/create_operations_agent.inc.php" method="POST">
                        <?php
                        if (!empty($errors)) {
                            echo '<div class="alert alert-danger errors" role="alert">';
                            foreach ($errors as $error) {
                                echo " <p>" . $error . "</P>";
                            }
                            echo "</div>";
                        }
                        ?>
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <label for="oa_first_name" class="form-label">First Name</label>
                                <input required class="form-control" type="text" name="oa_first_name" id="oa_first_name" placeholder="Enter User Name:">
                                <div id="oa_first_name_val" class="m-3"></div>
                            </div>

                            <div class="col-sm-4">
                                <label for="oa_last_name" class="form-label">Last Name</label>
                                <input required class="form-control" type="text" name="oa_last_name" id="oa_last_name" placeholder="Enter User Last Name:">
                                <div id="oa_last_name_val" class="m-3"></div>
                            </div>
                            <div class="col-sm-4">
                                <label for="oa_username" class="form-label">Username</label>
                                <input required class="form-control" type="text" name="oa_username" id="oa_username" placeholder="Enter Username:">
                                <div id="oa_username_val" class="m-3"></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label for="oa_email" class="form-label">Email</label>
                                <input required class="form-control" type="text" name="oa_email" id="oa_email" placeholder="Enter Email:">
                                <div Id="oa_email_val" class="m-3"></div>
                            </div>
                            <div class="col-sm-6">
                                <label for="airport_code" class="form-label">Airport Code</label>
                                <!-- <input required class="form-control" type="text" name="oa_airport_code" id="oa_airport_code" placeholder="Enter Airport Code:"> -->
                                <select required class="form-control me-2" name="oa_airport_code" id="oa_airport_code">

                                    <option value="all">Select an Airport</option>
                                    <?php
                                    foreach ($destinations as $destination) {
                                        $option = $destination['airport_code'] . '-' . $destination['name'] . '-' . $destination['country'];
                                        // $option = $destination['airport_code'];
                                        echo '<option value="' . $destination['airport_code'] . '">' . $option . '</option>';
                                    }
                                    ?>
                                </select>
                                <div id="oa_airport_code_val" class="m-3"></div>
                            </div>

                            <!-- <div class="col-sm-4">
                                <label for="state" class="form-label">State</label>
                                <input required class="form-control" type="text" name="state" id="state" placeholder="Enter State:">
                                <div id="state_val" class="m-3"></div>
                            </div> -->
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label for="oa_telephone" class="form-label">Telephone Number:</label>
                                <div class="input-group mb-3">
                                    <input required class="form-control" type="tel" name="oa_user_id" id="oa_telephone" placeholder="Enter Your Telephone No:">
                                    <button type="button" id="oa_add" class="btn btn-primary btn-outline-secondry" onclick="oa_addTelephone();">Add</button>
                                </div>
                                <div Id="oa_telephone_val" class="m-3"></div>
                            </div>
                            <div class="col-sm-6">
                                <label for="oa_telephone_numbers" class="form-label">Telephone Numbers List:</label>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <select name="" id="oa_telephone_numbers_list" class="form-control" multiple></select>
                                    </div>
                                    <div class="col-sm-4">
                                        <button class="btn btn-primary" onclick="oa_remove_telephone()">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="text" id="oa_telephone_numbers" class="form-control" hidden name="oa_telephone_numbers">
                        <div class="btn-group">
                            <button onclick="oa_checkAll();" type="submit" class="btn btn-primary buttons" value="oa_create">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/admin_create_user.js"></script>
    <script src="js/create_fd_user.js"></script>
    <script src="js/create_oa_user.js"></script>


</body>

</html>