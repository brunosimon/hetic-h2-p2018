<?php
session_start();

if (empty($_SESSION['mail']) && empty($_SESSION['last_name']) && empty($_SESSION['first_name'])) {
	header('Location: login.php');
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mars One - Your profile</title>
	<link rel="stylesheet" href="css/styleinscription.css">

</head>
<body>
	<h2>Welcome to Mars One, <?= $_SESSION['first_name'] ?></h2>
</body>
</html>

