<?php 
	include 'config.php';

	// Start session
	Connected();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Espace membre</title>
		<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/index.css">
	</head>
	<body>
		<div class="left">
			<h1>Bienvenue dans votre espace membre</h1>
			<!-- <img src="img/all_logo1.png" alt="test"> -->
			<canvas class="locker" width="400" height="500"></canvas>
		</div>
		<div class="right">
			<?php if($_SESSION['connected']) echo '<a href="logout.php" class="disconnect">Déconnexion</a>'; else echo ""; ?>
			<h2>Hello <?= $_SESSION['pseudo']; ?></h2>
			<p>Bienvenue dans votre espace membre consultez ici toutes les informations vous concernant.</p>
			<ul>
				<li><?= $_SESSION['pseudo'] ?></li>
				<li><?= $_SESSION['email'] ?></li>
				<li><?= $_SESSION['age'] ?></li>
				<li><?= $_SESSION['phone'] ?></li>
			</ul>
		</div>
		
		<script type="text/javascript" src="js/polyfill.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>

