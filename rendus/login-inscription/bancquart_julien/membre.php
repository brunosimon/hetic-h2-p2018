<?php

	session_start();

	if(!empty($_SESSION['mail']))
	{

	echo "Bienvenue ".$_SESSION['mail']."! <br/><a href='logout.php'>Se déconnecter</a>";

	} else header('Location:login.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Membre</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
	</br>
	<img src="inc/welcome1.jpg" alt="">	
</body>
</html>