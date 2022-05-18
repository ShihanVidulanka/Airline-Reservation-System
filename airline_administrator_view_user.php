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
}
else{
    $fd_search = '';
}

// search for operations agent
if (isset($_GET['oa_search'])) {
    $oa_search = $_GET['oa_search'];
}
else{
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
    <!-- <link rel="stylesheet" href="css/airline_administrator_view_user.css"> -->
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
                </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="include/logout.inc.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container p-3">
        <FORM STYLE="padding-left:5px">
            <!-- <INPUT TYPE="radio" NAME="RadioGroupName" ID="GroupName1" ONCLICK="ShowRadioButtonDiv('GroupName', 3)" />View Airline Administrator<BR> -->
            <INPUT TYPE="radio" NAME="RadioGroupName" ID="GroupName1" ONCLICK="ShowRadioButtonDiv('GroupName', 3)" />View Flight Dispatcher<BR>
            <INPUT TYPE="radio" NAME="RadioGroupName" ID="GroupName2" ONCLICK="ShowRadioButtonDiv('GroupName', 3)" />View Operations Agent<BR>
        </FORM>

        <DIV ID="GroupName1Div" STYLE="display:none;">
            <div class="wrapper p-3">
                <h1 id="heading" class="mb-4">Flight Dispatchers</h1>
                <form class="form-inline" action="airline_administrator_view_user.php" method="get">
                    <div class="type">
                        <input class="form-control mr-sm-2" name="fd_search" type="search" placeholder="Search by Id, Name, etc." aria-label="Search" value="<?php echo $fd_search; ?>" autofocus>
                    </div>

                    <div class="search">
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
                        foreach ($fd_details as $fd) { ?>
                            <tr>
                                <td><?php echo $fd['user_id'] ?></td>
                                <td><?php echo $fd['username'] ?></td>
                                <td><?php echo $fd['account_no'] ?></td>
                                <td><?php echo $fd['airport_code'] ?></td>
                                <td><?php echo $fd['phone_no'] ?></td>
                            </tr>
                        <?php
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
                    <div class="type">
                        <input class="form-control mr-sm-2" name="oa_search" type="search" placeholder="Search by Id, Name, etc." aria-label="Search" value="<?php echo $oa_search; ?>" autofocus>
                    </div>

                    <div class="search mt-1">
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
                        foreach ($oa_details as $oa) { ?>
                            <tr>
                                <td><?php echo $oa['user_id'] ?></td>
                                <td><?php echo $oa['username'] ?></td>
                                <td><?php echo $oa['account_no'] ?></td>
                                <td><?php echo $oa['airport_code'] ?></td>
                                <td><?php echo $oa['phone_no'] ?></td>
                            </tr>
                        <?php
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