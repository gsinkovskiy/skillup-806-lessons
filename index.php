<?php

session_save_path(__DIR__);
session_start();

if (isset($_GET['action'])) {
	switch ( $_GET['action'] ) {
		case 'add':
			$_SESSION[$_GET['name']] = $_GET['value'];
			break;
		case 'delete':
			unset($_SESSION[$_GET['name']]);
			break;
	}

	header('Location: index.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Сессии</title>
</head>
<body>
<h1>Значения в сессии</h1>
<table>
	<tr>
		<th>Имя</th>
		<th>Значение</th>
		<th>Удалить?</th>
	</tr>

	<?php foreach ($_SESSION as $name => $value) { ?>
		<tr>
			<td><i><?=$name?></i></td>
			<td><?=$value?></td>
			<td><a href="index.php?action=delete&name=<?=urlencode($name)?>">Удалить</a></td>
		</tr>
	<?php } ?>
</table>

<form method="get">
	<label>Имя <input name="name"></label><br>
	<label>Значение <input name="value"></label><br>
	<button type="submit">Добавить</button>
	<input type="hidden" name="action" value="add">
</form>
</body>
</html>

