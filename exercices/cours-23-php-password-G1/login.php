<?php

	require 'inc/config.php';

	if(!empty($_POST))
	{
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';

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
			if($user->password == hash('sha256',SALT.$_POST['password']))
			{
				echo 'You shall pass';
			}
			else
			{
				echo 'You shall not pass';
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
		<input type="text" name="mail">
		<label>Mail</label>
		<br>
		<input type="text" name="password">
		<label>Password</label>
		<br>
		<input type="submit">
	</form>
</body>
</html>