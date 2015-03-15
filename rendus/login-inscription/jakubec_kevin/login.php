<?php

	require 'inc/config.php';
	//die('ok');  teste si connexion à la BDD

	session_start();


	if(!empty($_POST)){ // test si des données sont renvoyées
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';

		$prepare = $pdo->prepare('SELECT * FROM users WHERE pseudo = :mail OR mail = :mail LIMIT 1'); // ne récupère qu'une ligne dans la table
		$prepare->bindValue(':mail',$_POST['id_co']);
		$prepare->execute();

		$user = $prepare->fetch(); // récupérer

		if(!$user){
			echo 'Utilisateur non trouve';
		}
		else{
			if($user->password == hash('sha256',SALT.$_POST['password'])){ // vérifie le hash du MDP

				$_SESSION['id_co']    = $_POST['id_co'];
				header('Location:connect.php');
			}
			else{
				echo 'Pseudo/mail ou password errone';
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="formulaire">
	<h1>LOGIN</h1>
		<form action="#" method="POST">
			<input type="text" name="id_co">
			<label>Pseudo/Mail</label>
			<br>
			<input type="password" name="password">
			<label>Password</label>
			<br>
			<input type="submit" id="submit">
	</form>
	</div>
</body>
</html>