<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Мой сайт</title>
</head>
<body>

<?php

include_once("connection.php");

$result = mysql_query("SELECT room.first_name, room.last_name, customers.city, customers_id_customers
													FROM customers
													LEFT JOIN cleaner ON id_cleaner = id_customers
													RIGHT JOIN room on id_customers = customers_id_customers");

mysql_close();

while($row = mysql_fetch_assoc($result)){
	?>
	<p><?php echo $row['first_name']; ?></p>
	<p><?php echo $row['last_name']; ?></p>
	<p><?php echo $row['city']; ?></p>
	<a href="edit.php?customers_id_customers=<?php echo $row['customers_id_customers']; ?>">Редактировать новость</a>
	<a href="delete.php?customers_id_customers=<?php echo $row['customers_id_customers']; ?>">Удалить новость</a>
	<hr/>
<?php } ?>



</body>
</html>