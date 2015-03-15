<?php
	
	require 'inc/config.php';

	if(!empty($_POST))
	{
		

		$prepare = $pdo->prepare('SELECT * FROM inscription WHERE mail = :mail LIMIT 1');

		$prepare->bindValue(':mail',$_POST['mail']);
		

		$prepare->execute();
		$user = $prepare->fetch();
		

		if(!$user)
		{
			echo 'user not found';
		}
		else
		{
			

			if($user->mdp === hash('sha256',SALT.$_POST['password']))
			{
				$_SESSION['mail']    	 = $mail;
				$_SESSION['password']    = $password;
				header('location: bienvenue.php');
				echo 'you shall pass';
			}
			else
			{
				echo '<pre>';
			print_r( hash('sha256',SALT.$_POST['password']));
			echo '</pre>';
			echo '<pre>';
			print_r($user->mdp);
			echo '</pre>';
			
				echo 'you shall not pass';
			// Ce code va bien retrouver le mot de passe de l'utilisateur et le compare avec celui de la base de donnée
			// cependant il semble qu'il rajoute quelque chose lors du hash celui entré dans la page login
			// si j'enleve les hash('sha256') des deux cotés, celui-ci fonctionne.
			}

		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Login</h1>
	<form action="#" method="POST">
		<input type="text" name='mail'>
		<label for="">Mail</label>
		<br>
		<input type="password" name='password'>
		<label for="">Password</label>
		<br>
		<input type="submit">
	</form>
</body>
</html>