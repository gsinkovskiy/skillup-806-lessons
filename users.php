<?php
require_once __DIR__ . '/init.php';

$users = [];

$file = fopen(USERS_FILENAME, 'r');

while (!feof($file)) {
	$userData = fgets($file);
	$user = unserialize($userData);
	$users[] = $user;
}

fclose($file);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Список пользователей</title>
</head>
<body>
<h1>Список пользователей</h1>
<pre>
<?php var_dump($users) ?>
</pre>
</body>
</html>
