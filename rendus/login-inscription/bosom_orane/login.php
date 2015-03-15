<?php
session_start();

require 'inc/config.php';


if(!empty($_POST))
{
	$error = array();

	if (empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
		$error['mail'] = "Your email is unvalid";
	}

	if (empty($_POST['password']))
	{
		$error['password'] = "Wrong password";
	}

	if (!$error) {

		$mail_prepare = $pdo->prepare('SELECT * FROM `users` WHERE mail = :mail');

		$mail_prepare->bindValue(':mail', $_POST['mail']);

		$mail_prepare->execute();

		$user = $mail_prepare->fetch();

		if ($user && $user->password == hash('sha256',SALT.$_POST['password'])) {
			$_SESSION['mail'] = $user->mail;
			$_SESSION['first_name'] = $user->first_name;
			$_SESSION['last_name'] = $user->last_name;
			header('Location: profil.php');
		} else {
			$error['mail'] = "Your email is unvalid";
		}
	}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Mars One</title>
	<link rel="stylesheet" href="css/stylelogin.css">

</head>
<body>
	<h1>Login to the Mars One Mission</h1>
	<form action="#" method="POST">
		<input type="text" name="mail"><label> Mail</label>
		<br/>
		<input type="password" name="password"><label> Password</label><br/>
		<input type="submit">
	</form>
</body>
</html>