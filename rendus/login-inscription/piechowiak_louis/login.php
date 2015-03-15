<?php
	/*
	F E A T U R E S
	[ ]Se connecter avec pseudo OU adresse e-mail
	[ ]Système "Mot de passe oublié"
	[ ]Système "Se souvenir de moi"
	[ ]Captcha
	[ ]Limiter le nombre de tentatives
	[ ]Mots de passe sécurisés (hash et salt minimum)

	N E  P A S  O U B L I E R
	[ ] Passer les input des psswd en type password */
	require 'inc/config.php';

	if(!empty($_POST))
	{
		$prepare = $pdo->prepare("SELECT * FROM users WHERE email = :email");
		$prepare->bindValue(':email', $_POST['mail']);
		$prepare->execute();

		$user = $prepare->fetch();

		if(!$user)
		{
			echo 'User not found';
		}
		else
		{
			if($user->password == hash('sha256', SALT.$_POST['password']))
			{
				header("location:index.php");
				exit;
			}
			else
			{
				echo "<p>c'est non</p>";
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<link rel="stylesheet" href="styles.css">
		<link href='http://fonts.googleapis.com/css?family=Raleway:200,500,900' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<form action="#" method="post">
			<fieldset>
			<legend>Login</legend>
				<input type="mail" name="mail" placeholder="Ton pseudo ou e-mail">
				<br>
				<input type="text" name="password" placeholder="Ton mot de passe">
				<br>
				<input type="submit" value="Valider">
			</fieldset>
		</form>
	</body>
</html>