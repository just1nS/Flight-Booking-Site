<?php
    session_start();
    if(isset($_SESSION["loggedInUser"])){
        $user = $_SESSION["loggedInUser"];
    }
    else{
        $user = NULL;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Book a Flight</title>
        <script src="flight-booking.js"></script>
    </head>
    <body>
    <?php
        $username = "root";
        $password = "";
        $server = "localhost";
        $dbName = "flightbooking";

        $conn = new mysqli($server, $username, $password, $dbName);

        if($conn->connect_error){
            die("Connection Failed: " . $conn->connect_error);
        }

        $sql = "select flightNo, destination, origin, departTime, arrivalTime from flights;";
        $result = $conn->query($sql);

        if($result){ 
            if (!$result->num_rows> 0) {
                echo "No record found"; 
            }
        }
        else{ 
            echo "Error in ".$sql." ".$conn->error;
        }
        ?>

        <div class="navbar">
            <a class="active" href="/flight-booking.php">Flight Booking</a>
            <a href="/bookings.php">Your Bookings</a>
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
                    <th><h3>Reserve</h3></th>
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
                    <td>
                        <form action="/bookingValidation.php" method="post">
                            <input type="hidden" name="flightNo" id="flightNo" value="<?php echo $row["flightNo"]?>">
                            <input type="submit" name="submit" value="Book Now" class="book-button">
                        </form>
                    </td>
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