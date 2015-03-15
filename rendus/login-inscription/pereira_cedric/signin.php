<?php
	include 'inc/config.php';
	include 'php/form_signin.php';
	if(isset($_SESSION['id_users'])) return header('Location: ./private.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<meta charset="UTF-8">
	<title>Connexion | Graphity</title>
</head>
<body class="preload">
	<div class="signin">
		<h1>Graphity</h1>
		<h2>Connexion</h2>
		<!-- ERRORS -->
		<?php if(isset($errors)) { ?><p class="errors"><?php echo $errors; ?></p><?php } ?>
		<form class="form_signin" method="post" action="#">
			<input class="<?= isset($errors) ? 'error' : '' ?>" type="text" name="email" id="email" placeholder="Email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" autofocus>
		    <input class="<?= isset($errors) ? 'error' : '' ?>" type="password" name="password" id="password" placeholder="Mot de passe">     
			<input type="checkbox" name="rememberme" value="rememberme" id="rememberme"><label for="rememberme">Maintenir la connexion</label>
			<input type="submit" value="Connexion" name="send">
		</form>
		<a class="resetpassword" href="resetpassword.php">Mot de passe oublié ?</a>
		<div class="createaccount">Vous n'avez pas encore de compte ?
			<a href="signup.php">Créer un compte maintenant</a>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>