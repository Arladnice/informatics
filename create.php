<?php
$host='localhost';
$database='hotel2';
$user='root';
$pswd='';

// Create connection
$conn = new mysqli($host, $user, $pswd, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function check($name){
	 global $conn;
	 if ($conn->query($name) === TRUE) {
		echo "Table created successfully", "<p></p>";
	} else {
		echo "Error creating table: ", "<p></p>" . $conn->error;
	}
 }

$admin = "
CREATE TABLE admin(
 id_admin INT NOT NULL,
 PRIMARY KEY(id_admin))
 ";

$customers = "
CREATE TABLE customers(
    id_customers INT NOT NULL,
    city VARCHAR(45) NOT NULL,
    date DATETIME NOT NULL,
    room INT NOT NULL,
    PRIMARY KEY (id_customers));";

$cleaner = "
CREATE TABLE cleaner(
    id_cleaner INT NOT NULL,
    time INT NOT NULL,
    date DATETIME NOT NULL,
    PRIMARY KEY(id_cleaner));";

$room = "
CREATE TABLE room(
     id_room INT NOT NULL,
     price INT NOT NULL,
     first_name VARCHAR(45) NOT NULL,
     last_name VARCHAR(45) NOT NULL,
     type VARCHAR(45) NOT NULL,
     customers_id_customers INT NOT NULL,
     PRIMARY KEY(id_room, customers_id_customers),
       INDEX `fk_room_customers1_idx` (`customers_id_customers` ASC),
     CONSTRAINT `fk_room_customers1`
     FOREIGN KEY (`customers_id_customers`)
     REFERENCES `customers` (`id_customers`));";

$occupancy = "
CREATE TABLE occupancy(
     `admin_id_admin` INT NOT NULL,
       `customers_id_customers` INT NOT NULL,
       `cost` INT NOT NULL,
       `preferences` VARCHAR(45) NOT NULL,
       `conditions` VARCHAR(45) NOT NULL,
       PRIMARY KEY (`admin_id_admin`, `customers_id_customers`),
       INDEX `fk_admin_has_customers_customers1_idx` (`customers_id_customers` ASC),
       INDEX `fk_admin_has_customers_admin_idx` (`admin_id_admin` ASC),
       CONSTRAINT `fk_admin_has_customers_admin`
         FOREIGN KEY (`admin_id_admin`)
         REFERENCES `admin` (`id_admin`)
         ON DELETE NO ACTION
         ON UPDATE NO ACTION,
       CONSTRAINT `fk_admin_has_customers_customers1`
         FOREIGN KEY (`customers_id_customers`)
         REFERENCES `customers` (`id_customers`)
     );";

$cleaning = "
CREATE TABLE cleaning(
    admin_id_admin INT NOT NULL,
    cleaner_id_cleaner INT NOT NULL,
    time INT NOT NULL,
    date DATETIME,
    PRIMARY KEY (admin_id_admin,  cleaner_id_cleaner),
    INDEX `fk_admin_has_cleaner_cleaner1_idx` (`cleaner_id_cleaner` ASC),
     INDEX `fk_admin_has_cleaner_admin1_idx` (`admin_id_admin` ASC),
    CONSTRAINT `fk_admin_has_cleaner_admin1`
       FOREIGN KEY (`admin_id_admin`)
       REFERENCES `admin` (`id_admin`)
       ON DELETE NO ACTION
       ON UPDATE NO ACTION,
       CONSTRAINT `fk_admin_has_cleaner_cleaner1`
        FOREIGN KEY (`cleaner_id_cleaner`)
        REFERENCES `cleaner` (`id_cleaner`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION);
";

$admin_ch = check($admin);
$admin_ch;

$customers_ch = check($customers);
$customers_ch;

$cleaner_ch = check($cleaner);
$cleaner_ch;

$room_ch = check($room);
$room_ch;

$occupancy_ch = check($occupancy);
$occupancy_ch;

$cleaning_ch = check($cleaning);
$cleaner_ch;

?>