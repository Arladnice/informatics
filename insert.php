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

$admin = 'INSERT INTO admin (id_admin) VALUES (228), (229), (230);';
$customers = 'INSERT INTO customers VALUES (1, "Новосибирск", "2017-02-12", 123), (2, "Москва", "2017-03-24", 253), (3, "Санкт-Петербург", "2017-11-24", 214), (4, "Чита", "2018-11-24", 213), (5, "Киев", "2017-12-24", 143), (6, "Сочи", "2017-11-24", 643), (7, "Италия", "2017-02-24", 532), (8, "Москва", "2017-03-23", 142), (9, "Новосибирск", "2018-02-24", 212), (10, "Санкт-Петербург", "2017-04-24", 421);';
$room = 'INSERT INTO room VALUES(123, 2000, "Макс", "Пахмурин", "eco", 1), (124, 10000, "Денис", "Арлаков", "vip", 2), (125, 10000, "Олег", "Арлаков", "vip", 3), (126, 10000, "Альбина", "Виланд", "vip", 3), (127, 5000, "Саша", "Иванов", "vip", 4), (128, 10000, "Олег", "Селиванов", "vip", 5), (129, 10000, "Александр", "Иванидзе", "vip", 6), (130, 10000, "Артём", "Гидеван", "vip", 7), (131, 10000, "Александр", "Ибрагимов", "vip", 8), (132, 10000, "Юрий", "Дудь", "vip", 9), (133, 10000, "Паша", "Техник", "vip", 10);';
// $room = 'INSERT INTO room VALUES (123, 2000, "Max", "Pahmurin", "eco", 1), (124, 5000, "Alex", "Ibragimov", "eco", 2), (125, 2000, "Denis", "Arlakov", "eco", 3)';
// $customers = 'INSERT INTO customers VALUES (1, "Novosibirsk", "2017-02-12", 123), (2, "Moskow", "2017-02-12", 124), (3, "Sain-Petersburg", "2017-02-12", 125)';
$cleaner = 'INSERT INTO cleaner VALUES (1, 30, "2017-02-13"), (2, 20, "2017-02-14"), (3, 40, "2017-04-14");';
$occupancy = 'INSERT INTO occupancy VALUES(228, 1, 2000, "cheap", "no"), (228, 2, 10000, "view_on_the_sea", "yes"), (228, 3, 10000, "view_on_the_sea", "yes");';
$cleaning = 'INSERT INTO cleaning VALUES(228, 1, 30, "2017-02-12"), (229, 2, 20, "2017-03-21"), (229, 3, 20, "2017-03-21");';


function ins($name){
	global $conn;
	if ($conn->query($name) === TRUE) {
		echo "Table inserted successfully", "<p></p>";
	} else {
		echo "Error inserting table: ", "<p></p>" . $conn->error;
	}
}

$admin_ins = ins($admin);
$admin_ins;

$customers_ins = ins($customers);
$customers_ins;

$cleaner_ins = ins($cleaner);
$cleaner_ins;

$room_ins = ins($room);
$room_ins;

$occupancy_ins = ins($occupancy);
$occupancy_ins;

$cleaning_ins = ins($cleaning);
$cleaning_ins;
?>