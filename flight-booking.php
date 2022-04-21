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
            <div class="navLinks">
                <a href="/flight-booking.php">Flight Booking</a>
                <a href="/bookings.php">Your Bookings</a>
            </div>
            <div class="account">
                <?php 
                    if(isset($user)){
                        echo $user;
                        echo "<a href=\"logout.php\">Log Out</a>";
                    }
                    else{
                        echo "<a href=\"login.html\">Log In</a>";
                    }?>
            </div>
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
                    <td>
                        <form action="/bookingValidation.php" method="post">
                            <input type="hidden" name="flightNo" id="flightNo" value="<?php echo $row["flightNo"]?>">
                            <input type="submit" name="submit" value="BOOK">
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