<<?php 


// include_once('include/login.inc.php');
session_start();
print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="css/login.css">
    <title>Log In</title>
</head>

<body>


    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Icon -->
            <div class="fadeIn first">
                <img src="img/logo5.png" id="icon" alt="User Icon" />
            </div>

            <!-- Login Form -->
            <form method="post" action="include/login.inc.php">
                <input type="text" id="username" class="fadeIn second" name="username" placeholder="Enter Your Username">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Enther the Password">
                <input type="submit" name="login" id="submit" class="fadeIn fourth" value="Log In">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="sign_up.php">Create New Account</a>
            </div>

        </div>
    </div>
</body>

</html>