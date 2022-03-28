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
  <link rel="stylesheet" href="css/add_new_flight.css">
  <title>Add New Airport</title>
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
            <a class="nav-link" href="flight_dispatcher_home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="flight_dispatcher_flight_details.php">Flight Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="flight_dispatcher_add_new_flight.php">Add New Flight</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="flight_dispatcher_add_new_destination.php">Add New Airport</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container pt-5">
    <div class="wrapper p-3">
      <h1 id="heading" class="mb-4">Add New Airport</h1>
      <form action="" class="was-validated">
        <div class="row mb-3">
          <div class="col-sm-12">
            <label for="plane" class="form-label">Airport Code</label>
            <input required class="form-control" type="text" name="plane" id="plane" placeholder="Enter Plane ID:">
            <div class="valid-feedback">Valid Plane ID</div>
            <div class="invalid-feedback">Invalid Plane ID</div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-4">
            <label for="destination" class="form-label">Country:</label>
            <input required class="form-control" type="text" name="plane" id="plane" placeholder="Enter Country:">
            <div class="valid-feedback">Valid Destination</div>
            <div class="invalid-feedback">Invalid Destination</div>
          </div>
          <div class="col-sm-4">
            <label for="destination" class="form-label">Province:</label>
            <input required class="form-control" type="text" name="plane" id="plane" placeholder="Enter Province:">
            <div class="valid-feedback">Valid Destination</div>
            <div class="invalid-feedback">Invalid Destination</div>
          </div>
          <div class="col-sm-4">
            <label for="destination" class="form-label">City:</label>
            <input required class="form-control" type="text" name="plane" id="plane" placeholder="Enter City:">
            <div class="valid-feedback">Valid Destination</div>
            <div class="invalid-feedback">Invalid Destination</div>
          </div>
        </div>

        <div class="btn-group">
          <button class="btn btn-primary buttons">Create</button>
          <button class="btn btn-primary buttons">Exit</button>
        </div>
      </form>
    </div>

  </div>

</body>

</html>