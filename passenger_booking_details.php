<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/flight_details.css">
    <title>Booking Details</title>
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
                        <a class="nav-link" href="passenger_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="passenger_flight_booking.php">Flight Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="passenger_booking_details.php">Booking Details</a>
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

        <div class="search">
            <form class="d-flex mb-3">
                <input class="form-control me-2" type="text" placeholder="Search Your Flight" />
                <button class="btn btn-primary" type="button">Search</button>
            </form>
        </div>

        <div class="wrapper p-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Air Plane NO</th>
                        <th>Origine</th>
                        <th>Destination</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Book</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>A310</td>
                        <td>U.S.A.</td>
                        <td>U.K.</td>
                        <td>$100</td>
                        <td>13-02-2022</td>
                        <td>08:00 a.m.</td>
                        <td><button class="btn btn-danger">Cancel this Flight</button></td>
                    </tr>
                    <tr>
                        <td>B310</td>
                        <td>Japan</td>
                        <td>U.K.</td>
                        <td>$100</td>
                        <td>13-02-2022</td>
                        <td>08:00 a.m.</td>
                        <td><button class="btn btn-danger">Cancel this Flight</button></td>
                    </tr>
                    <tr>
                        <td>C310</td>
                        <td>China</td>
                        <td>U.K.</td>
                        <td>$100</td>
                        <td>13-02-2022</td>
                        <td>08:00 a.m.</td>
                        <td><button class="btn btn-danger">Cancel this Flight</button></td>
                    </tr>
                    <tr>
                        <td>D310</td>
                        <td>Japan</td>
                        <td>U.K.</td>
                        <td>$100</td>
                        <td>13-02-2022</td>
                        <td>08:00 a.m.</td>
                        <td><button class="btn btn-danger">Cancel this Flight</button></td>
                    </tr>
                    <tr>
                        <td>D320</td>
                        <td>Japan</td>
                        <td>U.K.</td>
                        <td>$400</td>
                        <td>14-02-2022</td>
                        <td>08:00 a.m.</td>
                        <td><button class="btn btn-danger">Cancel this Flight</button></td>
                    </tr>
                    <tr>
                        <td>D330</td>
                        <td>India</td>
                        <td>U.K.</td>
                        <td>$200</td>
                        <td>13-02-2022</td>
                        <td>08:00 a.m.</td>
                        <td><button class="btn btn-danger">Cancel this Flight</button></td>
                    </tr>
                    <tr>
                        <td>D310</td>
                        <td>New Zealand</td>
                        <td>U.K.</td>
                        <td>$400</td>
                        <td>13-02-2022</td>
                        <td>08:00 a.m.</td>
                        <td><button class="btn btn-danger">Cancel this Flight</button></td>
                    </tr>


                </tbody>
            </table>

        </div>

    </div>
</body>

</html>