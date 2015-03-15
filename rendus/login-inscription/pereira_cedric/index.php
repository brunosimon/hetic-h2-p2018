<?php
	include 'inc/config.php';
	if(isset($_SESSION['id_users'])) return header('Location: ./private.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<meta charset="UTF-8">
	<title>Accueil | Graphity</title>

</head>
<body class="preload">
	<div class="home">
		<h1>Graphity</h1>
		<h2>Bienvenue</h2>
		<p class="unlogged">Accès à l'espace privé</p>
		<a href="./signin.php" class="calltoaction" >Connexion</a>
		<a href="./signup.php" class="calltoaction">Inscription</a>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>