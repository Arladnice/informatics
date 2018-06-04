<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Search</title>
</head>
<body>

<form name="form" method="GET" onkeypress="if(event.keyCode == 13) return false;">
	<p><b> Выборка по имени </b><br>
		<input type="text" name="search1" size="15" value="<?php echo( $_GET['search1'] );?>" >
	</p>

	<p><b> Выборка по фамилии </b><br>
		<input type="text" name="search2" size="40" value="<?php echo( $_GET['search2'] );?>" >
	</p>

	<p><b> Выборка по городу </b><br>
		<input type="text" name="search3" size="20" value="<?php echo( $_GET['search3'] );?>" >
	</p>

	<p><input type="submit" name="start" value="Отправить"></p>

</form>

<?php
// Create connection
include('connection.php');
$conn = mysqli_init();
if(!mysqli_real_connect($conn, $host, $user, $pswd, $database)){
	die("Connection failed: " . mysqli_connect_error());
}
//Check connection
error_reporting(-1);
$output = '';
//collect
if(isset($_GET['search1']) or isset($_GET['search2']) or isset($_GET['search3'])){
	$input_str1 = $_GET['search1'];
	$input_str2 = $_GET['search2'];
	$input_str3 = $_GET['search3'];
	$input_str1 = strtr($_GET['search1'], '*', '%');
	$input_str2 = strtr($_GET['search2'], '*', '%');
	$input_str3 = strtr($_GET['search3'], '*', '%');
	if(is_numeric($input_str1) or is_numeric($input_str2) or is_numeric($input_str3)){
		$input_str1 = "Нельзя вводить число";
		$input_str2 = "Нельзя вводить число";
		$input_str3 = "Нельзя вводить число";
	}
		$query = "SELECT room.first_name, room.last_name, customers.city
							FROM customers
							LEFT JOIN cleaner ON id_cleaner = id_customers
							RIGHT JOIN room on id_customers = customers_id_customers
							WHERE first_name LIKE '%$input_str1%' AND last_name LIKE '%$input_str2%' AND city LIKE '%$input_str3%'
							ORDER BY id_customers;";

	$res = $conn->query($query);
	$result1 = $conn->query($query);
    $len = count(mysqli_fetch_row($result1));

	if($len == 0){
		$output = 'Таких результатов нет';
	}

	echo "<table border=1 width=30%>";
	echo "<caption><strong>Информация</strong></caption>";
    echo "<tr>";
    echo "<td align=center>first_name</td>";
    echo "<td align=center>last_name</td>";
    echo "<td align=center>city</td>";
    echo "</tr><br>";
    while ($row = mysqli_fetch_row($res)) {
    	echo "<tr>";
        for ($j = 0 ; $j < $len; $j++) echo "<td align=center>$row[$j]</td>";
    	echo "</tr>";
	}
	echo "</table>";
}
?>

</body>
</html>