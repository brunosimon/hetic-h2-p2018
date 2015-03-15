<?php
	require ('../inc/config.php'); 
	session_start();

	//try to log from cookie
	include ('../autologin.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Private zone !</title>
	<link rel="stylesheet" href="./css/reset.css">
	<link rel="stylesheet" href="./css/style.css">
</head>
<body>

<?php if(empty($_SESSION['usr'])):  ?>
	<div class="intro">
		<h1>Vous n'êtes pas connecté !</h1>
		<h2>Veuillez vous <a href="index.php">inscrire</a> ou vous <a href="index.php">connecter !</a></h2>
	</div>
<?php else: ?>

	<div>
		<h1>Bienvenue <?= $_SESSION['usr'] ?>.</h1>
		<h2>Retournez à <a href="index.php">l'index</a> ou déconnectez-vous.</h2>
		<form action="../logout.php" method="GET">
			<input type="hidden" name="action" value="logout">
			<input type='hidden' name='link' value='<?= $_SERVER['REQUEST_URI']; ?>' />
			<input type="submit" name="logout" id="logout" value="Se déconnecter">
		</form>
	</div>

<?php endif; ?>

</body>
</html>