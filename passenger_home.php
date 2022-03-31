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
            <h1 id="heading" class="mb-4">Welcome Passenger!</h1>

            <div class="row mb-3">
                <div class="col-sm-4">
                    <p>Account Number</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-6">
                    <p>RP-190097J</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-4">
                    <p>NIC Number</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-6">
                    <p>200001801361</p>
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
                    <p>Sahan Caldera</p>
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
                    <p>22</p>
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
                    <p>123456789</p>
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
                    <p>Platinum</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-4">
                    <p>State</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-6">
                    <p>Colombo</p>
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
                    <p>0718949089</p>
                </div>
            </div>

        </div>

    </div>
</body>

</html>