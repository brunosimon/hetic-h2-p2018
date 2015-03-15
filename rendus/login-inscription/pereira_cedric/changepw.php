<?php
	include 'inc/config.php';
	include 'php/form_changepw.php';
	if(isset($_SESSION['id_users'])) return header('Location: /private.php');
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
		<!-- PASSWORD CHANGES ACCEPTED -->
		<?php if(isset($good) && $good) { ?>
			<p class="good">Votre mot de passe vient d'être changé, vous pouvez désormais vous connecter.</p>
			<a href="signin.php" class="backhome">Connexion</a>	
		<?php } else { ?>
			<!-- ERRORS -->
			<?php if(isset($errors)) { ?><p class="errors"><?php echo $errors; ?></p><?php } ?>
			<!-- PASSWORD CHANGES FORM -->
			<form class="form_resetpassword" method="post" action="#">
					<input class="<?= array_key_exists('email', $errors) ? 'error' : '' ?>" type="password" name="password" id="password" placeholder="Mot de passe" required autofocus>
					<input class="<?= array_key_exists('email', $errors) ? 'error' : '' ?>" type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirmer mot de passe" required>
				<input class="full" type="submit" value="Envoyer" name="send">
			</form>
		<?php } ?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>