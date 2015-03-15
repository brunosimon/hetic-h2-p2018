<?php
	include 'inc/config.php';
	include 'php/form_resetpassword.php';
	if(isset($_SESSION['id_users'])) return header('Location: ./private.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<meta charset="UTF-8">
	<title>Mot de passe oublié | Graphity</title>
</head>
<body class="preload">
	<div class="resetpassword">
		<h1>Graphity</h1>
		<h2>Redéfinir mot de passe</h2>

		<!-- GOOD FORM MESSAGE -->
		<?php if(isset($good) && $good) { ?>
			<p class="good">Un email vient de vous être envoyé avec les instructions nécessaires pour changer votre mot de passe.</p>
			<a href="signin.php" class="backhome">Connexion</a>	
		<?php } else { ?>
		<!-- RESET PASSWORD FORM -->
			<?php if(isset($errors)) { ?><p class="errors"><?php echo $errors; ?></p><?php } ?>
			<form class="form_resetpassword" method="post" action="#">
					<input class="<?= array_key_exists('email', $errors) ? 'error' : '' ?>" type="text" name="email" id="email" placeholder="Email" autofocus>
				<input class="full" type="submit" value="Envoyer" name="send">
			</form>
			<div class="createaccount">Vous n'avez pas encore de compte ?
				<a href="./signup.php">Créer un compte maintenant</a>
			</div>
		<?php } ?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>