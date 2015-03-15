<?php

	require 'inc/config.php';

	if (!empty($_POST)) {
		if((!empty($_POST['mail']) && isset($_POST['mail'])) && (!empty($_POST['password']) && isset($_POST['password'])))
		{
			echo '<pre>';
			print_r($_POST);
			echo '</pre>';

			$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail AND password = :password LIMIT 1');
			
			$prepare->bindValue(':mail',$_POST['mail']);
			$prepare->bindValue(':password',hash('sha256',SALT.$_POST['password']));

			$prepare->execute();
			$user = $prepare->fetch();

			// SI USER EST FALSE, ALORS...
			if(!$user)
			{
				echo 'Your email/password is wrong, please retry with the good ones (or stop hacking this website, it is useless)';
			}
			else
			{
				session_start();
				$_SESSION['mail'] = $_POST['mail'];
				header("refresh:3;url=membre.php");
				echo 'Email and password OK ! Please wait a few seconds, you are going to enter the club...';
				exit();
			}
		}
		else
		{
			echo "Please fill all the login form";
		}
	}

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
 	<title>Login</title>
 	<link rel="stylesheet" href="src/css/style.css">
</head>

<body>
	<h1>Login</h1>
	<form action="#" method="POST">
		<input type='email' name="mail">
		<label>Mail</label>
		<br>
		<input type="password" name="password">
		<label>Password</label>
		<br>
		<input type="submit">
	</form>
	<br>
	Don't have an account yet ? <br>
	<input type="button" value="Subscribe !" action="inscription.php">

</body>
</html>