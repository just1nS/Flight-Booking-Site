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
    $insertIntoBilling = "insert into billing values('$address', '$city', '$cState', '$zip', '$username', '$firstName', '$lastName');";

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
        <div>
            <div>
                <h2>Signed Up Successfully!</h2>
            </div>
            <div>
                <button onclick="window.location='login.html'">LOGIN NOW</button>
            </div>
        </div>
    </body>
</html>