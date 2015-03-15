<?php

	require 'inc/config.php';

		if(isset($_POST['submit']))
		{
			$mail = $_POST['mail'];
			$mail = preg_replace('/\s\s+/', ' ', $mail);

   			 // Vérifie si la chaine ressemble à un email
    		if (preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $mail)) 
    		{
   				$password = ($_POST['password']);
				$repeatpassword = ($_POST['repeatpassword']);

			if (preg_match('/[A-Z]/', $password) && preg_match('/[a-z]/', $password)
				&& preg_match('/[0-9]/', $password) && strlen($password) >= 8){



			if(!empty($mail)&&!empty($password)&&!empty($repeatpassword)) // vérifie les champs remplis
			{
				if($password == $repeatpassword) // vérifie passwords identiques
				{
						$requete = $pdo->prepare('SELECT * FROM users WHERE mail = :email'); 
						$requete -> bindValue(':email',$_POST['mail']);
						$requete -> execute();

						$reg = $requete->fetch();

						if($reg===false) // si le mail n'est pas pris alors
						{

						$password = ($_POST['password']);
						$mail = $_POST['mail'];

						$cost = 10;
						$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
						$salt = sprintf("$2a$%02d$", $cost) . $salt;
						$hash = crypt($password, $salt);

						$prepare = $pdo->prepare('INSERT INTO users (mail,password,hash) VALUES (:mail,:password,:hash)'); // on enregistre ses infos
						$prepare->bindValue(':mail',$_POST['mail']);
						$prepare->bindValue(':password',$hash); //hash('sha256',SALT.$_POST['password']));
						$prepare->bindValue(':hash',$hash);
						$prepare->execute();

						

						header('Location:login.php');
						
						} else echo "Mail deja pris";
					
				} else echo "Les passwords doivent etre identiques";


				} else echo "Password doit contenir une minuscule, une majuscule et un caractere special";

			} else echo"Le password doit contenir une minuscule, une majuscule, un chiffre et faire 8 caractères";
		

			} else echo 'Cet email a un format non adapté.';
		}
	


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
	
<div class="login">
	<h1>Inscription</h1>
    <form action="#" method="POST">
    	<input id="mail" type="text" name="mail" placeholder="Mail" required="required" />
        <input id="password" type="password" name="password" placeholder="Password" required="required" />
        <input id="repeatpassword" type="password" name="repeatpassword" placeholder="Repeter password" required="required" />
        <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">S'inscrire</button>
    </form>
</div>

			</form>
	
</body>
</html>