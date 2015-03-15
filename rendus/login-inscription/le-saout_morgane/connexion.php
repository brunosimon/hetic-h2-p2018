<?php
session_start();	
if (!$_SESSION['mail']){ //si ca existe pas on redirige vers login
	header('Location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>session</title>
</head>
<body>
	<h1>Hello <?= $_SESSION['mail']?> </h1>
	<h2>Welcome to your page</h2>

	<label for="logout"><input type="button" name="logout" value="Logout">
	<a href="login.php">Logout</a></label><br>

</body>
</html>