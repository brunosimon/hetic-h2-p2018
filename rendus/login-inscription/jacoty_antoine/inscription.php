<?php

	require 'inc/config.php';

	if (!empty($_POST)) {
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		if ((isset($_POST['mail']) && !empty($_POST['mail'])) && (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) && (isset($_POST['gender']) && !empty($_POST['gender'])) && (isset($_POST['age']) && !empty($_POST['age'])) && (isset($_POST['password']) && !empty($_POST['password'])) && (isset($_POST['confPassword']) && !empty($_POST['confPassword']))) {
			// Checking if password includes capital letters, numbers, and is long enough
			if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $_POST['password']))
			{
				echo 'Your password must contain at least 8 characters, including letters, capital letters and numbers.';
			}
			// Checking if password confirmation is equal to password
			else if ($_POST['password'] != $_POST['confPassword'])
			{
			echo "Humm... Maybe you didn't know, but your two passwords have to be the same ! ;)";
			}
			// A MAJOR condition to be accepted ^^
			else if ($_POST['gender'] == "F")
			{
				echo 'Sorry girl, this club is only for Gentlemen. Be nice, leave this website quietly ;)';
			}
			else 
			{
			// Checking if the email isn't already used by somebody else
				$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');		
				$prepare->bindValue(':mail',$_POST['mail']);
				$prepare->execute();
				$testmail = $prepare->fetch();
				if (!$testmail) {
			$prepare = $pdo->prepare('INSERT INTO users (mail,pseudo,gender,age,password) VALUES (:mail,:pseudo,:gender,:age,:password)');

			$prepare->bindValue(':mail',$_POST['mail']);
			$prepare->bindValue(':pseudo',$_POST['pseudo']);
			$prepare->bindValue(':gender',$_POST['gender']);
			$prepare->bindValue(':age',$_POST['age']);
			$prepare->bindValue(':password',hash('sha256',SALT.$_POST['password']));

			$prepare->execute();

			header("refresh:5;url=index.php");
			echo "Your account has been created, you'll receive a confirmation mail. You're about to be redirected on the login page in 5 seconds. If you're not, please click <a href='index.php'>here</a>.";
			exit();
				}
				else {
				echo 'Sorry, someone is already using this email adress ! Please use another one.';
				}
			}
		}
		else 
		{
		echo 'Error : You have not filled all the form !';
		}
	}
?>

<!DOCTYPE HTML PUBLIC>
<html>
<head>
	<meta charset="UTF-8">
 	<title>Page d'inscription</title>
 	<link rel="stylesheet" href="src/css/style.css">
</head>

<body>
	<h1>Inscription au club</h1>
	<form action="#" method="POST">
		<input type='email' name="mail">
		<label>Mail</label>
		<br>
		<input type='text' name="pseudo">
		<label>Pseudo</label>
		<br>
		Your gender :
		<input type='radio' name="gender" value="H">
		<label>Man</label>
		<input type='radio' name="gender" value="F">
		<label>Woman</label>
		<br>
		<input type='number' name="age" min="1" max="120">
		<label>Your age</label>
		<br>
		<input type="password" name="password">
		<label>Password (must contain at least 8 characters, including letters, capital letters and numbers)</label>
		<br>
		<input type="password" name="confPassword">
		<label>Password Confirmation</label>
		<br>
		<input type="submit">
	</form>

</body>
</html>