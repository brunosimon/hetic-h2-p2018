<?php

require 'inc/config.php';

$error = false;


// Verification login
if(!empty($_POST))
{
	$prepare = $pdo->prepare('SELECT * FROM site_diablo WHERE mail = :mail LIMIT 1');
	$prepare->bindValue(':mail', $_POST['mail']);
	$prepare->execute();

	$user = $prepare->fetch();

	if(!$user)
	{
		$error = true;
	}

	else
	{
		if($user->password == hash('sha256', PREFIX_SALT.$_POST['password'].SUFFIX_SALT))
		{
			// On ouvre la session
	        session_start();
	        // On enregistre les données du membre en session
	        $_SESSION['pseudo']   = $user->pseudo;
	        $_SESSION['mail']     = $user->mail;
	        $_SESSION['password'] = $user->password;
	        $_SESSION['age']      = $user->age;
	        $_SESSION['gender']   = $user->gender;
	        $_SESSION['class']    = $user->class;
	        // On redirige vers la page de session
			header('Location:session.php');
			exit;
		}
		else
		{
			$error = true;
		}
	}
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="src/css/style.css"></link>
</head>
<body class="body-login">
	<h1>Login</h1>
	<?php if($error == true) echo '<div class="alert alert-login">Identifiants incorrects</div>'; ?>
	<form action="#" method="POST">

		<div>
			<input type="text" name="mail" id="name">
			<label class="label-login" for="name">Mail</label>
		</div>
		
		<div>
			<input type="password" name="password" id="password">
			<label class="label-login" for="password">Password</label>
		</div>

		<input class="valid-login" type="submit">
	</form>
</body>
</html>