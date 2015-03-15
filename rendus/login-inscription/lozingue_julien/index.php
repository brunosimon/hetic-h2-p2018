<?php

	require 'inc/config.php';


		$name 			 = $_POST['name'];
		$mail 			 = $_POST['mail'];
		$password 		 = $_POST['password'];
		$confirmpassword = $_POST['confirmpassword'];


		function champvide($name, $mail, $password, $confirmpassword)
		{

			if (empty($name) || empty($mail) || empty($password) || empty($confirmpassword)) echo 'Veuillez remplir tout les champs';

			else return "okvide";


		}
	
	 	function secupassword($password, $confirmpassword)
	 	{

		
		if($password == $confirmpassword) return "okpassword" ;
		
		else echo 'Veuillez saisir un mot de passe correct' ;
			 
		
		} 

		function secumail($mail)
		{
			if (strstr($mail,'@')) return "okmail";
			// strstr permet de vérifier si un champ contient un caractère précis.
			else echo 'Veuillez saisir une adresse mail valide';
		}


		

	

	if (!empty($_POST) && champvide($name, $mail, $password, $confirmpassword) == "okvide" && secupassword($password, $confirmpassword) == "okpassword" && secumail($mail) == "okmail")
		{
		$prepare = $pdo->prepare('INSERT INTO users (name, mail, password, confirmpassword) VALUES (:name, :mail, :password, :confirmpassword)');

		$prepare->bindValue(':name', $_POST['name']);
		$prepare->bindValue(':mail', $_POST['mail']);
		$prepare->bindValue(':password', $password.SALT);
		$prepare->bindValue(':confirmpassword', $_POST['confirmpassword'].SALT);

		/*
			J'AI DECIDER DE NE PAS UTILISER DE HASHAGE CAR CE DERNIER ME POSAIS PROBLEME LORSQUE SUR MA PAGE LOGIN, JE VOULAIS VERIFIER QUE LE MOT DE PASSE RENTRER CORRESPONDAIT BIEN A CELUI DE LA BASE DE DONNEE, EN EFFET LE HASHAGE ME DONNAIT DEUX RESULTATS DIFFERENT ET JE N'AI PAS REUSSI A RESOUDRE CE PROBLEME, J'AI DONC LAISSER TOMBER LE HASHAGE.
		*/

		$prepare->execute();

		$_SESSION['name']    	 = $name;
		$_SESSION['mail']    	 = $mail;
		$_SESSION['password']    = $password;


		

		$to      = $mail;
		$subject = "Confirmation Inscription";
		$message = "Vos identifiant sont les suivants : \r\n";
		$message = "Nom : ";
		$message = $name;
		$message = "Mot de passe : ";
		$message = $password;
		
		

		mail($to,$subject,$message);

		header('Location: membre.php');
  		exit();
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

			<input type="text" name="name" id="name">
			<label for="name"> Name</label>
			<br>
			<input type="text" name="mail" id="mail">
			<label for="mail">Mail</label>
			<br>
			<input type="password" name="password" id="password">
			<label for="password">Password</label>
			<br>
			<input type="password" name="confirmpassword" id="confirmpassword">
			<label for="confirmpassword">Confirm Password</label>
			<br>
			<input type="submit">
		</form>
	</body>
</html>