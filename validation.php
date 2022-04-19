<?php
    $username = "root";
    $password = "";
    $server = "localhost";
    $dbName = "flightbooking";

    $conn = new mysqli($server, $username, $password, $dbName);

    if($conn->connect_error){
        die("Connection Failed: " . $conn->connection_error);
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
    }

    $result = $conn->query("select pass from users where username='$username'");

    $checkPassword = $result->fetch_assoc();

    if($password == $checkPassword['pass']){
        echo "Login Successful";
    }
    else{
        echo "Login Failed";
    }

    $conn->close();
    
?>