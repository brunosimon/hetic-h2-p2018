<?php

	require 'inc/config.php';

	if(!empty($_POST))
	{
		$prepare = $pdo->prepare('INSERT INTO users (mail,password) VALUES (:mail,:password)');

		$prepare->bindValue(':mail',$_POST['mail']);
		$prepare->bindValue(':password',hash('sha256',$_POST['password'].SALT));

		$exec = $prepare->execute();
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
</head>
<body>
	<h1>Inscription</h1>
	<form action="#" method="post">
		<input type="text" name="mail"><label>mail</label>
		<br>
		<input type="text" name="password"><label>password</label>
		<br>
		<input type="submit">
	</form>

</body>
</html>