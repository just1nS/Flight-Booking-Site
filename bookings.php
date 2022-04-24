<?php
    session_start();

    if(!isset($_SESSION["loggedInUser"])){
        header('location: /login.php', true, 301);
        exit();
    }
    else{
        $user = $_SESSION["loggedInUser"];
    }

    $username = "root";
    $password = "";
    $server = "localhost";
    $dbName = "flightbooking";

    $conn = new mysqli($server, $username, $password, $dbName);

    if($conn->connect_error){
        die("Conenction Failed: " . $conn->connect_error);
    }

    $sql = "select flights.flightNo, destination, origin, departTime, arrivalTime from bookings, flights where bookings.username = '$user' and bookings.flightNo = flights.FlightNo;";

    $result = $conn->query($sql);
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <script src="flight-booking.js"></script>
    </head>
    <body>
        <div>
        <div class="navbar">
            <a href="/flight-booking.php">Flight Booking</a>
            <a class="active" href="/bookings.php">Your Bookings</a>
            <div class="dropMenu">
                <?php 
                    if(isset($user)){
                        echo "<button onclick=\"openDropMenu()\" class=\"dropButton\">$user</button>";
                        echo "<div id=\"dropMenuLinks\" class=\"drop-Content\">";
                        echo    "<a href=\"logout.php\">Log Out</a>";
                        echo "</div>";
                    }
                    else{
                        echo "<a href=\"login.php\">Log In</a>";
                    }?>
            </div>
        </div>
        <div class="flight-table">
            <table id="flight-data">
                <tr>
                    <th><h3>Flight No.</h3></th>
                    <th><h3>Destination</h3></th>
                    <th><h3>Origin</h3></th>
                    <th><h3>Depart Time</h3></th>
                    <th><h3>Arrival Time</h3></th>
                </tr>
                <?php
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row["flightNo"]?></td>
                    <td><?php echo $row["destination"]?></td>
                    <td><?php echo $row["origin"]?></td>
                    <td><?php echo $row["departTime"]?></td>
                    <td><?php echo $row["arrivalTime"]?></td>
                </tr>
                <?php
                      }
                    }
                ?>
            </table>
        </div>

        <?php
            $conn->close();
        ?>

    </body>
</html>