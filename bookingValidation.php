<?php
    session_start();

    if(!isset($_SESSION["loggedInUser"])){
        header('location: /login.php', true, 301);
        exit();
    }
    else{
        $user = $_SESSION["loggedInUser"];
    }

    echo "Weclome " . $user;

    $username = "root";
    $password = "";
    $server = "localhost";
    $dbName = "flightbooking";

    $conn = new mysqli($server, $username, $password, $dbName);

    if($conn->connect_error){
        die("Connection Failed: " . $conn->connect_error);
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $bookedFlightNo = $_POST['flightNo'];
    }
    
    $sql = "insert into bookings values('$user', '$bookedFlightNo');";

    if($conn->query($sql) === TRUE){
        header('location: /bookings.php', true, 301);
    }
    else{
        echo "error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

?>