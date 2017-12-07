DROP TABLE IF EXISTS cities;
-- Table for storing cities
create table cities (
	city_id INT(100) NOT NULL AUTO_INCREMENT,
	city_name VARCHAR(32),
	PRIMARY KEY(city_id)
)ENGINE=InnoDB;

DROP TABLE IF EXISTS drivers;
-- table for Drivers registered in lyft database
create table drivers (
	driver_id INT(100) NOT NULL AUTO_INCREMENT,
	fname VARCHAR(32),
	lname VARCHAR(32),
	address VARCHAR(32),
	contactnumber VARCHAR(32),
	driver_city INT(100),
	PRIMARY KEY(driver_id),
	FOREIGN KEY (driver_city) REFERENCES cities(city_id)
)ENGINE=InnoDB;

DROP TABLE IF EXISTS cars;
-- Table for storing cars information in lyft
create table cars (
	car_id INT(100) NOT NULL AUTO_INCREMENT,
	car_name VARCHAR(32),
	car_type VARCHAR(32),
	car_model VARCHAR(32),
	car_licencenumber VARCHAR(32),
	PRIMARY KEY(car_id)
)ENGINE=InnoDB;


DROP TABLE IF EXISTS customers;
-- Table for storing customers using lyft
create table customers (
	c_id INT(100) NOT NULL AUTO_INCREMENT,
	c_fname VARCHAR(32),
	c_lname VARCHAR(32),
	c_city INT(100),
	PRIMARY KEY (c_id),
	FOREIGN KEY (c_city) REFERENCES cities(city_id)
)ENGINE=InnoDB;

DROP TABLE IF EXISTS owns;
--  Table stores which drivers are having which cars
create table owns (
	driver INT(100),
	car INT(100),
	PRIMARY KEY (driver,car),
	FOREIGN KEY (driver) REFERENCES drivers(driver_id) ON DELETE CASCADE,
	FOREIGN KEY (car) REFERENCES cars(car_id) ON DELETE CASCADE
)ENGINE=InnoDB;

DROP TABLE IF EXISTS orders;
-- Table stores which drivers are driving a customer
create table orders (
	driver INT(100),
	customer INT(100),
	city INT(100),
	PRIMARY KEY (driver, customer, city),
	FOREIGN KEY (driver) REFERENCES drivers(driver_id),
	FOREIGN KEY (customer) REFERENCES customers(c_id),
	FOREIGN KEY (city) REFERENCES cities(city_id)
)ENGINE=InnoDB;

-- next, add some simple sample data

INSERT INTO cities (city_id, city_name) VALUES (1, "Iowa City"), (2, "Coralville"), (3, "Cedar Rapids");

INSERT INTO drivers (driver_id,fname,lname,address,contactnumber, driver_city) VALUES (1,"Andrew","Marburg","linn street","319-123-4567", 1), 
(2, "Nate","Swanson","Iowa ave","319-132-5467", 3),(3,"Edision","Lee","Capitol st", "319-143-6457", 2),
(4,"krishna","veni","Capitol st", "319-134-4657", 1);

INSERT INTO cars (car_id,car_name,car_type,car_model,car_licencenumber) VALUES (1,"Toyota","SUV","sienna", "CPN 487"),
(2, "Audi","luxury", "A6 quatro", "wxn 768"),(3,"Audi","luxury", "A6 quatro","xnw 253"),
(4,"Honda","sedan", "accord","msn 523"), (5,"Honda","suv", "odyssy","snp 321");

INSERT INTO owns VALUES (1, 2), (1, 3),(2, 4), (3, 5), (4, 1);

