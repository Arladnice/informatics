<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Добавление новости</title>
</head>

<body>


<form method="post" action="add.php">

Номер комнаты<br />
<input type="text" name="id_room" /><br />
Стоимость<br />
<input type="text" name="price" /><br />
Имя<br />
<input type="text" name="first_name" /><br />
Фамилия<br />
<input type="text" name="last_name" /><br />
Тип<br />
<input type="text" name="type" /><br />

<input type="submit" name="add" value="Добавить" />

</form>

<hr/>
<a href="list.php">Домой</a>
<?php

include_once("connection.php");


if(isset($_POST['add']))
{
    $id_room = strip_tags(trim($_POST['id_room']));
    $price = strip_tags(trim($_POST['price']));
    $first_name = strip_tags(trim($_POST['first_name']));
    $last_name = strip_tags(trim($_POST['last_name']));
    $type = strip_tags(trim($_POST['type']));

    mysql_query("
                    INSERT INTO news(id_room, price, first_name, last_name, type, customers_id_customers)
                    VALUES ('$id_room', '$price', '$first_name', '$last_name', '$type')
    ");

    mysql_close();

    echo "<br/>Новость уcпешно добавлена!";
}





?>


</body>
</html>