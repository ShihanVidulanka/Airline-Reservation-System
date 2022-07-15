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
    <link rel="stylesheet" href="css/reset_verification.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Change Password</title>
</head>
<body>

<div class="container pt-3">
    <div class="wrapper p-3">
        <h1 id="heading" class="mb-4">Change Password</h1>



        <form id="signup_form" action="include/reset_verification.inc.php" class="was-validated" method="post">

            <div class="alert alert-info errors" role="alert">
                Please Check your email for verification code!!!<br>
                <div class="timer" id="timer"></div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="verification" class="form-label" >Verification Code:</label>
                    <input required class="form-control" type="text" name="verification" id="verification" placeholder="Enter the Verification Code">
                    <div Id="verification_val" class="m-3"></div>
                </div>
            </div>

            <div class="btn-group">

                <button type="submit" class="btn btn-primary buttons" name="submit" value="send">Send Varification Mail</button>
                <a class="btn btn-primary buttons" href="forget_password.php">Back</a>
            </div>

        </form>
    </div>

</div>

<script src="js/reset_password.js"></script>

</body>
</html>