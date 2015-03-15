<?php
require 'inc/config.php';
require 'inc/form.php';
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Inscription</title>
		<link rel="stylesheet" href="inc/style.css">
	</head>

	<body>

		<h1>Inscription</h1>
		
		<?php if(!empty($errors)){ ?>
			<div class="errors">
				<?php foreach($errors as $_error){ ?>
					<p>
						<?php echo $_error; ?>
					</p>
				<?php } ?>
			</div>
		<?php } ?>

		<?php if(!empty($success)){ ?>
			<div class="success">
				<?php foreach($success as $_success){ ?>
					<p>
						<?php echo $_success; ?>
					</p>
				<?php } ?>
			</div>
		<?php } ?>

		<form action="#" method="POST">

			<div class="<?= array_key_exists('name', $errors) ? 'error' : '' ?>">
				<label for="name">Nom</label>
				<input type="text" placeholder="Votre nom" id="name" name="name" value="<?= $_POST['name'] ?>">
			</div>

			<div class="<?= array_key_exists('age', $errors) ? 'error' : '' ?>">
				<label for="age">Âge</label>
				<input type="number" placeholder="Votre âge" id="age" name="age" value="<?= $_POST['age'] ?>">
			</div>

			<div class="<?= array_key_exists('gender', $errors) ? 'error' : '' ?>">
				<label>
				Femme
				<input type="radio" name="gender" value="female" <?= $_POST['gender'] == 'female' ? 'checked' : '' ?>>
				</label>

				<label>
				Homme
				<input type="radio" name="gender" value="male" <?= $_POST['gender'] == 'male' ? 'checked' : '' ?>>
				</label>
			</div>

			<div class="<?= array_key_exists('mail', $errors) ? 'error' : '' ?>">
				<label for="mail">Email</label>
				<input type="text" placeholder="Votre adresse email" id="mail" name="mail" value="<?= $_POST['mail'] ?>">
			</div>

			<div class="<?= array_key_exists('password', $errors) ? 'error' : '' ?>">
				<label for="password">Mot de passe</label>
				<input type="password" placeholder="Votre mot de passe" id="password" name="password" value="<?= $_POST['password'] ?>">
			</div>

			<div class="<?= array_key_exists('retype_password', $errors) ? 'error' : '' ?>">
				<label for="retype_password">Vérification du mot de passe</label>
				<input type="password" placeholder="Resaisissez votre mot de passe" id="retype_password" name="retype_password" value="<?= $_POST['retype_password'] ?>">
			</div>

			<div>
				<input type="submit">
			</div>

			<a href="login.php" target="_blank">
				<input type="button" value="Déjà membre ? Connexion">
			</a>

		</form>

	</body>

</html>