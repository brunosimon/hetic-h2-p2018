<?php 

	require 'inc/config.php';
	// Test pour savoir si l'user a acces a la page ou pas
	session_start();
	if(empty($_SESSION))
	{
		header('Location: login.php');
		exit();
	}

	$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');
	$prepare->bindValue(':mail',$_SESSION['email']);


	$prepare->execute();
	$user = $prepare->fetch();
	
	if(!empty($_POST))
	{	

		$new_mail = $_POST['mail'];
		$old_mail = $user-> mail;
		$try 	  = 0;
		if(!empty($new_mail))
		{
			
			$new_mail = filter_var($new_mail, FILTER_SANITIZE_EMAIL);
			if(filter_var($new_mail, FILTER_VALIDATE_EMAIL) === false)
			{
  				 echo 'mauvais mail';
			}		

			// Changementde mail
			else
			{
				$change_mail = $pdo->prepare('UPDATE users SET mail = :new_mail WHERE mail = :old_mail LIMIT 1');
				$change_mail->bindValue(':new_mail',$new_mail);
				$change_mail->bindValue(':old_mail',$old_mail);
				$change_mail->execute();
				echo 'Votre nouveau email est : ',$new_mail;
				$_SESSION['email'] = $new_mail;
			}
		}	
		if (empty($new_mail))
		{
			echo 'Pas de mail rentré';
		}
	}
 ?>
<!DOCTYPE html>

<head>
	<meta charset="UTF-8">
	<title>Pannel connecté</title>
</head>
<body>
	<h1>Bienvenue sur votre page admin <?php echo $_SESSION['login']; ?></h1>
	<p>Vous êtes connecté sous l'adresse email suivante : <?php echo $_SESSION['email']; ?></p>
	<p>Changer d'email ?</p>
	<form action="#" method="POST">
		<label for="mail">Nouveau mail :</label>
		<input type="text" name="mail" id="mail">
		<br>
		<input type="submit">
	</form>
	<p>Retourner sur l'<a href="index.php">index</a></p>
	<p><a href="login.php">Se deconnecter</a></p>
</body>
</html>