<?php

	require 'inc/config.php';

		$name 			 = $_POST['name'];
		$mail 			 = $_POST['mail'];
		$password 		 = $_POST['password'];
		$confirmpassword = $_POST['confirmpassword'];

	if(!empty($_POST)){
		$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');

		$prepare->bindValue(':mail', $_POST['mail']);

		$prepare->execute();
		

		$user = $prepare->fetch();

		
		
		if(!$user){
			echo 'User not found';
		}else{
			if($user->password == $password.SALT){

		/*
			J'AI DECIDER DE NE PAS UTILISER DE HASHAGE CAR CE DERNIER ME POSAIS PROBLEME LORSQUE SUR MA PAGE LOGIN, 
			JE VOULAIS VERIFIER QUE LE MOT DE PASSE RENTRER CORRESPONDAIT BIEN A CELUI DE LA BASE DE DONNEE, 
			EN EFFET LE HASHAGE ME DONNAIT DEUX RESULTATS DIFFERENT ET JE N'AI PAS REUSSI A RESOUDRE CE PROBLEME, 
			J'AI DONC LAISSER TOMBER LE HASHAGE.
		*/
				$_SESSION['name']        = $name;
				$_SESSION['mail']    	 = $mail;
				$_SESSION['password']    = $password;
				header('Location: membre.php');
			}else{

				
				echo 'Veuillez vous inscrire';
				
			}
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
			
			<input type="text" name="mail" id="mail">
			<label for="mail">Mail</label>
			<br>
			<input type="password" name="password" id="password">
			<label for="password">Password</label>
			<br>
			<input type="submit">
		</form>
	</body>
</html>