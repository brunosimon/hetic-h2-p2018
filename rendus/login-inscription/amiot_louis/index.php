<?php

// 	PAGE ACCESSIBLE PAR CONNEXION
// - Possibilité de se déconnecter
// - Si pas connecté, redirection vers la page de redirection. 
// - On affiche les infos de l'utilisateur

	session_start();

	// We check if user is logged in
	if(!isset($_SESSION['user'])){
	   header("Location:login.php");
	}

	// If user doesn't want to be remember, we destroy the session
	if (!isset($_SESSION['remember'])) {
		session_destroy();
	}

	require 'inc/config.php';

	// We get user infos in order to display them in the page
	$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');
	$prepare->bindValue(':mail',$_SESSION['user']);

	$prepare->execute();
	$userInfos = $prepare->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Your LiveSpace</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="menu_up">
	Hello <?php echo $userInfos->firstname.' '.$userInfos->lastname ?> ! <span><a href="#">Manage my account</a> | <a href="login.php?disconnect=1">Disconnect</a></span>
	</div>
	<div class="video-container">
		<iframe width="1280" height="720" src="https://www.youtube.com/embed/8XFBUM8dMqw" frameborder="0" allowfullscreen></iframe>
	</div>
</body>
</html>