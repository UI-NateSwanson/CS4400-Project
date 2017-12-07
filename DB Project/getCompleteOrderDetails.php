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

function getDetails(){
    $connection = connectToServer();
    $sql = "SELECT a.order_id, b.c_fname, b.c_lname, b.c_contactnumber, c.fname, d.car_name, d.car_model, e.city_name FROM orders a, customers b, drivers c, cars d, cities e, owns f WHERE a.customer = b.c_id AND a.driver = c.driver_id AND a.city = e.city_id AND c.driver_id = f.driver AND d.car_id = f.car ;";
    $result = $connection->query($sql);
    while($row = mysqli_fetch_assoc($result)){
        echo "<b>Order#:</b> ".$row["order_id"]." - <b>Customer Name:</b> ".$row["c_fname"]." ".$row["c_lname"]."<b>Driver Name :</b> ".$row["fname"]."<b>Car Make/Model:</b> ".$row["car_name"]." ".$row["car_model"]." - <b>City:</b> ".$row["city_name"]."<br>";
    }
    echo "<b>Query Used: </b><span style='color: #95078A;'>SELECT</span> <span style='color: #3274B6;'>a.order_id, b.c_fname, b.c_lname, b.c_contactnumber, c.fname, d.car_name, d.car_model, e.city_name</span> <span style='color: #95078A;'>FROM</span> <span style='color: #3274B6;'>orders a, customers b, drivers c, cars d, cities e, owns f</span> <span style='color: #95078A;'>WHERE</span> <span style='color: #3274B6;'>a.customer</span> = <span style='color: #3274B6;'>b.c_id</span> <span style='color: #95078A;'>AND</span> <span style='color: #3274B6;'>a.driver</span> = <span style='color: #3274B6;'>c.driver_id</span> <span style='color: #95078A;'>AND</span> <span style='color: #3274B6;'>a.city</span> = <span style='color: #3274B6;'>e.city_id</span> <span style='color: #95078A;'>AND</span> <span style='color: #3274B6;'>c.driver_id</span> = <span style='color: #3274B6;'>f.driver</span> <span style='color: #95078A;'> AND</span> <span style='color: #3274B6;'>d.car_id</span> = <span style='color: #3274B6;'>f.car</span>;";
}

getDetails();

?>