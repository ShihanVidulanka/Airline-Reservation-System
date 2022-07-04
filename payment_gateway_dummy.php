<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();
//print_array($_SESSION);
//echo $_SESSION['booking_id']['booking_id'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/gateway_dummy.css">
    <title>Payment Gateway</title>
</head>
<body>
    <div class="container">
        <h1 id="heading" class="mt-4">Sample Gateway</h1>
        <div class="wrapper p-5">
            <form action="include/payment_gateway_dummy.inc.php" method="post">


                    <div class="buttons">
                        <button class="btn btn-primary button" type="submit" name="submit" value="pay">Pay Now</button>
                        <button class="btn btn-danger button" type="submit" name="submit" value="cancel">Cancel</button>
                    </div>



            </form>
        </div>
    </div>

</body>
</html>
