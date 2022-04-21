<?php
    session_start();

    $username = "root";
    $password = "";
    $server = "localhost";
    $dbName = "flightbooking";

    $conn = new mysqli($server, $username, $password, $dbName);

    if($conn->connect_error){
        die("Conenction Failed: " . $conn->connect_error);
    }

    //SELECT flights.flightNo, destination, origin, departTime, arrivalTime 
    //FROM bookings, flights
    //WHERE bookings.username = '$user' AND bookings.flightNo = flights.FlightNo

    $sql = "select * from bookings";

    $result = $conn->query($sql);

    if($results){
        while($row = $results->fetch_assoc()){
    
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
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>

        <?php
                }
            }
            $conn->close();
        ?>
    </body>
</html>