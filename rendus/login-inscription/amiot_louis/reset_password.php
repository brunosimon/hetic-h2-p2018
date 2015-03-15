<?php 

// PAGE RESET MDP
// - Vérification que l’utilisateur possède bien un token qui est associé à son mail
// - Vérification que le mot de passe rentré respecte les règles (au moins Une majuscule, un chiffre, un caractère spécial, au moins 8 caractères)
// - Vérification que les deux mots de passe marche
// - Mise à jour du mot de passe.
// - Expiration du token si mot de passe mis à jour

	require 'inc/config.php';

	$token = 'none';
	$error = false;

	if (isset($_GET['token'])) {
		$token = $_GET['token'];
	}

	$prepare = $pdo->prepare('SELECT token FROM forgot WHERE token = :token LIMIT 1');
	$prepare->bindValue(':token',$token);
	$prepare->execute();
	$token = $prepare->fetch();

	// POST won't be empty only if there is a token, cause the form will only show if there is a token.
	if(!empty($_POST)) {
		$errorsList = array();
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];

		//Error check, the same that in the registering page

		if (empty($password)) {
			$error = true;
			array_push($errorsList, 'Your password is missing');
		}
		else if (!preg_match(REGEX, $password)) {
			$error = true;
			array_push($errorsList, 'Your password must be at least 10-character long and must countain a capital letter, a number and a special symbol such as ! , ? ');			
		}
		else if (empty($repassword)) {
			$error = true;
			array_push($errorsList, 'Your must type your password two times.');
		}

		else if ($password != $repassword) {
			$error = true;
			array_push($errorsList, 'The passwords do not match');
		}
		if (empty($errorsList)) {
			//if there is no error with the new password we get the mail that matches the token
			$token = $_GET['token'];
			$prepare = $pdo->prepare('SELECT mail FROM forgot WHERE token = :token LIMIT 1');
			$prepare->bindValue(':token',$token);
			$prepare->execute();
			$mail = $prepare->fetch();
			// we store the mail
			$mail = $mail->mail;
			// we update the password that matches the mail in the other table
			$prepare = $pdo->prepare('UPDATE users SET password = :password WHERE mail = :mail LIMIT 1');
			$prepare->bindValue(':password',hash('sha256',SALT.$password));
			$prepare->bindValue(':mail',$mail);
			$prepare->execute();
			// we say that password has been updated
			$sent = true;
			// we remove token from forgot table
			$prepare = $pdo->prepare('DELETE FROM forgot WHERE mail = :mail LIMIT 1');
			$prepare->bindValue(':mail',$mail);
			$prepare->execute();
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reset your password</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php if ($token) { ?>
		<div class="connect_box" <?php if ($error == true) { echo 'style="-webkit-animation: errorAnim 0.8s;"'; } ?> >
		<img src="src/img/logo.png" alt="">
	<?php if (isset($sent)) { ?>
		<h1>Your password has been updated.</h1>
	<?php } else { ?>
		<h1>Enter your new password</h1>
		<form action="#" method="POST">
		<input type="password" name="password" placeholder="New password" id="np">
		<br>
		<input type="password" name="repassword" placeholder="Confirm your new password">
		<br>
		<input type="submit" value="">
	</form>
	<?php } ?>
<?php if (!empty($errorsList)) { foreach ($errorsList as $_errorsList) { ?>
			<h2><?= $_errorsList ?></h2>
			<?php } ?>
	</div>
	<?php	} }
	// If the token doesn't match we display an error message
		else {
	?>
	<div class="connect_box" <?php if ($error == true) { echo 'style="-webkit-animation: errorAnim 0.8s;"'; } ?> >
	<img src="src/img/logo.png" alt="">
	<h1>Your token has expired</h1>
	</div>
	<?php } ?>
</body>
</html>