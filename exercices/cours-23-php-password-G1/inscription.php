<?php

	$ch = curl_init();

	curl_setopt($ch,CURLOPT_URL, 'http://www.google.com');
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

	$result = curl_exec($ch);

	curl_close($ch);


























	die('ok');

	require 'inc/config.php';

	if(!empty($_POST))
	{
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';

		$prepare = $pdo->prepare('INSERT INTO users (mail,password) VALUES (:mail,:password)');

		$prepare->bindValue(':mail',$_POST['mail']);
		$prepare->bindValue(':password',hash('sha256',SALT.$_POST['password']));

		$prepare->execute();
	}

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
</head>
<body>
	<h1>Inscription</h1>
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