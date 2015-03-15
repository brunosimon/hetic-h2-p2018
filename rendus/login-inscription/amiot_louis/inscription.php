<?php

// PAGE INSCRIPTION
// - Inscription avec champs Prénom, Nom, Age, Email et Mot de Passe (2x)
// - Vérification que le prénom est bien un prénom (au moins 1 lettre)
// - Vérification que le nom est bien un nom (au moins 1 lettre)
// - Vérification que l’âge est bien un âge possible (compris entre 1 et 125 ans)
// - Vérification que l’email est un email valide
// - Vérification que l’email n’est pas dans la base de donnée
// - Mot de passe doit obligatoirement contenir une majuscule, un chiffre et un caractère spécial et doit faire au moins 8 caractères avec un REGEX
// - Les deux mots de passe doivent matcher
// - Affichage des erreurs précises en cas d’erreur
// - Si pas d’erreur, affichage d’un message qui dit qu’un mail a été envoyé afin de vérifier le compte.
// - Si pas d’erreur, envoi d’un mail pour valider le compte

	require 'inc/config.php';
	$errorFN = false;
	$errorLN = false;
	$errorA = false;
	$errorM = false;
	$errorP = false;
	$errorsList = array();

	if (!empty($_POST)) {

		$mail = $_POST['mail'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname']; 
		$age = $_POST['age'];
		$firstnameForbidden = strcspn($_POST['firstname'], '0123456789:/+=£$*%¨^°');
		$lastnameForbidden = strcspn($_POST['lastname'], '0123456789:/+=£$*%¨^°');

		//TEST FIRST NAME
		if (empty($firstname)) {
			$errorFN = true;
			array_push($errorsList, 'Your first name is missing');
		}
		else if ((strlen($firstname) < 2) || ($firstnameForbidden != strlen($firstname))) {
			$errorFN = true;
			array_push($errorsList, 'Your first name is too short or contains forbidden characters');
		}

		//TEST LAST NAME
		if (empty($lastname)) {
			$errorLN = true;
			array_push($errorsList, 'Your last name is missing');
		}
		else if ((strlen($lastname) < 2) || ($lastnameForbidden != strlen($lastname))) {
			$errorLN = true;
			array_push($errorsList, 'Your last name is too short or contains forbidden characters');
		}

		//TEST AGE
		if (empty($age)) {
			$errorA = true;
			array_push($errorsList, 'Your age is missing');
		}
		else if ($age < 1 || $age > 125) {
			$errorA = true;
			array_push($errorsList, 'Your age is impossible');			
		}

		//TEST MAIL
		if (empty($mail)) {
			$errorM = true;
			array_push($errorsList, 'Your email is missing');
		}
		else if (!filter_var($mail,FILTER_VALIDATE_EMAIL)) {
			$errorM = true;
			array_push($errorsList, 'Your email is unvalid');			
		}

		// TEST PASSWORD
		if (empty($password)) {
			$errorP = true;
			array_push($errorsList, 'Your password is missing');
		}
		else if (!preg_match(REGEX, $password)) {
			$errorP = true;
			array_push($errorsList, 'Your password must be at least 10-character long and must countain a capital letter, a number and a special symbol such as ! , ? ');			
		}
		else if (empty($repassword)) {
			$errorP = true;
			array_push($errorsList, 'Your must type your password two times.');
		}

		if ($password != $repassword) {
			$errorP = true;
			array_push($errorsList, 'The passwords do not match');
		}

		// If mail already in db, we send an error message
		$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');
		$prepare->bindValue(':mail',$mail);
		$prepare->execute();
		$theMail = $prepare->fetch();
		if ($theMail) {
			array_push($errorsList, 'Your mail is alreay registered. <a href="login.php" >Connect now !</a>');
		}

		// If there are no erros, we add user to db
		if (empty($errorsList)) {
			$random_key = md5(microtime().rand());
			$prepare = $pdo->prepare('INSERT INTO users (mail,password,firstname,lastname,age,verifyhash) VALUES (:mail,:password,:firstname,:lastname,:age,:verifyhash)');
			$prepare->bindValue(':mail',$mail);
			$prepare->bindValue(':password',hash('sha256',SALT.$password));
			$prepare->bindValue(':firstname',$firstname);
			$prepare->bindValue(':lastname',$lastname);
			$prepare->bindValue(':age',$age);
			$prepare->bindValue(':verifyhash',$random_key);			
			$prepare->execute();
			// We send user a mail in order to verify is account
		    $to      = $mail;
		    $subject = 'Verify your account now !';
		    $message = 'Hello !
		    In order to activate your account, please click this link: http://localhost:8888/H2_G1_LOUIS_AMIOT/account_verify.php?token='.$random_key.'
		    Yours,
		    LiveSpace team';
		    $headers = 'From: louis.amiot92@gmail.com' . "\r\n" .
		    'Reply-To: louis.amiot92@gmail.com' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();
		    die($message);
		    $mail = mail($to, $subject, $message, $headers);
		}

	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registering to LiveSpace</title>
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="go_connection">
		<a href="login.php">Already have an account ? Go back to login page.</a>
	</div>
	<?php if (empty($_POST) || !empty($errorsList)) { ?>
	<div class="register_box">
		<img src="src/img/logo.png" alt="">
		<h1>Register to LiveSpace</h1>	
		<form action="#" method="POST">
			<?php foreach ($errorsList as $_errorsList) { ?>
			<p><?= $_errorsList ?></p>
			<?php } ?>
			<input class="<?php if ($errorFN) { echo 'error'; } ?>" type="text" name="firstname" placeholder="First name" value="<?php if (!empty($_POST)) { echo $firstname; } ?>">
			<br>
			<input class="<?php if ($errorLN) { echo 'error'; } ?>" type="text" name="lastname" placeholder="Last name" value="<?php if (!empty($_POST)) { echo $lastname; } ?>">
			<br>
			<input class="<?php if ($errorA) { echo 'error'; } ?>" type="text" name="age" placeholder="Age" value="<?php if (!empty($_POST)) { echo $age; } ?>">
			<br>
			<input class="<?php if ($errorM) { echo 'error'; } ?>" type="text" name="mail" placeholder="Email" value="<?php if (!empty($_POST)) { echo $mail; } ?>">
			<br>
			<input class="<?php if ($errorP) { echo 'error'; } ?>" type="password" name="password" placeholder="Password">
			<br>
			<input class="<?php if ($errorP) { echo 'error'; } ?>" type="password" name="repassword" placeholder="Confirm your password">
			<br>
			<input type="submit" value="Continue">
		</form>
	</div>
	<?php } else { ?>
	<div class="connect_box">
		<img src="src/img/logo.png" alt="">
		<h1>Your account has been made, please verify it by clicking the activation link that has been sent to your email.</h1>
	</div>
	<?php } ?>
</body>
</html>