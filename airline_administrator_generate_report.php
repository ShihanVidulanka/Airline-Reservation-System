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
    <link rel="stylesheet" href="css/operation_agent_home.css">
    <title>Home</title>
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
                        <a class="nav-link active " href="airline_administrator_generate_report.php">Generate Reports</Details></a>
                    
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=""></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=""></a>
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
   
    
    <FORM STYLE="padding-left:5px">
        <INPUT TYPE="checkbox" ID="BoxName1" ONCLICK="ShowCheckboxDiv('BoxName', 3)"/>Report of Number of Passengers in Given Flight<BR>
        <DIV ID="BoxName1Div" STYLE="display:none;">
            <div class="container my-3 border">
                    <form>
                   
                        <legend>Get Number of passengers in Flight</legend>
                        <div class="mb-3">
                        <label for="FlightNumber" class="form-label">Flight Number</label>
                        <input type="text" id="FlightNumber" class="form-control" placeholder="Flight Number">
                        </div>
                        
                        <br>
                        <button type="submit" class="btn btn-primary">Create Report</button>
                        <BUTTON ONCLICK="ShowAndHide()">Click me</BUTTON>
                        <DIV ID="SectionName" STYLE="display:none">Text to be shown and hidden</DIV>
                    </form>
            </div>
        </DIV>
        <INPUT TYPE="checkbox" ID="BoxName2" ONCLICK="ShowCheckboxDiv('BoxName', 3)"/>Report Number of passengers to given destination<BR>
        <DIV ID="BoxName2Div" STYLE="display:none;">
            <div class="container my-3 border">
                <form>
                
                    <legend>Get Number of passengers to given destination</legend>
                    <div class="mb-3">
                    <label for="destination" class="form-label">Destination</label>
                    <input type="text" id="FlightNumber" class="form-control" placeholder="destination">
                    </div>
                    <div class="mb-6">
                    <label for="StartingDate" class="form-label">Starting Date</label><br>
                    <input type="date" placeholder="starting date">
                    </div>
                    <div class="mb-6">
                    <label for="EndiningDate" class="form-label">Ending Date</label><br>
                    <input type="date" placeholder="Ending date">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Create Report</button>
                
                </form>
            </div>
        </DIV>
        <INPUT TYPE="checkbox" ID="BoxName3" ONCLICK="ShowCheckboxDiv('BoxName', 3)"/>Report Number of passengers in Given Date Range<BR>
        <DIV ID="BoxName3Div" STYLE="display:none;">
            <div class="container my-3 border">
                <form>
                
                    <legend>Get Number of passengers in Given Date Range</legend>
                    <div class="mb-6">
                        <label for="StartingDate" class="form-label">Starting Date</label><br>
                        <input type="date" placeholder="starting date">
                    </div>
                    <div class="mb-6">
                        <label for="EndiningDate" class="form-label">Ending Date</label><br>
                        <input type="date" placeholder="Ending date">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Create Report</button>
                
                </form>
            </div>
    </DIV> 
    </FORM>
    
    
      

        

</body>

</html>
<SCRIPT>
function ShowCheckboxDiv (IdBaseName, NumberOfBoxes) {
    for (x=1;x<=NumberOfBoxes;x++) {
        CheckThisBox = IdBaseName + x;
        BoxDiv = IdBaseName + x +'Div';
    if (document.getElementById(CheckThisBox).checked) {
        document.getElementById(BoxDiv).style.display = "block";
        }
    else {
        
        document.getElementById(BoxDiv).style.display = "none";
        }
    }
    return false;
}

function ShowAndHide() {
    var x = document.getElementById('SectionName');
    if (x.style.display == 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
</SCRIPT>