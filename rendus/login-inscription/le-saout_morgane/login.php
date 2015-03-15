<?php 
session_start();

	require 'inc/config.php';

	if(!empty($_POST))
	{
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';

		$prepare = $pdo->prepare(' SELECT * FROM users WHERE mail = :mail LIMIT 1');

		$prepare->bindValue(':mail', $_POST['mail']);

		$prepare->execute();
		$user = $prepare ->fetch();
		echo '<pre>';
		print_r($user->mail);
		echo '</pre>';

		if(!$user)
		{
			echo 'User not found';
		}
		else
		{
				if($user->password == hash('sha256', SALT.$_POST['password']))
			{echo '<pre>';
			print_r($user);
			echo '</pre>';
				echo 'You shall pass';
				$_SESSION['mail'] = $user->mail;
				// header('Location:connexion.php');
			}
			else
			{
				echo 'You shall not pass';
			} 
	}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
</head>
<body>
	<h1>Login</h1>
	<form action="#" method="POST" > <!-- # : renvoit à la mm page -->
		<input type="text" name="mail">
		<label "Mail">Mail</label> <!-- mettre ID pr le label pr l'exo -->
		<br>
		<input type="password" name="password">
		<label "Password">Password</label>
		<br>
		<input type="submit">
		<a href="forgot_password.php"> Forgot your password?</a> <!-- aucun lien encore fait -->
	</form> 
</body>
</html>