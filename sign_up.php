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
    <div class="container pt-3">
        <div class="wrapper p-3">
            <h1 id="heading" class="mb-4">Sign Up</h1>
            <form id="signup_form" action="include/signup.inc.php" class="was-validated" method="post">

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
                        <label for="username" class="form-label" >Username:</label>
                        <input onchange="checkUserName();" required class="form-control" type="text" name="username" id="username" placeholder="Enter User Username">
                        <div Id="username_val" class="m-3"></div>
                    </div>
                    <div class="col-sm-6">
                        <label for="passport_number" class="form-label">Passport Number:</label>
                        <input onchange="checkPassportNo()" required class="form-control" type="text" name="passport_number" id="passport_number" placeholder="Enter User passport Number">
                        <div Id="passport_number_val" class="m-3"></div>
                    </div>
                </div>
                
            
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="password" class="form-label">Password:</label>
                        <input required class="form-control" type="text" name="password" id="password" placeholder="Enter User Password">
                        <div Id="password_val" class="m-3"></div>
                    </div>
                    <div class="col-sm-6">
                        <label for="password" class="form-label">Retype Password:</label>
                        <input required class="form-control" type="text" name="retypepwd" id="retypepwd" placeholder="Enter User Password">
                        <div Id="retypepassword_val" class="m-3"></div>
                    </div>
                </div>
                <!-- <div class="row mb-3">
                    <div class="col-sm-12">
                        <label for="address" class="form-label">Address:</label>
                        <textarea required class="form-control"  name="address" id="address" placeholder="Enter Your Address:"></textarea>
                        <div Id="address_val" class="m-3"></div>
                    </div>
                </div> -->

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
                    <select name="" id="telephone_numbers_list" class="form-control" multiple disabled></select>
                    </div>
                </div>
                <input type="text" id="telephone_numbers" class="form-control" hidden name="telephone_numbers">


                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="dob" class="form-label">Date Of Birth:</label>
                        <input required class="form-control" type="date" name="dob" id="dob" placeholder="Enter Your Date Of Birth:">
                        <div Id="dob_val" class="m-3"></div>
                    </div>
                    <div class="col-sm-6">

                        <label for="email" class="form-label">Email:</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="Enter Your Email Addressemail:">
                        <div Id="email_val" class="m-3"></div>


                    </div>
                </div>
                <!-- <input type="text" name="submit_" value="submit" hidden> -->
                
                <div class="btn-group">
                    <button onclick="checkAll();" type="button" class="btn btn-primary buttons" value="Sign Up">Sign Up</button>
                    <a class="btn btn-primary buttons" href="login.php">Exit</a>
                </div>
            </form>
        </div>
        
    </div>

    <script src="js/signup.js"></script>
    
</body>
</html>