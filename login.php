<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Login</title>
    </head>
    <body class="login-background-image">
        <div class="login-background">
            <div class="login-form">
                <h1><b>Login</b></h1>
                <form action="/loginValidation.php" method="post" id="loginForm">
                    <input type="text" id="username" name="username" placeholder="Username"><br>
                    <?php if(isset($_SESSION["loginerror"])){echo "<div class=\"loginErrorMessage\">* Incorrect username or password</div>";} ?>
                    <input type="password" id="password" name="password" placeholder="Password"><br>
                    <?php if(isset($_SESSION["loginerror"])){echo "<div class=\"loginErrorMessage\">* Incorrect username or password</div>";} ?>
                    <button class="login-button" type="submit">Log In</button>
                </form>
                <hr>
                <div class="newUserText">
                    New User? <a class="register-button" href="sign-up.html"><b>Sign Up</b></a>
                </div>
            </div>
        </div>
    </body>
</html>