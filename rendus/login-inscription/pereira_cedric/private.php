<?php
	include 'inc/config.php';
	if(!isset($_SESSION['id_users'])) return header('Location: ./signin.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<meta charset="UTF-8">
	<title>Espace privé | Graphity</title>
</head>
<body class="preload">
	<a href="./logout.php" class="disconnect">Déconnexion</a>
	<div class="private">
		<h1>Graphity</h1>
		<h2>Félicitations, vous êtes dans l'espace privé</h2>
			<img src="img/private-image.jpg" alt="Young Wilde & Free" class="privatecontent">
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/main.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>