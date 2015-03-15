<?php

require_once("config.php");
require_once("form.php");

if (isset($_POST['username']))
{
	$username = htmlentities(trim($_POST['username']));
	$mail = htmlentities(trim($_POST['mail']));
	$password = htmlentities(trim($_POST['password']));
	$repeatpassword = htmlentities(trim($_POST['repeatpassword']));

	$response = validateForm($username, $mail, $password, $repeatpassword);

	if ($response['error'] === false)
		$success = true;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bienvenue</title>
</head>
<body>
	<?php if (isset($success)): ?>
		<?php echo $response['message'] ?>
	<?php else: ?>
		<p>Vous avez déja un compte ? <a href="login.php">Connexion</a></p>

		<form method="POST" action="register.php">
			<p>Votre Pseudo</p>
				<input type="text" name="username" value="<?php if(isset($username)) echo $username; ?>">
			<p>Votre Adresse Mail</p>
				<input type="text" name="mail" value="<?php if(isset($mail)) echo $mail; ?>">
			<p>Votre Password</p>
				<input type="password" name="password">
			<p>Repetez votre Password</p>
				<input type="password" name="repeatpassword">
				<br/>
				<br/>
			<?php if(isset($response)) echo '<p style="color:red;">' . $response['message'] . '</p>' ?>
			<input type="submit" value="S'inscrire" name="submit">
		</form>
	<?php endif; ?>
</body>