<?php
	session_start();
	session_destroy();
	header ("Refresh: 5;URL=login.php");
?>
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Deonnecte</title>
	<link rel="stylesheet" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="deconnect">
		<h1>Deconnecte</h1>
		<form action="login.php">
			<input type="submit" id="submit" value="Login">
		</form>
	</div>
</body>
</html>