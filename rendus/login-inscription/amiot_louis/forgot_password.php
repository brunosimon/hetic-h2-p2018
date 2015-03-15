<?php 
	
// 	PAGE MDP OUBLIE
// - Vérification que le mail est bien inscrit dans la base de donnée
// - Envoi par mail d’un lien avec un token unique qui expire à minuit via les EVENEMENTS SQL
// - Message de confirmation de l’envoie du mail


	require 'inc/config.php';

	if (!empty($_POST)) {

		// we check if mail that has been entered by user is in db
		$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');
		$prepare->bindValue(':mail',$_POST['mail']);

		$prepare->execute();
		$user = $prepare->fetch();
		// if it's not we display an error message
		if(!$user) {
			$error = 'No account exists with this mail.';
		}
		else {
			//else we create a unique token
			$random_key = md5(microtime().rand());
			// we send him the token by mail
		    $to      = $_POST['mail'];
		    $subject = 'Change your password now !';
		    $message = 'Hello !
		    You asked to reset your password.
		    Here\'s the link to do so: http://localhost:8888/H2_G1_LOUIS_AMIOT/reset_password.php?token='.$random_key.'
		    (This link will expire at midnight (French time)).

		    Yours,

		    LiveSpace team';
		    $headers = 'From: louis.amiot92@gmail.com' . "\r\n" .
		    'Reply-To: louis.amiot92@gmail.com' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();

		    $mail = mail($to, $subject, $message, $headers);
		    $sent = true;
		    // we store the token in a new table in db to check it later on
		    $prepare = $pdo->prepare('INSERT INTO forgot (mail,token) VALUES (:mail,:token) ');
			$prepare->bindValue(':mail',$_POST['mail']);
			$prepare->bindValue(':token',$random_key);
			$prepare->execute();
		}
	}
 ?>
<!DOCTYPE <html></html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Did you forget your password ?</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="forgot_box" <?php if (isset($error)) { echo 'style="-webkit-animation: errorAnim 0.8s;"'; } ?> >
	<img src="src/img/logo.png" alt="">
	<?php if (isset($sent)) {
		?>
		<h1>A mail has been sent.</h1>
		<?php
		} else { ?>
	<h1>Forgot your password ?</h1>
	<form action="#" method="POST">
		<input type="text" placeholder="Type your email" name="mail">
		<input type="submit" value="">
	</form>
	<h2><?php if(isset($error)) { echo $error; } ?></h2>
	<?php } ?>
</div>
</body>
</html>