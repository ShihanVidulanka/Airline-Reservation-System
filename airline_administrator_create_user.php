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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/airline_administrator_create_user.css">
    <title>Create User</title>
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
                        <a class="nav-link" href="airline_administrator_generate_report.php">Generate Reports</Details></a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="airline_administrator_create_user.php">Create User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="airline_administrator_view_user.php">View User</a>
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

    <!-- create a form  -->
    <div class="container p-3">
        <FORM STYLE="padding-left:5px">
            <INPUT TYPE="radio" NAME="RadioGroupName" ID="GroupName1" ONCLICK="ShowRadioButtonDiv('GroupName', 3)" />Add New Airline Administrator<BR>
            <INPUT TYPE="radio" NAME="RadioGroupName" ID="GroupName2" ONCLICK="ShowRadioButtonDiv('GroupName', 3)" />Add New Flight Dispatcher<BR>
            <INPUT TYPE="radio" NAME="RadioGroupName" ID="GroupName3" ONCLICK="ShowRadioButtonDiv('GroupName', 3)" />Add New Operations Agent<BR>
        </FORM>

        <DIV ID="GroupName1Div" STYLE="display:none;">
            <div class="container pt-5">
                <div class="wrapper p-3">
                    <h1 id="heading" class="mb-4">New Airline Administrator</h1>
                    <form action="" class="was-validated">
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <label for="plane" class="form-label">Name</label>
                                <input required class="form-control" type="text" name="plane" id="plane" placeholder="Enter User Name:">
                                <div class="valid-feedback">Valid Name</div>
                                <div class="invalid-feedback">Invalid Name</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4" id="aa_p">
                                <label for="plane" class="form-label">Phone Number</label>
                                <input required class="form-control" type="text" name="plane" id="plane" placeholder="Enter Phone Number:" value="" />
                                <div class="valid-feedback">Valid Number</div>
                                <div class="invalid-feedback">Invalid Number</div>
                                <a href="javascript:void(0);" class="add_button_aa" title="Add field"><img src="img/add_icon.png" /></a>
                            </div>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-primary buttons">Create</button>
                            <!-- <button class="btn btn-primary buttons">Exit</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </DIV>
        <DIV ID="GroupName2Div" STYLE="display:none;">
            <div class="container pt-5">
                <div class="wrapper p-3">
                    <h1 id="heading" class="mb-4">New Flight Dispatcher</h1>
                    <form action="" class="was-validated">
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <label for="plane" class="form-label">Name</label>
                                <input required class="form-control" type="text" name="plane" id="plane" placeholder="Enter User Name:">
                                <div class="valid-feedback">Valid Name</div>
                                <div class="invalid-feedback">Invalid Name</div>
                            </div>

                            <div class="col-sm-4">
                                <label for="plane" class="form-label">Airport Code</label>
                                <input required class="form-control" type="text" name="plane" id="plane" placeholder="Enter Airport Code:">
                                <div class="valid-feedback">Valid Airport Code</div>
                                <div class="invalid-feedback">Invalid Airport Code</div>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4" id="fd_p">
                                <label for="plane" class="form-label">Phone Number</label>
                                <input required class="form-control" type="text" name="plane" id="plane" placeholder="Enter Phone Number:">
                                <div class="valid-feedback">Valid Number</div>
                                <div class="invalid-feedback">Invalid Number</div>
                                <a href="javascript:void(0);" class="add_button_fd" title="Add field"><img src="img/add_icon.png" /></a>
                            </div>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-primary buttons">Create</button>
                            <!-- <button class="btn btn-primary buttons">Exit</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </DIV>
        <DIV ID="GroupName3Div" STYLE="display:none;">
            <div class="container pt-5">
                <div class="wrapper p-3">
                    <h1 id="heading" class="mb-4">New Operations Agent</h1>
                    <form action="" class="was-validated">
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <label for="plane" class="form-label">Name</label>
                                <input required class="form-control" type="text" name="plane" id="plane" placeholder="Enter User Name:">
                                <div class="valid-feedback">Valid Name</div>
                                <div class="invalid-feedback">Invalid Name</div>
                            </div>

                            <div class="col-sm-4">
                                <label for="plane" class="form-label">Airport Code</label>
                                <input required class="form-control" type="text" name="plane" id="plane" placeholder="Enter Airport Code:">
                                <div class="valid-feedback">Valid Airport Code</div>
                                <div class="invalid-feedback">Invalid Airport Code</div>
                            </div>

                            <div class="col-sm-4">
                                <label for="plane" class="form-label">State</label>
                                <input required class="form-control" type="text" name="plane" id="plane" placeholder="Enter State:">
                                <div class="valid-feedback">Valid State</div>
                                <div class="invalid-feedback">Invalid State</div>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4" id="oa_p">
                                <label for="plane" class="form-label">Phone Number</label>
                                <input required class="form-control" type="text" name="plane" id="plane" placeholder="Enter Phone Number:">
                                <div class="valid-feedback">Valid Number</div>
                                <div class="invalid-feedback">Invalid Number</div>
                                <a href="javascript:void(0);" class="add_button_oa" title="Add field"><img src="img/add_icon.png" /></a>
                            </div>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-primary buttons">Create</button>
                            <!-- <button class="btn btn-primary buttons">Exit</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </DIV>
    </div>
    <script src="js/admin_create_user.js"></script>
</body>

</html>