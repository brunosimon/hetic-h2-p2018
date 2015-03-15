<?php 
	session_start();// On initialise une session

	$_SESSION = array(); // On vide le contenu de la session
	if (isset($_COOKIE[session_name()])){ // On efface manuellement le cookie généré lors de la session
	setcookie(session_name(),'',time()-4200,'/');}
	 
	session_destroy(); // On détruit la session
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Déconnexion</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<h2>Vous êtes à présent déconnecté</h2>
		<img src="http://media.giphy.com/media/KPTCBr8piZ51m/giphy.gif" alt="déco">
		<form action="login.php" method="post">
		<input type="submit" value="OK"/>
		</form>
	</body>
</html>