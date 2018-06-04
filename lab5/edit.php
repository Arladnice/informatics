<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Редактирование новости</title>
</head>

<body>

<?php

include_once("connection.php");

$id = $_GET['customers_id_customers'];

$result = mysql_query("  SELECT room.first_name, room.last_name, customers.city
													FROM customers
													LEFT JOIN cleaner ON id_cleaner = id_customers
													RIGHT JOIN room on id_customers = customers_id_customers
													WHERE customers_id_customers=$id
");
$row = mysql_fetch_assoc($result);
$result2 = mysql_query("SELECT * FROM customers;");
$row2 = mysql_fetch_assoc($result2);
if(isset($_POST['save']))
{
    $first_name = strip_tags(trim($_POST['first_name']));
    $last_name = strip_tags(trim($_POST['last_name']));
    $city = strip_tags(trim($_POST['city']));

    mysql_query(" UPDATE customers
    							LEFT JOIN cleaner ON id_cleaner = id_customers
									RIGHT JOIN room on id_customers = customers_id_customers
									 SET room.first_name='$first_name', room.last_name='$last_name', customers.city='$city' WHERE customers_id_customers='$id'");

    mysql_close();

    echo "<br/>Новость уcпешно отредактирована!";
    ?>
    <meta http-equiv='Refresh' content='0; URL="list.php"'>
    <?php
}
?>

<form method="post" action="edit.php?customers_id_customers=<?php echo $id; ?>">

Имя<br />
<input type="text" name="first_name" value=" <?php echo $row['first_name']; ?>" /><br />
Фамилия<br />
<input type="text" name="last_name" value=" <?php echo $row['last_name']; ?>" /><br />
Город(список)<br />
<select name = 'city'>;
<?php
while($object = mysql_fetch_object($result2)){
	if ($row['customers_id_customers'] == $row2['id_customers'])
		echo "<option selected value = '$object->customers_id_customers' > $object->city </option>";
	else
		echo "<option value = '$object->customers_id_customers' > $object->city </option>";
}
echo "</select>";
?>
<br />
<input type="text" name="city" value=" <?php echo $row['city']; ?>" /><br />
<input class="tap" type="submit" name="save" value="Сохранить" />
<hr/>
<a href="list.php">Домой</a>
</form>


</body>
</html>