<?php
	session_start();// On initialise une session.
	 
	$_SESSION['connect']=0; //Initialise la variable 'connect'. 

	require 'inc/config.php';

	if(!empty($_POST)){
		if(empty($_POST['mail'])) {
			$blankmail = "Vous n'avez pas rempli votre mail";
		}	

		if (!filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)) {
				$errormail = 'Veuillez rentrer une adresse valide';
		}

		$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');
		$prepare->bindValue(':mail',$_POST['mail']);
		$prepare->execute();
		$user = $prepare->fetch();

		if(!$user)
		{
			$error = 'Ce compte n\'existe pas';
		}

		else if($user->password == hash('sha256',SALT.$_POST['password'])){
				$_SESSION['connect']=1; // Change la valeur de la variable connect s'il y a eu identification.
				echo "<script language='Javascript'>document.location='secret.php'</script>"; // On affiche la page cachée.
		}
		
		else  {
			$error = 'Ce compte n\'existe pas';
		}
	}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Connexion</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>Login</h1>
	<form action="#" method="POST">
		<input type="text" placeholder="Mail" id="mail" name="mail">
		<label for="mail">Mail</label>
		<span class="error-message"><?php if(isset($blankmail)) echo $blankmail; else if(isset($errormail)) echo $errormail;  else if(isset($error)) echo $error; ?></span>
		<br>
		<input type="password" placeholder="Mot de passe" id="password" name="password">
		<label for="password">Password</label>
		<br>
		<input type="SUBMIT">
	</form>

</body>
</html>