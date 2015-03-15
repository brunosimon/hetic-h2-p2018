<?php
	session_start();
	require 'inc/config.php';

	$prepare = $pdo->prepare('SELECT * FROM users_session WHERE session_id = :session_id LIMIT 1');

	$prepare->bindValue(':session_id', session_id());
	$prepare->execute();
	$userID = $prepare->fetch();

	if ($userID){
		header('Location: index.php');
	}

	if (!empty($_POST)) {
		$prepare 		 = $pdo->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
		
		$prepare->bindValue(':username',$_POST['username']);
		$prepare->bindValue(':email',$_POST['email']);
		$prepare->bindValue(':password', hash('sha256',SALT.$_POST['password']));

		$errors  = array();
		$success = array();

		if (empty($_POST['username'])) {
			$errors['username'] = 'Veuillez indiquer un identifiant.';
		}

		else {
			$prepareUsername = $pdo->prepare('SELECT * FROM users WHERE username = :username LIMIT 1');
			$prepareUsername->bindValue(':username', $_POST['username']);

			$prepareUsername->execute();
			$usernameQueryResult = $prepareUsername->fetch();

			if (!preg_match("/^[A-z0-9_-]{3,16}$/", $_POST['username'])) {
				$errors['username'] = 'Votre identifiant doit faire entre 3 et 16 caractères et ne pas contenir de caractères spéciaux autre que _ et -.';
			}

			else if ($usernameQueryResult) {
				$errors['username'] = 'Cet identifiant est déjà pris.';
			}

			else {
				$success[] = 'username';
				unset($errors['username']);
			}
		}

		if (empty($_POST['email'])) {
			$errors['email'] = 'Veuillez indiquer un e-mail.';
		}

		else {
			$prepareEmail = $pdo->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
			$prepareEmail->bindValue(':email', $_POST['email']);

			$prepareEmail->execute();
			$emailQueryResult = $prepareEmail->fetch();

			if (!preg_match("/^[^@]+@[^@]+\.[^@]{2}[^@]*$/", $_POST['email'])) {
				$errors['email'] = 'Votre e-mail n\'est pas valide.';
			}

			else if ($emailQueryResult) {
				$errors['email'] = 'Cet e-mail est déjà utilisé.';
			}

			else {
				$success[] = 'email';
				unset($errors['email']);
			}
		}

		if (empty($_POST['password'])) {
			$errors['password'] = 'Veuillez indiquer un mot de passe.';
		}

		else {
			if (strlen($_POST['password']) < 6) {
				$errors['password'] = 'Votre mot de passe doit faire au moins 6 caractères.';
			}

			else {
				$success[] = 'password';
				unset($errors['password']);
			}
		}

		if (empty($_POST['passwordconfirm'])) {
			$errors['passwordconfirm'] = 'Veuillez confirmer votre mot de passe.';
		}

		else {
			if ($_POST['passwordconfirm'] != $_POST['password']) {
				$errors['passwordconfirm'] = 'Vos mots de passe ne correspondent pas.';	
			}
			else {
				$success[] = 'passwordconfirm';
				unset($errors['passwordconfirm']);
			}
		}

		$response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfdMgMTAAAAALEXCC_nq7QEmKSvAS1pIo0p-fLW&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']),true);

		if (empty($_POST['g-recaptcha-response'])){
			$errors['captcha'] = 'Veuillez cocher le formulaire captcha.';
		}

		else {
			if ($response['success'] == false){
				$errors['captcha'] = 'Vous avez été détecté comme étant un robot. Veuillez réessayer.';
			}

			else {
				$success[] = 'captcha';
				unset($errors['captcha']);
			}
		}

		if (in_array('username', $success) && in_array('email', $success) && in_array('password', $success) && in_array('passwordconfirm', $success) && in_array('captcha', $success)) {
			header('Location: login.php');
			$prepare->execute();
		}
	}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="style/style.css"/>
</head>
<body>
	<div class="container-inscription">
		<h1>NOM DU SITE</h1>
		<p class="presentation">Inscrivez-vous ici.</p>

		<div class="formulaire">
			<form action="#" method="POST">
				<label> 
					<p class="info">Identifiant</p>
					<input type="text" name="username" placeholder="Identifiant" value="<?= isset($_POST['username']) ? $_POST['username'] : ''; ?>">
				</label>
				
				<?php if (isset($errors['username'])) echo '<p class="error">'.$errors['username'].'</p>'; ?>

				<label> 
					<p class="info">E-mail</p>
					<input type="text" name="email" placeholder="E-mail" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">
				</label>
				
				<?php if (isset($errors['email'])) echo '<p class="error">'.$errors['email'].'</p>'; ?>

				<label> 
					<p class="info">Mot de passe</p>
					<input type="password" name="password" placeholder="Mot de passe"> 
				</label>			
				
				<?php if (isset($errors['password'])) echo '<p class="error">'.$errors['password'].'</p>'; ?>

				<label> 
					<p class="info">Confirmer votre mot de passe</p>
					<input type="password" name="passwordconfirm" placeholder="Confirmez mot de passe"> 
				</label>

				<?php if (isset($errors['passwordconfirm'])) echo '<p class="error">'.$errors['passwordconfirm'].'</p>'; ?>
				
		  		<div class="g-recaptcha" data-sitekey="6LfdMgMTAAAAAJqi4tt9NBNwC-Wf3go9OISowaHN"></div>

		  		<?php if (isset($errors['captcha'])) echo '<p class="error">'.$errors['captcha'].'</p>'; ?>
		  		
		  		<input type="submit" value="Valider">
			</form>
		</div>

		<p class="login">Vous avez déjà un compte? Connectez-vous <a class="lien1" href="login.php">ici</a>.</p>
	</div>

	<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>