<?php

$pdo = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');

$sql = "UPDATE users SET email='sidorov@email.com' WHERE id = 2";
$pdo->exec($sql);

$sql = 'SELECT * FROM users';
$users = $pdo->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Title</title>
</head>
<body>
<table>
	<tr>
		<th>ID</th>
		<th>First name</th>
		<th>Last name</th>
		<th>Email</th>
	</tr>

	<?php while ($user = $users->fetch(PDO::FETCH_ASSOC)) { ?>
		<tr>
			<td><?= $user['id'] ?></td>
			<td><?= $user['first_name'] ?></td>
			<td><?= $user['last_name'] ?></td>
			<td><?= $user['email'] ?></td>
		</tr>
	<?php } ?>
</table>
</body>
</html>

