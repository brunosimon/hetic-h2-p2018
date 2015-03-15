<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<title> Accueil </title>
		<link rel="stylesheet" href="css/style2.css">
		<link href='http://fonts.googleapis.com/css?family=Enriqueta:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/reset.css">
</head>
<body>
	<div class="header">

		<ul class="log">

			<li><div class="log-in"><a href="login.php">Log-in</a></div></li>
			<li><div class="log-out"><a href="deconnexion.php">Log-out</a></div></li>
			<li><div class="Home"><a href="validation.php">Home</a>
		</ul>
	
	</div>

	<div class="session">
		<?php
			

			if (!empty($_SESSION['login']))
			{
			    echo 'Bienvenue ' . $_SESSION['login'];   
			}
		?>
	</div>
</body>
</html>