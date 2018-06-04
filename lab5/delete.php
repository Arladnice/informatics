<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Удаление</title>
</head>
<body>

</body>
</html>
<?php

include_once("connection.php");

$id = $_GET['customers_id_customers'];

mysql_query(" DELETE FROM room WHERE customers_id_customers='$id' ");

mysql_close();

echo "Удалено!";
?>
<a href="list.php">Домой</a>