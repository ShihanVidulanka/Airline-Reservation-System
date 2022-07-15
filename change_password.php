<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

$reset_condition = false;
if(isset($_SESSION['resetCondition'])){
    $reset_condition=true;
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
    <link rel="stylesheet" href="css/passenger_edit_details.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Change Password</title>
</head>
<body>

<div class="container pt-3">
    <div class="wrapper p-3">
        <h1 id="heading" class="mb-4">Change Password</h1>

        <?php
        if(isset($_GET['error']) && strcmp($_GET['error'],"edit_successful")==0){
            echo '<div class="alert alert-success errors" role="alert">'."Successfully Edited"."</div>";
        }
        else if(isset($_GET['error']) && strcmp($_GET['error'],"edit_failed")==0){
            echo '<div class="alert alert-danger errors" role="alert">'."Edditing Process Failed"."</div>";
        }

        ?>


        <form id="signup_form" action="include/change_password.inc.php" class="was-validated" method="post">
            <?php
                if(!$reset_condition){
                    echo "
                        <div class=\"row mb-3\">
                            <div class=\"col-sm-12\">
                                <label for=\"current_password\" class=\"form-label\">Current Password:</label>
                                <div class=\"input-group mb-3\">
                                    <input required class=\"form-control\" type=\"password\" name=\"current_password\" id=\"current_password\" placeholder=\"Enter Current Password\">
                                    <button type=\"button\"  class=\"btn btn-primary\" onclick=\"togglepassword('current_password')\">
                                        <i class=\"fa fa-eye\"></i>
                                    </button>
                                </div>
                                <div Id=\"current_password_val\" class=\"m-3\"></div>
                            </div>
                        </div>
                    ";
                }
            ?>

            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="password" class="form-label">New Password:</label>
                    <div class="input-group mb-3">
                        <input required class="form-control" type="password" name="password" id="password" placeholder="Enter New Password">
                        <button type="button"  class="btn btn-primary" onclick="togglepassword('password')">
                            <i class="fa fa-eye"></i>
                        </button>
                    </div>
                    <div Id="password_val" class="m-3"></div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="password" class="form-label">Retype Password:</label>
                    <div class="input-group mb-3">
                        <input required class="form-control" type="password" name="retypepwd" id="retypepwd" placeholder="Enter New Password Again">
                        <button type="button" class="btn btn-primary" onclick="togglepassword('retypepwd')">
                            <i class="fa fa-eye"></i>
                        </button>
                    </div>
                    <div Id="retypepassword_val" class="m-3"></div>
                </div>
            </div>

    <div class="btn-group">

        <button onclick="checkAll();" type="button" class="btn btn-primary buttons" value="Edit">Change</button>

        <?php
            $location = "";
            if(isset($_SESSION['account_type'])){
                $userTypeVal=$_SESSION['account_type'];
                switch ($userTypeVal) { // Complete this wthen users are done
                    case '0':
                        $location="airline_administrator_home.php";
                        break;
                    case '1':
                        $location="operation_agent_home.php";
                        break;
                    case '2':
                        $location="flight_dispatcher_home.php";
                        break;
                    case '3':
                        $location="passenger_home.php";
                        break;
                    default:
                        $location="login.php";
                        break;
                }
            }else{
                $location="login.php";
            }

        ?>

        <a class="btn btn-primary buttons" href="<?php echo $location ?>">Back</a>
    </div>

    </form>
</div>

</div>

<script src="js/change_password.js"></script>

</body>
</html>