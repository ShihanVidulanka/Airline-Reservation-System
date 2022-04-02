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
    <link rel="stylesheet" href="css/operation_agent_view_passenger.css">
    <title>Operation Agent View Passenger</title>
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
                        <a class="nav-link" href="operation_agent_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="operation_agent_view_passenger.php">Passenger Details</Details></a>
                    
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
   
    <div class="container xxl">
        <div class="wrapper ">
        <h1>Passengers</h1>
        
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">NO</th>
                <th scope="col">First NAME</th>
                <th scope="col">Last NAME</th>
                <th scope="col">PASSPORT ID</th>
                <th scope="col">DESTINATION</th>
                <th scope="col">VIEW</th>
                <th scope="col">DELETE </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                    <td>Sahan</td>
                    <td>Caldera</td>
                    <td>@mdo</td>
                    <td>colombo</td>
                    <td><button type="button" class="btn btn-info">View</button></td>
                    <td><button type="button" class="btn btn-danger"onclick="document.getElementById('id01').style.display='block'">Delete</button></td>
                    
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Shihan</td>
                    <td>Vidukanka</td>
                    <td>@fat</td>
                    <td>japan</td>
                    <td><button type="button" class="btn btn-info">View</button></td>
                    <td><button type="button" class="btn btn-danger"onclick="document.getElementById('id01').style.display='block'">Delete</button></td>
                    
                </tr>
                <tr>
                <th scope="row">3</th>
                    <td>Sathira</td>
                    <td>liyanapathirana</td>
                    <td>@twitter</td>
                    <td>india</td>
                    <td><button type="button" class="btn btn-info">View</button></td>
                    <td><button type="button" class="btn btn-danger"onclick="document.getElementById('id01').style.display='block'">Delete</button></td>
                    
                </tr>
                <tr>
                <th scope="row">1</th>
                    <td>Harshani </td>
                    <td>Bandara</td>
                    <td>@mdo</td>
                    <td>colombo</td>
                    <td><button type="button" class="btn btn-info">View</button></td>
                    <td><button type="button" class="btn btn-danger"onclick="document.getElementById('id01').style.display='block'">Delete</button></td>
                    
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>japan</td>
                    <td><button type="button" class="btn btn-info">View</button></td>
                    <td><button type="button" class="btn btn-danger"onclick="document.getElementById('id01').style.display='block'">Delete</button></td>
                    
                </tr>
                <tr>
                <th scope="row">3</th>
                    <td>Larry</td>
                    <td>theek</td>
                    <td>@twitter</td>
                    <td>india</td>
                    <td><button type="button" class="btn btn-info">View</button></td>

                    <td><button type="button" class="btn btn-danger"onclick="document.getElementById('id01').style.display='block'">Delete</button></td>
                    
                </tr>
            </tbody>
        </table>
        </div>
    </div>   
<!--pop up delete confirm-->
    <div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    <form class="modal-content" action="/action_page.php">
        <div class="container">
        <h1>Delete Account</h1>
        <p>Are you sure you want to delete your account?</p>

        <div class="clearfix">
            <button type="button" class="cancelbtn">Cancel</button>
            <button type="button" class="deletebtn">Delete</button>
        </div>
        </div>
    </form>
    </div>   

</body>

</html>

<script>
// Get the  delete modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>