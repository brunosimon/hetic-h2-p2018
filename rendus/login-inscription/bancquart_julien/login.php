<?php

	require 'inc/config.php';

	session_start();

	if(!empty($_POST))
	{
		$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');

		$prepare->bindValue(':mail',$_POST['mail']);
		$prepare->execute();

		$user = $prepare->fetch();

		$mail = (trim($_POST['mail']));
		$password = ($_POST['password']);

		if(!empty($mail)&&!empty($password)) // vérifie les champs remplis
			{		
				if(!$user)	// vérifie si user dans db
				{
					echo 'Mail incorrect';
				}
				else
				{
					$mail = ($_POST['mail']);
					$password = ($_POST['password']);

					$prepare = $pdo->prepare('SELECT hash FROM users WHERE  mail = :mail LIMIT 1');
					$prepare->bindValue(':mail', $mail);
					$prepare->execute();

					$user = $prepare->fetch(PDO::FETCH_OBJ);

					// Hashing the password with its hash as the salt returns the same hash
					if ($user->hash == crypt($password, $user->hash)) 
					{
						$_SESSION['mail'] =$mail;
						header('Location:membre.php');  // Ok!
					}
					else
					{
						echo 'Password incorrect';
					}
				}
				
			} else echo "Veuillez remplir tous les champs";
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="login">
	<h1>Login</h1>
    <form action="#" method="POST">
    	<input id="mail" type="text" name="mail" placeholder="Mail" required="required" />
        <input id="password" type="password" name="password" placeholder="Password" required="required" />
        <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Se connecter</button>
    </form>
</div>
</body>
</html>