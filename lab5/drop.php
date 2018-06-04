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

$admin = 'DROP TABLE admin';
$customers = 'DROP TABLE customers';
$cleaner = 'DROP TABLE cleaner';
$room = 'DROP TABLE room';
$occupancy = 'DROP TABLE occupancy';
$cleaning = 'DROP TABLE cleaning';

function drop($name){
	global $conn;
	if ($conn->query($name) === TRUE) {
		echo "Table dropped successfully", "<p></p>";
	} else {
		echo "Error dropping table: ", "<p></p>" . $conn->error;
	}
}

$admin_dr = drop($admin);
$admin_dr;

$customers_dr = drop($customers);
$customers_dr;

$cleaner_dr = drop($cleaner);
$cleaner_dr;

$room_dr = drop($room);
$room_dr;

$occupancy_dr = drop($occupancy);
$occupancy_dr;

$cleaning_dr = drop($cleaning);
$cleaning_dr;

?>