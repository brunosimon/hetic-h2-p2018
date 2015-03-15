<?php

require 'inc/config.php';

if(!empty($_POST))
{
	$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');
	$prepare->bindValue(':mail',$_POST['mail']);
	$prepare->execute();

	$user = $prepare->fetch();

	if(!$user)
	{
		echo 'Utilisateur non trouvé';
	}
	else
	{
		if($user->password == hash('sha256',$_POST['password'].SALT))
		{
			session_start();
			$_SESSION['login'] = '$mail';
			header('Location: private.php');
			exit();
		}
		else
		{
			echo 'Mot de passe incorrect : Essayez encore !';
		}
	}
}
?><!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="UTF-8">
		<title>Login</title>

	</head>

	<body>

		<h1>Login</h1>

		<form action="#" method="POST">

			<div>
				<label for="mail">Adresse email</label>
				<input type="text" placeholder="Votre adresse email" name="mail" id="mail">
			</div>

			<div>
				<label for="password">Mot de passe</label>
				<input type="password" placeholder="Votre mot de passe" name="password" id="password">
			</div>

			<input type="submit">

			<div>
				<a href="inscription.php" target="_blank">
				<input type="button" value="Nouveau ? Inscrivez-vous !">
				</a>
			</div>

		</form>

	</body>

</html>