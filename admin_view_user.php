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
    <link rel="stylesheet" href="css/admin_view_user.css">
    <title>View User</title>
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
                        <a class="nav-link" href="admin_home_page.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_create_user.php">Create User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="admin_view_user.php">View User</a>
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

    <div class="container p-3">
        <FORM STYLE="padding-left:5px">
            <INPUT TYPE="radio" NAME="RadioGroupName" ID="GroupName1" ONCLICK="ShowRadioButtonDiv('GroupName', 3)" />View Airline Administrator<BR>
            <INPUT TYPE="radio" NAME="RadioGroupName" ID="GroupName2" ONCLICK="ShowRadioButtonDiv('GroupName', 3)" />View Flight Dispatcher<BR>
            <INPUT TYPE="radio" NAME="RadioGroupName" ID="GroupName3" ONCLICK="ShowRadioButtonDiv('GroupName', 3)" />View Operations Agent<BR>
        </FORM>

        <DIV ID="GroupName1Div" STYLE="display:none;">
            <div class="wrapper p-3">
                <h1 id="heading" class="mb-4">Airline Administrators</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Account No</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </DIV>
        <DIV ID="GroupName2Div" STYLE="display:none;">
            <div class="wrapper p-3">
            <h1 id="heading" class="mb-4">Flight Dispatchers</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Account No</th>
                            <th>Name</th>
                            <th>Airport Code</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </DIV>
        <DIV ID="GroupName3Div" STYLE="display:none;">
            <div class="wrapper p-3">
            <h1 id="heading" class="mb-4">Operations Agents</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Account No</th>
                            <th>Name</th>
                            <th>Airport Code</th>
                            <th>State</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </DIV>
    </div>
    <script src="js/admin_view_user.js"></script>


</body>

</html>