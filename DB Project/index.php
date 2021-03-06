<?php
    include "getCities.php";
    $cities = getCities();
?>

<html>
<meta charset="utf-8"/>
<head>
    <title>Lyft Group Project CS4400</title>
    <link rel="stylesheet" href="main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
        function getDrivers(){
            $.ajax({
                type: 'POST',
                data: {},
                url: 'getDrivers.php',
                success: function (data) {
                    $("#drivers").html(data);
                },
                error: function(errorThrown){
                    console.log(errorThrown);
                }
            });
        }
        function getDetails(){
            $.ajax({
                type: 'POST',
                data: {},
                url: 'getCompleteOrderDetails.php',
                success: function (data) {
                    $("#orderDetails").html(data);
                },
                error: function(errorThrown){
                    console.log(errorThrown);
                }
            });
        }

    </script>
</head>

<body>
<div id="main">
    <span style="font-size:30px;cursor:pointer; color:"#white" onclick="openNav()">&#9776;</span>
</div>
<header>Lyft : Group Project CS4400</header>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">Home</a>
    <a href="group.php">Group Members</a>
    <a href="description.php">Description</a>
    <a href="schema.php">Our Schema</a>
</div>
<div class="container">
    <div id="getDrivers">
        <button onclick="getDrivers()">Get Drivers Info</button>
        <div id="drivers"></div>
    </div>
    <div id="addCustomer">
        <h3>Fill out form below</h3>
        <form id="cust_form" action="addCustomer.php" method="post">
            <p>First Name: <input name="c_fname" required></p>
            <p>Last Name: <input name="c_lname" required></p>
            <p>Phone Number: <input name="c_contactnumber" required></p>
            <input type="radio" name="city_name" value="<?php echo $cities[0]?>"><?php echo $cities[0]?>
            <input type="radio" name="city_name" value="<?php echo $cities[1]?>"><?php echo $cities[1]?>
            <input type="radio" name="city_name" value="<?php echo $cities[2]?>"><?php echo $cities[2]?>
            <input type="radio" name="city_name" value="<?php echo $cities[3]?>"><?php echo $cities[3]?><br><br>
            <button name="Add Customer" type="submit">Add Customer</button>
        </form>
        <!--<button onclick="addCustomer()">Add Customer</button>-->
    </div>
    <div id="getDetails">
        <button onclick="getDetails()">Get All Order Details</button>
        <div id="orderDetails"></div>
    </div>
</div>
</body>
</html>

