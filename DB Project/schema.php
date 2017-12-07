<html>
<head>
    <link rel="stylesheet" href="main.css">
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>
</head>
<body>
<div id="main">
<span style="font-size:30px;cursor:pointer; color: #white" onclick="openNav()">&#9776;</span>
</div>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index.html">Home</a>
    <a href="group.php">Group Members</a>
    <a href="description.php">Description</a>
    <a href="#">Our Schema</a>
</div>
<div id="schema">
<pre>
DROP TABLE IF EXISTS drivers;
-- table for Drivers registered in lyft database
create table drivers (
	driver_id INT NOT NULL AUTO_INCREMENT,
	fname VARCHAR(32),
	lname VARCHAR(32),
	address VARCHAR(32),
	contactnumber VARCHAR(32),
	city VARCHAR(32),
	PRIMARY KEY(Driver_id)
);

DROP TABLE IF EXISTS cars;
-- Table for storing cars information in lyft
create table cars (
	car_id INT NOT NULL AUTO_INCREMENT,
	car_name VARCHAR(32),
	car_type VARCHAR(32),
	car_model VARCHAR(32),
	car_licencenumber VARCHAR(32),
	PRIMARY KEY(car_id)
);

DROP TABLE IF EXISTS customers;
-- Table for storing customers using lyft
create table customers (
	c_id INT NOT NULL AUTO_INCREMENT,
	c_fname VARCHAR(32),
	c_lname VARCHAR(32),
	c_contactnumber VARCHAR(32),
	PRIMARY KEY (c_id)
);

DROP TABLE IF EXISTS owns;
--  Table stores which drivers are having which cars
create table owns (
	driver INT,
	car INT,
	PRIMARY KEY (driver,car),
	FOREIGN KEY (driver) REFERENCES drivers(driver_id) ON DELETE CASCADE,
	FOREIGN KEY (car) REFERENCES cars(car_id) ON DELETE CASCADE
);

-- next, add some simple sample data

INSERT INTO drivers (driver_id,fname,lname,address,contactnumber, city) VALUES (1,"Andrew","Marburg","linn street","319-123-4567", "Iowa City"), 
(2, "Nate","Swanson","Iowa ave","319-132-5467", "Cedar Rapids"),(3,"Edision","Lee","Capitol st", "319-143-6457", "Coralville"),
(4,"krishna","veni","Capitol st", "319-134-4657", "Iowa City");

INSERT INTO cars (car_id,car_name,car_type,car_model,car_licencenumber) VALUES (1,"Toyota","SUV","sienna", "CPN 487"),
(2, "Audi","luxury", "A6 quatro", "wxn 768"),(3,"Audi","luxury", "A6 quatro","xnw 253"),
(4,"Honda","sedan", "accord","msn 523"), (5,"Honda","suv", "odyssy","snp 321");

INSERT INTO owns VALUES (1, 2), (1, 3),(2, 4), (3, 5), (4, 1);

</pre>
</div>
</body>
</html>
