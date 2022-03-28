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
  <link rel="stylesheet" href="css/flight_dispatcher_add_new_flight.css">
  <title>Add New Flight</title>
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
            <a class="nav-link active" href="flight_dispatcher_add_new_flight.php">Add New Flight</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="flight_dispatcher_add_new_destination.php">Add New Airport</a>
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
      <h1 id="heading" class="mb-4">Add New Flight</h1>
      <form action="" class="was-validated">
        <div class="row mb-3">
          <div class="col-sm-4">
            <label for="plane" class="form-label">Plane ID</label>
            <input required class="form-control" type="text" name="plane" id="plane" placeholder="Enter User Plane ID:">
            <div class="valid-feedback">Valid Plane ID</div>
            <div class="invalid-feedback">Invalid Plane ID</div>
          </div>
          <div class="col-sm-4">
            <label for="destination" class="form-label">Origin:</label>
            <select required class="form-control" name="" id="">
              <option value="">Select the Origine</option>
              <option value="">Country 01</option>
              <option value="">Country 02</option>
            </select>
            <div class="valid-feedback">Valid Destination</div>
            <div class="invalid-feedback">Invalid Destination</div>
          </div>
          <div class="col-sm-4">
            <label for="destination" class="form-label">Destination:</label>
            <select required class="form-control" name="" id="">
              <option value="">Select the Destination</option>
              <option value="">Country 01</option>
              <option value="">Country 02</option>
            </select>
            <div class="valid-feedback">Valid Destination</div>
            <div class="invalid-feedback">Invalid Destination</div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-sm-4">
            <label for="telephone" class="form-label">Economy Price:</label>
            <input required class="form-control" type="text" name="time" id="telephone" placeholder="Enter Time:">
            <div class="valid-feedback">Valid Price</div>
            <div class="invalid-feedback">Invalid Price</div>
          </div>
          <div class="col-sm-4">
            <label for="telephone" class="form-label">Business Price:</label>
            <input required class="form-control" type="text" name="time" id="telephone" placeholder="Enter Time:">
            <div class="valid-feedback">Valid Price</div>
            <div class="invalid-feedback">Invalid Price</div>
          </div>
          <div class="col-sm-4">
            <label for="telephone" class="form-label">Platinum Price:</label>
            <input required class="form-control" type="text" name="time" id="telephone" placeholder="Enter Time:">
            <div class="valid-feedback">Valid Price</div>
            <div class="invalid-feedback">Invalid Price</div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-sm-6">
            <label for="date" class="form-label">Date:</label>
            <input required class="form-control" type="date" name="date" id="date" placeholder="Enter Date:">
            <div class="valid-feedback">Valid Date</div>
            <div class="invalid-feedback">Invalid Date</div>
          </div>
          <div class="col-sm-6">
            <label for="telephone" class="form-label">Time:</label>
            <input required class="form-control" type="time" name="time" id="telephone" placeholder="Enter Time:">
            <div class="valid-feedback">Valid Time</div>
            <div class="invalid-feedback">Invalid Timer</div>
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