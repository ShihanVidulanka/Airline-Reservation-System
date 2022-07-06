<?php
// session_start();
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
session_start();
$errors = array();
if(isset($_SESSION['errors'])){
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}

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
    <link rel="stylesheet" href="css/user_sign_up.css">
    <title>User Sign Up</title>
</head>
<body>
    
    <!-- <div class="topbar mb-5">
        <h1>User Sign Up</h1>
    </div> -->
    <div class="container  pt-5 mt-5">
        <div class="wrapper p-3 pb-4">
            <h1 id="heading" class="mb-4">Sign Up</h1>
            <form id="guest_details" action="include/guest_details_form.inc.php" class="was-validated" method="post">

                    <?php
                        if(!empty($errors)){
                            echo '<div class="alert alert-danger errors" role="alert">';
                            foreach ($errors as $error) {
                                echo " <p>".$error."</P>";
                            }
                            echo "</div>";
                        }
                    ?>
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="first_name" class="form-label" >First Name:</label>
                        <input required class="form-control" type="text" name="first_name" id="first_name"  placeholder="Enter User First Name">
                        <div id="first_name_val" class="m-3"></div>
                    </div>
                    <div class="col-sm-6">
                        <label for="last_name" class="form-label">Last Name:</label>
                        <input required class="form-control" type="text" name="last_name" id="last_name" placeholder="Enter User Last Name">
                        <div id="last_name_val" class="m-3"></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="passport_number" class="form-label">Passport Number:</label>
                        <input onchange="checkPassportNo()" required class="form-control" type="text" name="passport_number" id="passport_number" placeholder="Enter User passport Number">
                        <div Id="passport_number_val" class="m-3"></div>
                    </div>
                    <div class="col-sm-6">
                        <label for="dob" class="form-label">Date Of Birth:</label>
                        <input required class="form-control" type="date" name="dob" id="dob" placeholder="Enter Your Date Of Birth:">
                        <div Id="dob_val" class="m-3"></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="telephone" class="form-label">Telephone Number:</label>
                        <input required class="form-control" type="tel" name="telephone" id="telephone" placeholder="Enter Your Telephone No:">
                        <div Id="telephone_val" class="m-3"></div>
                    </div>
                </div>                
                <div class="btn-group">
                    <button onclick="checkAll();" type="Submit" class="btn btn-primary buttons" name="Submit" value="Submit">Submit</button>
                    <a class="btn btn-primary buttons" href="main_page.php">Cancel</a>
                </div>
            </form>
        </div>
        
    </div>

    <script src="js/guest_details.js"></script>
    
</body>
</html>