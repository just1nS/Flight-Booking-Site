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
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $cState = $_POST['state'];
        $zip = $_POST['zip'];
        $firstName = $_POST['fName'];
        $lastName = $_POST['lName'];
    }

    
    $insertIntoUsers = "INSERT INTO users VALUES('$username', '$pass', '$email');";
    $insertIntoBilling = "INSERT INTO billing VALUES('$address', '$city', '$cState', '$zip', '$username', '$firstName', '$lastName');";

    $conn->query($insertIntoUsers);
    $conn->query($insertIntoBilling);
      
    $conn->close()
?>