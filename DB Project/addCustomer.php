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
    $c_fname = $_POST["c_fname"];
    $c_lname = $_POST["c_lname"];
    $c_contactnumber = $_POST["c_contactnumber"];
    $connection = connectToServer();
    $sql = "INSERT INTO customers(c_fname, c_lname, c_contactnumber) VALUES('$c_fname', '$c_lname', '$c_contactnumber')";
    $result = mysqli_query($connection, $sql);
    if($result == false){
        echo mysqli_errno($connection);
    }


}

addCustomer();

?>
