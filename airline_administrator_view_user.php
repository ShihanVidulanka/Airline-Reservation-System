<?php

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

if (!isset($_SESSION['ID'])) {
    header("Location: login.php");
    return;
}

// search for flight dispatcher
if (isset($_GET['fd_search'])) {
    $fd_search = $_GET['fd_search'];
} else {
    $fd_search = '';
}

// search for operations agent
if (isset($_GET['oa_search'])) {
    $oa_search = $_GET['oa_search'];
} else {
    $oa_search = '';
}

// $oa_search = '';
// if (isset($_GET['oa_search'])) {
//     $search = $_GET['oa_search'];
// }
// print_r($oa_search);

$controller = new Airline_Administrator_Controller();
$fd_details = $controller->get_flight_dispatcher_details($fd_search);
$oa_details = $controller->get_operations_agent_details($oa_search);
$fd_previous_user_id = "";
$oa_previous_user_id = "";

// print_array($fd_details);
// echo count($fd_details);
// for ($i = 0; $i < count($fd_details); $i++) {
//     echo "<pre>";
//     echo $fd_details[$i]['user_id'];
//     echo $fd_details[$i]['username'];
//     echo $fd_details[$i]['account_no'];
//     echo $fd_details[$i]['airport_code'];
//     echo $fd_details[$i]['phone_no'];
//     for ($j = $i; $j < count($fd_details) - 1; $j++) {
//         if ($fd_details[$j]['user_id'] == $fd_details[$j + 1]['user_id']) {
//             echo $fd_details[$j + 1]['phone_no'];
//         } else {
//             $i = $j;
//             break;
//         }
//     }

//     echo "</pre>";
// }
// print_array($oa_details);


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
    <link rel="stylesheet" href="css/airline_administrator_view_user.css">
    <title>View User</title>
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
                        <a class="nav-link active" href="airline_administrator_view_user.php">View User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="airline_administrator_add_new_airplane.php">Add New Airplane</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="airline_administrator_add_new_airport.php">Add New Flight</a>
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

    <div class="container p-3">
        <FORM STYLE="padding-left:5px" id="topics">
            <INPUT TYPE="radio" NAME="RadioGroupName" ID="GroupName1" ONCLICK="ShowRadioButtonDiv('GroupName', 3)" />View Flight Dispatcher<BR>
            <INPUT TYPE="radio" NAME="RadioGroupName" ID="GroupName2" ONCLICK="ShowRadioButtonDiv('GroupName', 3)" />View Operations Agent<BR>
        </FORM>

        <DIV ID="GroupName1Div">
            <div class="wrapper p-3">
                <h1 id="heading" class="mb-4">Flight Dispatchers</h1>
                <form class="form-inline flex-container" action="airline_administrator_view_user.php" method="get">
                    <div class="row">
                        <div class="type col-sm-9">
                            <input class="form-control flex-child" name="fd_search" type="search" placeholder="Search by Id, Name, etc." aria-label="Search" value="<?php echo $fd_search; ?>" autofocus>
                        </div>

                        <div class="search col-sm-3">
                            <button class="btn btn-light flex-child" type="submit">Refresh</button>
                        </div>
                    </div>
                    
                </form>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Account No</th>
                            <th>Airport Code</th>
                            <th>Telephone No(s)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < count($fd_details); $i++) {
                            if ($fd_previous_user_id != $fd_details[$i]['user_id']) { ?>
                                <tr>
                                    <td><?php echo $fd_details[$i]['user_id'] ?></td>
                                    <td><?php echo $fd_details[$i]['username'] ?></td>
                                    <td><?php echo $fd_details[$i]['account_no'] ?></td>
                                    <td><?php echo $fd_details[$i]['airport_code'] ?></td>
                                    <td>
                                        <a href="tel: <?php $fd_details[$i]['phone_no'] ?>">
                                            <?php
                                            echo $fd_details[$i]['phone_no']; ?>
                                        </a>
                                        <?php
                                        for ($j = $i; $j < count($fd_details) - 1; $j++) {
                                            if ($fd_details[$j]['user_id'] == $fd_details[$j + 1]['user_id']) {
                                                echo "<br>"; ?>
                                                <a href="tel: <?php $fd_details[$j + 1]['phone_no'] ?>">
                                                    <?php
                                                    echo $fd_details[$j + 1]['phone_no']; ?>
                                                </a>
                                        <?php
                                            } else {
                                                $i = $j;
                                                break;
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>
                        <?php
                                $fd_previous_user_id = $fd_details[$i]['user_id'];
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </DIV>
        <DIV ID="GroupName2Div" STYLE="display:none;">
            <div class="wrapper p-3">
                <h1 id="heading" class="mb-4">Operations Agents</h1>
                <form class="form-inline" action="airline_administrator_view_user.php" method="get">
                    <div class="type col-sm-9">
                        <input class="form-control mr-sm-2" name="oa_search" type="search" placeholder="Search by Id, Name, etc." aria-label="Search" value="<?php echo $oa_search; ?>" autofocus>
                    </div>

                    <div class="search ml-1 col-sm-2">
                        <button class="btn btn-light my-sm-0" type="submit"><a href="airline_administrator_view_user.php">Refresh</a></button>
                    </div>
                </form>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Account No</th>
                            <th>Airport Code</th>
                            <th>Telephone No(s)</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        for ($i = 0; $i < count($oa_details); $i++) {
                            if ($oa_previous_user_id != $oa_details[$i]['user_id']) { ?>
                                <tr>
                                    <td><?php echo $oa_details[$i]['user_id'] ?></td>
                                    <td><?php echo $oa_details[$i]['username'] ?></td>
                                    <td><?php echo $oa_details[$i]['account_no'] ?></td>
                                    <td><?php echo $oa_details[$i]['airport_code'] ?></td>
                                    <td>
                                        <a href="tel: <?php $oa_details[$i]['phone_no'] ?>">
                                            <?php
                                            echo $oa_details[$i]['phone_no']; ?>
                                        </a>
                                        <?php
                                        for ($j = $i; $j < count($oa_details) - 1; $j++) {
                                            if ($oa_details[$j]['user_id'] == $oa_details[$j + 1]['user_id']) {
                                                echo "<br>"; ?>
                                                <a href="tel: <?php $oa_details[$j + 1]['phone_no'] ?>">
                                                    <?php
                                                    echo $oa_details[$j + 1]['phone_no']; ?>
                                                </a>
                                        <?php
                                            } else {
                                                $i = $j;
                                                break;
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>
                        <?php
                                $oa_previous_user_id = $oa_details[$i]['user_id'];
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </DIV>
    </div>
    <script src="js/admin_view_user.js"></script>


</body>

</html>