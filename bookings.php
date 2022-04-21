<?php
    session_start();

    if(!isset($_SESSION["loggedInUser"])){
        header('location: /login.html', true, 301);
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
    </head>
    <body>
        <div>
            <div>
                <h2>Your Bookings</h2>
            </div>
            <div>
                <table>
                    <tr>
                        <td><h3>Flight No.</h3></td>
                        <td><h3>Destination</h3></td>
                        <td><h3>Deprt.</h3></td>
                        <td><h3>Arvl.</h3></td>
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
        </div>

        <?php
            $conn->close();
        ?>
        
        <button onclick="window.location='flight-booking.php'">HOME</button>

    </body>
</html>