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

function addCustomer(){
    $connection = connectToServer();
    $customerCity = $_POST["city_name"];
    $c_fname = $_POST["c_fname"];
    $c_lname = $_POST["c_lname"];
    $c_contactnumber = $_POST["c_contactnumber"];

    $checkCity = "SELECT b.driver_id, b.city_id FROM cities a, drivers b WHERE a.city_name='$customerCity' AND a.city_id = b.city_id ";

    $result = $connection->query($checkCity);
    while($row = mysqli_fetch_assoc($result)){
        $availableDriver = $row["driver_id"];
        $city_id = $row["city_id"];
    }

    $addNewCustomer = "INSERT INTO customers(c_fname, c_lname, c_contactnumber, city_id) VALUES('$c_fname', '$c_lname', '$c_contactnumber', '$city_id')";
    $result = mysqli_query($connection, $addNewCustomer);
    if($result == false){
        echo mysqli_errno($connection);
    }

    $newOrder = "INSERT INTO orders(driver, customer, city) VALUES('$availableDriver', LAST_INSERT_ID(), '$city_id')";
    $result = mysqli_query($connection, $newOrder);
    if($result == false){
        echo mysqli_errno($connection);
    }
    echo "<b>Query Used To Check City: </b><span style='color: #95078A;'>SELECT</span> <span style='color: #3274B6;'>b.driver_id, b.city_id</span> <span style='color: #95078A;'>FROM</span> <span style='color: #3274B6;'>cities a, drivers b</span> <span style='color: #95078A;'>WHERE</span> <span style='color: #3274B6;'>a.city_name</span> = <span style='color: #3274B6;'>$customerCity</span> <span style='color: #95078A;'>AND</span> <span style='color: #3274B6;'>a.city_id</span> = <span style='color: #3274B6;'>b.city_id</span>;<br>";
    echo "<b>Query Used To Insert New Customer: </b><span style='color: #95078A;'>INSERT INTO</span> <span style='color: #3274B6;'>customers(c_fname, c_lname, c_contactnumber, city_id)</span> <span style='color: #95078A;'>VALUES</span><span style='color: #3274B6;'> ('$c_fname', '$c_lname', '$c_contactnumber', '$city_id')</span>;<br>";
    echo "<b>Query Used To Create New Order: </b><span style='color: #95078A;'>INSERT INTO</span> <span style='color: #3274B6;'>orders(driver, customer, city)</span> <span style='color: #95078A;'>VALUES</span><span style='color: #3274B6;'> ('$availableDriver', LAST_INSERT_ID(), '$city_id')</span>;<br>";
}

addCustomer();

?>
