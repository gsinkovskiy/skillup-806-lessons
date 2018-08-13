<?php

if (isset($_GET['action'])) {
	switch ( $_GET['action'] ) {
		case 'add':
			setcookie($_GET['name'], $_GET['value'], null, '/');
			break;
		case 'delete':
			setcookie($_GET['name'], '', strtotime('-1 sec'), '/');
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
	<title>Куки</title>
</head>
<body>
<h1>Значения в куках</h1>
<table>
	<tr>
		<th>Имя</th>
		<th>Значение</th>
		<th>Удалить?</th>
	</tr>

	<?php foreach ($_COOKIE as $name => $value) { ?>
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

