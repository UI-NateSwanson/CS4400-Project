<?php
function connectToServer(){
    $host = "localhost";
    $username = "root";
    $password = "cs4400";
    $dbname = "lyft";

    $connection = new mysqli($host, $username, $password, $dbname);

    if ($connection -> connection_error){
        return die("Connection failed: ". $connection->connect_error);
    }

    return $connection;
}

function getDrivers(){
    $connection = connectToServer();
    $sql = "SELECT driver_id, fname, lname, contactnumber FROM drivers";
    $result = $connection->query($sql);
    while($row = mysqli_fetch_assoc($result)){
        echo "Driver ID: ".$row["driver_id"]." - Name: ".$row["fname"]." ".$row["lname"]." - Phone: ".$row["contactnumber"]."<br>";
    }
}

getDrivers();

?>
