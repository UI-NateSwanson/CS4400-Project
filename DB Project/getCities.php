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

function getCities(){
    $connection = connectToServer();
    $sql = "SELECT city_name FROM cities";
    $result = $connection->query($sql);
    $cities = array();
    while($row = mysqli_fetch_assoc($result)){
        array_push($cities, $row["city_name"]);
    }

    return $cities;
}

?>