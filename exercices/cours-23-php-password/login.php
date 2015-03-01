<?php

require 'inc/config.php';

	if(!empty($_POST))
	{
		$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');

		$prepare->bindValue(':mail',$_POST['mail']);

		$exec = $prepare->execute();
		$user = $prepare->fetch();

		if($user)
		{
			if($user->password == hash('sha256',$_POST['password'].SALT))
			    echo 'You shall pass';
			else
			    echo 'You shall not pass';
		}
		else
		{
			echo 'user not found';
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
	<form action="#" method="post">
		<input type="text" name="mail"><label>mail</label>
		<br>
		<input type="text" name="password"><label>password</label>
		<br>
		<input type="submit">
	</form>
</body>
</html>