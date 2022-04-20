<?php
    start_session();

    $username = "root";
    $password = "";
    $server = "localhost";
    $dbName = "bookings";

    $conn = new mysqli($server, $username, $password, $dbName);

    if($conn->connect_error){
        die("Conenction Failed: " . $conn->connect_error);
    }

    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    </body>
</html>