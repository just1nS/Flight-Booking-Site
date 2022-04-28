<?php
    $username = "root";
    $password = "";
    $server = "localhost";
    $dbName = "flightbooking";

    $conn = new mysqli($server, $username, $password, $dbName);

    if($conn->connect_error){
        die("Connection Failed: " . $conn->connect_error);
    }


    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $cState = $_POST['state'];
        $zip = $_POST['zip'];
        $firstName = $_POST['fName'];
        $lastName = $_POST['lName'];
    }

    
    $insertIntoUsers = "insert into users values('$user', '$pass', '$email');";
    $insertIntoBilling = "insert into billing values('$address', '$city', '$cState', '$zip', '$user', '$firstName', '$lastName');";

    $conn->query($insertIntoUsers);
    $conn->query($insertIntoBilling);
      
    $conn->close()
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>  
        <div class="sidebanner"></div>
        <div class="registration-success">
            <h1 class="registration-header">Signed Up Successfully!</h1>
            <button class="back-to-login" onclick="window.location='login.php'">Login</button>
        </div>
        <div class="blue-sidebar"></div>
        </div>
    </body>
</html>