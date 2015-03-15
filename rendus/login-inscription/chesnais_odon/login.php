<?php

	require 'inc/config.php';

	if(!empty($_POST))
	{
		$prepare = $pdo->prepare('SELECT * FROM users WHERE pseudo = :pseudo LIMIT 1');

		$prepare->bindValue(':pseudo',$_POST['pseudo']);

		$prepare->execute();
		$user = $prepare->fetch();
		if(!$user)
		{
			echo 'Erreur d\'identification : <br/> Ce pseudo n\'existe pas dans la base de donnée';
		}
		else
		{
			if($user->password == hash('sha256',SALT.$_POST['password']))
			{
				session_start();
				$_SESSION['login'] = 'login_visiteur';
				header('Location: pagesecu.php');
			}
			else
			{
				echo 'Erreur d\'identification : <br/> Le mot de passe est incorrect';
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<h1>Connexion</h1>
	<form action="#" method="POST">
		<label>Pseudo :</label>
		<input type="text" name="pseudo">
		<br> <br>
		<label>Mot de passe :</label>
		<input type="password" name="password">
		<br> <br>
		<a href="passwordforgotten.php">Mot de passe oublié ?</a>
		<br> <br>
		<input type="submit" value="Se connecter">
		<br>
		<input type="checkbox" name="stayconnect">Se souvenir de moi
	</form>

</body>
</html>