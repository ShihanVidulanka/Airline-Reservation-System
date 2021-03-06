<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";


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
    <link rel="stylesheet" href="css/forget_password.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Change Password</title>
</head>
<body>

<div class="container pt-5">
    <div class="wrapper p-3">
        <h1 id="heading" class="mb-4">Change Password</h1>

        <?php
        if(isset($_GET['error'])&& strcmp($_GET['error'],"verification_failed")==0){
            echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
            Incorrect Verifiction code!!!
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
          </div>";
        }else if(isset($_GET['error'])&& strcmp($_GET['error'],"invalid_username")==0){
            echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
            Invalid Username!!!
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
          </div>";
        }

        ?>


        <form id="signup_form" action="include/forget_password.inc.php" class="was-validated" method="post">
            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="username" class="form-label" >Username:</label>
                    <input required class="form-control" type="text" name="username" id="username" placeholder="Enter User Username">
                    <div Id="username_val" class="m-3"></div>
                </div>
            </div>

            <div class="btn-group">

                <button type="submit" class="btn btn-primary buttons" name="submit" value="send">Send Varification Mail</button>
                <a class="btn btn-primary buttons" href="login.php">Back</a>
            </div>

        </form>
    </div>

</div>

<script src="js/change_password.js"></script>

</body>
</html>