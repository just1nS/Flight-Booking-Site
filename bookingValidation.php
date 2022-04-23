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

    echo "Booking Flight: " . $bookedFlightNo;
    
    $sql = "insert into bookings values('$user', '$bookedFlightNo');";

    if($conn->query($sql) === TRUE){
        echo "Flight Successfully Booked!";
    }
    else{
        echo "error: " . $sql . "<br>" . $conn->error;
    }

    echo "<button onclick=\"window.location='flight-booking.php'\">HOME</button>";

    $conn->close();

?>