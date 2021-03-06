<<?php

    session_start();
    if (isset($_GET['error'])) {

        if ($_GET['error'] == "emptyfield") {
            $text = "Emplty field exist!!";
        } else if ($_GET['error'] == "UserNotFound1" || $_GET['error'] == "UserNotFound2" || $_GET['error'] == "UserNotFound3" || $_GET['error'] == "UserNotFound4" || $_GET['error'] == "WrongPassword") {
            $text = "Username or Password is incorrect!!";
        } else if ($_GET['error'] == "ConnectionFails" || $_GET['error'] == "ConnectionFail2" || $_GET['error'] == "ConnectionFail3") {
            $text = "Connection Failed!!";
        }else if(strcmp($_GET['error'],"change_successful")==0){
            $text="Password Changed Successfully!!!";
        }else if(strcmp($_GET['error'],"change_unsuccessful")==0){
            $text="Password Changing Failed!!!";
        }
    }
    ?> <!DOCTYPE html>

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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Log In</title>
    </head>

    <body>
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <!-- Icon -->
                <div class="fadeIn first">
                    <img src="img/logo5.png" id="icon" alt="User Icon" />
                </div>

                <!-- error -->
                <?php
                if (isset($text)) {
                    echo "<div class='errorTag'>";
                    echo "<p>".$text."</p>";
                    echo "</div>";
                } 
                    
                ?>
                


                <!-- Login Form -->
                <form method="post" action="include/login.inc.php">
                    <div class="row">
                        <input type="text" id="username" class="fadeIn second" name="username" placeholder="Enter Your Username">
                    </div>
                    <div class="row">
                        <input type="password" id="password" class="fadeIn third" name="password" placeholder="Enter the Password" />
                        <i class="bi bi-eye-fill fadeIn third" id="togglePassword"></i>
                    </div>
                    <input type="submit" name="login" id="submit" class="fadeIn fourth" value="Log In"><br>
                    <a href="forget_password.php">Forget Password?</a>
                </form>

                <!-- Remind Passowrd -->
                <div id="formFooter">
                    <a class="underlineHover" href="sign_up.php">Create New Account</a><br>
                    <a class="underlineHover" href="index.php">Back to Main Page</a>


                </div>

            </div>
        </div>

        <script>
            const togglePassword = document.querySelector('#togglePassword');

            const password = document.querySelector('#password');

            togglePassword.addEventListener('click', () => {

                // Toggle the type attribute using
                // getAttribure() method
                const type = password
                    .getAttribute('type') === 'password' ?
                    'text' : 'password';

                password.setAttribute('type', type);

                // Toggle the eye and bi-eye icon
                this.classList.toggle('bi-eye');


            });
        </script>
    </body>

    </html>