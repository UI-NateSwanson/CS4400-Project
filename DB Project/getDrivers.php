<?php
function connectToServer(){
    $host = "localhost";
    $username = "root";
//    $password = "cs4400";
    $password = "ripersnifle7&";
    $dbname = "lyft";

    $connection = new mysqli($host, $username, $password, $dbname);

    if ($connection -> connection_error){
        return die("Connection failed: ". $connection->connect_error);
    }

    return $connection;
}

function getDrivers(){
    $connection = connectToServer();
    $sql = "SELECT a.fname, b.car_name, b.car_type, b.car_model, b.car_licencenumber FROM drivers a, cars b, owns c WHERE c.driver = a.driver_id AND c.car = b.car_id;";
    $result = $connection->query($sql);
    while($row = mysqli_fetch_assoc($result)){
        echo "<b>Driver Name:</b> ".$row["fname"]." - <b>Car Type:</b> ".$row["car_type"]." <b>Car Make/Model:</b> ".$row["car_name"]." ".$row["car_model"]." - <b>Plate#:</b> ".$row["car_licencenumber"]."<br>";
    }
    echo "<b>Query Used: </b><span style='color: #95078A;'>SELECT</span> <span style='color: #3274B6;'>a.fname, b.car_name, b.car_type, b.car_model, b.car_licencenumber</span> <span style='color: #95078A;'>FROM</span> <span style='color: #3274B6;'>drivers a, cars b, owns c</span> <span style='color: #95078A;'>WHERE</span> <span style='color: #3274B6;'>c.driver</span> = <span style='color: #3274B6;'>a.driver_id</span> <span style='color: #95078A;'>AND</span> <span style='color: #3274B6;'>c.car</span> = <span style='color: #3274B6;'>b.car_id</span>;";
}
#95078A
#3274B6
getDrivers();

?>
