<?php
	session_start();
	if(!isset($_SESSION['id_co'])){
		echo 'Vous n\'etes pas connecte au site. Vous ne pouvez donc pas venir sur cette page.';
		exit();
	}
	else{
		echo 'Bonjour' . $_SESSION['id_co'];
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Connecte</title>
	<link rel="stylesheet" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="connect">
		<h1>Connecte</h1>
		<form action="#">
			<input type="submit" id="submit" value="Deconnexion">
		</form>
	</div>
</body>
</html>