<?php
    session_start();

    $username = "root";
    $password = "";
    $server = "localhost";
    $dbName = "flightbooking";

    $conn = new mysqli($server, $username, $password, $dbName);

    if($conn->connect_error){
        die("Connection Failed: " . $conn->connection_error);
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $user = $_POST['username'];
        $password = $_POST['password'];
    }


    $result = $conn->query("select pass from users where username='$user'");

    $checkPassword = $result->fetch_assoc();

    if ($result->num_rows> 0){
        if($password == $checkPassword['pass']){
            //Login Successful
            $_SESSION["loggedInUser"] = $user;
            header('location: /flight-booking.php', true, 301);
        }
        else{
            //Login Failed
            $_SESSION["loginerror"] = TRUE;
            header('location: /login.php', true, 301);
        }
    }
    else{
        //Login Failed
        $_SESSION["loginerror"] = TRUE;
        header('location: /login.php', true, 301);
    }

    $conn->close();
    
?>