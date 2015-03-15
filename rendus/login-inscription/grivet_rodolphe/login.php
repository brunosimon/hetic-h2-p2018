<?php

	require 'inc/config.php';
	//Demmarage session
	session_start();

	//Si l'utilisateur a deja une session elle est éffacé
	if(!empty($_SESSION))
		echo 'Vous vous etes correctement déconneter : ',$_SESSION['login'];
		session_destroy();


	if(!empty($_POST))
	{

		$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');
		$prepare->bindValue(':mail',$_POST['mail']);



		$prepare->execute();
		$user = $prepare->fetch();

		if(!$user)
		{
			echo 'User not found';
		}
		else
		{
			if($user-> password == hash('sha256',SALT.$_POST['password']))
			{	
				//Ouverture de la session
				session_start();
				$_SESSION['login']    = $user-> nom;
				$_SESSION['email']	  = $user-> mail;

				// Redirection
				header('Location: okconect.php');
  				exit();
			}
			else
			{
				echo "You shall not pass";
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
	<h1>Login</h1>
	<form action="#" method="POST">
		<label for="mail">Mail :</label>
		<input type="text" name="mail" id="mail">
		<br>
		<label for="pass">Password :</label>
		<input type="password" name="password" id="pass">
		<br>
		<input type="submit">
	</form>
	<h3><a href="mdp.php">Mot de passe oublié ?</a></h3>
	<h3><a href="index.php">Retour</a></h3>
</body>
</html>
