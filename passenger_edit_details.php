<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

$errors = array();
if(isset($_SESSION['errors'])){
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
if(!(isset($_SESSION['username'])&& isset($_SESSION['account_type']))){
    header("Location: include/logout.inc.php");
}

$seat_reservation_controller = new Seat_Reservation_Controller();
$seat_reservation_controller->createRegularCustomerFromModel();
$passenger_view = new Passenger_View();
$registered_passenger = $passenger_view->getRegisteredPassenger(remove_unnessaries($_SESSION['username'],1));
// print_array($registered_passenger);

$first_name=$registered_passenger->getFirst_name();
$last_name=$registered_passenger->getLast_name();
$username=$registered_passenger->getUsername();
$dob=$registered_passenger->getDob();
$telephone_numbers=$registered_passenger->getTelephone_numbers();
$passport_number=$registered_passenger->getPassport_number();
$category=$registered_passenger->getCategory();
$email = $registered_passenger->getEmail();



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
    <link rel="stylesheet" href="css/passenger_edit_details.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Passenger Details Edit</title>
</head>
<body>

<!-- <div class="topbar mb-5">
    <h1>User Sign Up</h1>
</div> -->
<div class="container pt-3">
    <div class="wrapper p-3">
        <h1 id="heading" class="mb-4">Edit Profile</h1>

        <?php
            if(isset($_GET['error']) && strcmp($_GET['error'],"edit_successful")==0){
                echo '<div class="alert alert-success errors" role="alert">'."Successfully Edited"."</div>";
            }
            else if(isset($_GET['error']) && strcmp($_GET['error'],"edit_failed")==0){
                echo '<div class="alert alert-danger errors" role="alert">'."Edditing Process Failed"."</div>";
            }

        ?>


        <form id="signup_form" action="include/passenger_edit_details.inc.php" class="was-validated" method="post">

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
                    <input value="<?php echo $first_name ?>" required class="form-control" type="text" name="first_name" id="first_name"  placeholder="Enter User First Name">
                    <div id="first_name_val" class="m-3"></div>
                </div>
                <div class="col-sm-6">
                    <label for="last_name" class="form-label">Last Name:</label>
                    <input value="<?php echo $last_name ?>" required class="form-control" type="text" name="last_name" id="last_name" placeholder="Enter User Last Name">
                    <div id="last_name_val" class="m-3"></div>
                </div>
            </div>
            <div class="row mb-3">

                <div class="col-sm-12>
                    <label for="passport_number" class="form-label">Passport Number:</label>
                    <input value="<?php echo $passport_number?>" onchange="checkPassportNo()" required class="form-control" type="text" name="passport_number" id="passport_number" placeholder="Enter User passport Number">
                    <input type="text" name="current_passport_no" id="current_passport_no" value="<?php echo $passport_number?>" hidden>
                <div id="passport_number_val" class="m-3"></div>
                </div>
            </div>




            <div class="row mb-3">
                <div class="col-sm-6">
                    <label for="telephone" class="form-label">Telephone Number:</label>
                    <div class="input-group mb-3">
                        <input required class="form-control" type="tel" name="telephone" id="telephone" placeholder="Enter Your Telephone No:">
                        <button type="button" id="add" class="btn btn-primary btn-outline-secondry" onclick="addtelephone();">Add</button>
                    </div>
                    <div Id="telephone_val" class="m-3"></div>
                </div>
                <div class="col-sm-6">
                    <label for="telephone_numbers" class="form-label">Telephone Numbers List:</label>
                    <div class="row">
                        <div class="col-sm-8">
                            <select name="" id="telephone_numbers_list" class="form-control" multiple>

                                <?php
                                foreach ($telephone_numbers as $telephone_number) {
                                        echo "<option>".$telephone_number."</option>";
                                    }
                                ?>

                            </select>
                        </div>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-primary" onclick="remove_tp()">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="text" id="telephone_numbers" class="form-control"  name="telephone_numbers" hidden>


            <div class="row mb-3">
                <div class="col-sm-6">
                    <label for="dob" class="form-label">Date Of Birth:</label>
                    <input value="<?php echo $dob ?>" required class="form-control" type="date" name="dob" id="dob" placeholder="Enter Your Date Of Birth:">
                    <div Id="dob_val" class="m-3"></div>
                </div>
                <div class="col-sm-6">
                    <label for="email" class="form-label">Email:</label>
                    <input value="<?php echo $email?>" class="form-control" type="email" name="email" id="email" placeholder="Enter Your Email Addressemail:">
                    <div Id="email_val" class="m-3"></div>
                </div>
            </div>
             <input type="text" name="submit_" value="submit" hidden>

            <div class="btn-group">
                <a href="change_password.php" class="btn btn-primary buttons">Change Password</a>
                <button onclick="checkAll();" type="button" class="btn btn-primary buttons" value="Edit">Edit</button>
                <a class="btn btn-primary buttons" href="passenger_home.php">Back</a>
            </div>

        </form>
    </div>

</div>

<script src="js/passenger_edit_details.js"></script>

</body>
</html>