<?php
include 'database.php';
$db = new Database();
var_dump($db);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Examenvoorbereiding</title>
	<meta charset="utf-8">
</head>

<body>
	<form method="post" action="login.php">
		<input type="text" name="username" placeholder="Gebruikersnaam" autofocus><br>
		<input type="password" name="password" placeholder="Wachtwoord"><br>
		<input type="submit" value="Login">
	</form>
</body>
</html>
