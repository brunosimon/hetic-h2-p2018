<?php
	include 'inc/config.php';
	include 'php/form_signup.php';
	if(isset($_SESSION['id_users'])) return header('Location: ./private.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<meta charset="UTF-8">
	<title>Inscription | Graphity</title>
</head>
<body class="preload">
	<div class="signup">
		<h1>Graphity</h1>
		<h2>Créer un compte</h2>
		<p class="backtosignin <?php if(isset($good) && $good) echo 'hide'; ?>"> Vous avez déjà un compte, <a href="signin.php">connectez-vous.</a><span>* Champs obligatoires</span></p>

		<!-- ERRORS -->
		<?php if(!empty($errors)) { ?>
			<p class="errors">	
				<?php foreach ($errors as $_error) { ?>
						<?php echo $_error ?><br/>
				<?php } ?>
			</p>
		<?php } ?>
		<!-- ACCOUNT CREATE -->
		<?php if(isset($good) && $good) { ?>
			<p class="good">Bravo votre compte a été créé, il ne vous reste plus qu'a le valider via l'email que nous venons de vous envoyer.</p>
			<a href="signin.php" class="backhome">Connexion</a>
		<?php } else { ?>
		<!-- FORM ACCOUNT CREATION -->
		<form class="form_signup" method="post" action="#">
			<label for="name">Nom *<br/>
				<input class="semi <?= array_key_exists('firstname', $errors) ? 'error' : '' ?>" type="text" name="firstname" id="firstname" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>" placeholder="Prénom">
			    <input class="semi <?= array_key_exists('lastname', $errors) ? 'error' : '' ?>" type="text" name="lastname" id="lastname" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>" placeholder="Nom">    
			</label>
			<label for="email">Email *<br/>
				<input class="full <?= array_key_exists('email', $errors) ? 'error' : '' ?>" type="email" name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
			</label>
			<label for="password">Mot de passe *<br/>
				<input class="full <?= array_key_exists('password', $errors) ? 'error' : '' ?>" type="password" name="password" id="password"><p>8 caractères minimum avec au moins 1 chiffre et 1 majuscule</p>
			</label>
			<label for="confirmpassword">Retapez le mot de passe *<br/>
				<input class="full <?= array_key_exists('confirmpassword', $errors) ? 'error' : '' ?>" type="password" name="confirmpassword" id="confirmpassword">
			</label>
			<label for="birthday">Date de naissance<br/>
				<input class="full <?= array_key_exists('birthday', $errors) ? 'error' : '' ?>" type="date" name="birthday" id="birthday" value="<?php if(isset($_POST['birthday'])) echo $_POST['birthday']; ?>">
			</label>
			<label for="postalcode">Code postal<br/>
				<input class="semi" type="text" name="postalcode" id="postalcode" value="<?php if(isset($_POST['postalcode'])) echo $_POST['postalcode']; ?>">
				<p>Ville</p>
				<input class="semi" type="text" name="city" id="city" value="<?php if(isset($_POST['city'])) echo $_POST['city']; ?>">
			</label>
			<label for="gender_male">Genre *<br/>
				<input class="<?= (isset($_POST['send']) && isset($_POST['gender']) && ($_POST['gender'] == 'homme')) ? 'checked' : '' ?>" type="radio" name="gender" id="gender_male" value="homme">Homme
			</label>
			<label for="gender_female">
				<input class="<?= (isset($_POST['send']) && isset($_POST['gender']) && ($_POST['gender'] == 'femme')) ? 'checked' : '' ?>" type="radio" name="gender" id="gender_female" value="femme">Femme
			</label>
			<div class="g-recaptcha" data-sitekey="6Lf4DQMTAAAAAH9yvjxNOoHUe28QqssSVX0Rqr_b"></div>
			<label for="terms" class="full <?php if(isset($_POST['send']) && !$_POST['terms']) echo 'error'; ?>">
				<input class="<?= !$_POST['terms'] ? 'error' : '' ?>" type="checkbox" name="terms" id="terms">J'accepte les conditions générales d'utilisation *
			</label>
				<input class="full" type="submit" name="send" value="Inscription">
		</form>	
		<?php } ?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/main.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>