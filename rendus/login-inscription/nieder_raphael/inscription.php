<?php

	require 'inc/config.php';
	include 'formulaire.php';

	if(!empty($_POST))
	{
		$mail = $_POST['mail'];

		$prepare = $pdo->prepare('INSERT INTO users (nom,age,mail,password,password2) VALUES (:nom,:age,:mail,:password,:password2)');
		$prepare->bindValue(':nom',$_POST['nom']);
		$prepare->bindValue(':age',$_POST['age']);
		$prepare->bindValue(':mail',$_POST['mail']);
		$prepare->bindValue(':password',hash('sha256',SALT.$_POST['password']));
		$prepare->bindValue(':password2',hash('sha256',SALT.$_POST['password2']));

		//Testing mail bis
		$getmail = $pdo->prepare('SELECT mail FROM users WHERE mail = :mail');
		$getmail->bindValue(':mail',$_POST['mail']);
		$getmail->execute();
		$result_mail = $getmail->fetch(PDO::FETCH_ASSOC);

		if(!empty($result_mail))
			$errors[] = 'Email déja pris, veuillez changer';


		if(!empty($errors))
		{
			foreach ($errors as $_errors) {
				echo $_errors . "<br>";
			}
		}
		else if(!empty($success))
		{
			$prepare->execute();
		}
			
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
	<form action="#" method="POST">
		<label for="nom">Nom :</label>
		<input type="text" name="nom" id="nom" placeholder="Nom" >
		<br>
		<label for="age">Age :</label>
		<input type="number" name="age" id="age" placeholder="Age">
		<br>
		<label for="mail">Mail :</label>
		<input type="text" name="mail" id="mail" placeholder="Email">
		<br>
		<label for="pass">Password :</label>
		<input type="password" name="password" id="pass" placeholder="Mot de passe">
		<br>
		<label for="pass2">Repet password :</label>
		<input type="password" name="password2" id="pass2" placeholder="Mot de passe">
		<br>
		<input type="submit">
	</form>
	<h3><a href="index.php">Retour</a></h3>
</body>
</html>
