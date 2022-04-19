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

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
        ?>
        <div>
            <table>
                <tr>
                    <td>Flight No.</td>
                    <td>Destination</td>
                    <td>Deprt.</td>
                    <td>Arvl.</td>
                </tr>
                <tr>
                    <td><?php echo $row["flightNo"]?></td>
                    <td><?php echo $row["destination"]?></td>
                    <td><?php echo $row["origin"]?></td>
                    <td><?php echo $row["departTime"]?></td>
                    <td><?php echo $row["arrivalTime"]?></td>
                </tr>
            </table>
        </div>
        <?php 
                    }
                }
            $conn->close();
        ?>
    </body>
</html>