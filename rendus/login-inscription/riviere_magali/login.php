<?php

require 'inc/config.php';

if(!empty($_POST))
{
	echo '<pre>';
	print_r($_POST);
	echo'</pre>';


	$prepare = $pdo->prepare('SELECT * FROM table_lol WHERE pseudo = :pseudo LIMIT 1 ');
	$prepare->bindValue(':pseudo',$_POST['pseudo']);
	$prepare->execute();

	$user = $prepare->fetch();

		if(!$user)
	{
		echo 'User not found';
	}

	else
	{
		if ($user->password == hash('sha256',SALT.$_POST['password']))
		{
			echo 'You shall pass';
			session_start ();
		// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd)
		$_SESSION['pseudo'] = $_POST['pseudo'];

		// on redirige notre visiteur vers une page de notre section membre
			header('Location:session.php');
		exit;
		
}		else
		{
			echo "You shall not pass";
		}
	}



}

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>	
	<link rel="stylesheet" type="text/css" href="src/css/style.css">
</head>
<body>
	<h1>Login</h1>
		<form action="#" method="POST" >
			<label class="login">Pseudo</label>
			<input type="text" name="pseudo">
			<br>
			<label class="login">Password</label>
			<input type="text" name="password" >
			<br>
			<div>
			   	<input type="checkbox" name="remember" id="remember"> 
				<label for="remember" class="remember">Remember me</label>
			</div>
			<input type="submit">
		</form>	
		

		
</body>
</html>