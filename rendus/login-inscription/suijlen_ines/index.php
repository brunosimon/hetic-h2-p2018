<?php
	session_start();
	require 'inc/config.php';

	$prepare = $pdo->prepare('SELECT * FROM users_session WHERE session_id = :session_id LIMIT 1');

	$prepare->bindValue(':session_id', session_id());
	$prepare->execute();
	$userID = $prepare->fetch();

	if (!$userID){
		header('Location: login.php');
	}

	$prepareUsername = $pdo->prepare('SELECT * FROM users WHERE id = :user_id LIMIT 1');

	$prepareUsername->bindValue(':user_id', $userID->user_id);
	$prepareUsername->execute();
	$user = $prepareUsername->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="style/style.css"/>
</head>
<body>
	<div class="container-index">
	
	<h2>Voici la page secrète, <?php echo $user->username; ?>!</h1>

	<p class="secret" >Seul les inscrits peuvent y accéder.</p>
	<a class="deco" href="disconnect.php">Me déconnecter</a>

	</div>
</body>
</html>