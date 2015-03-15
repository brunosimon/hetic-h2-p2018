<?php
session_start();
require('inc/config.php');
include 'inc/form.php';

// if signup, check user data
if(!empty($_SESSION['pseudo'])) {
	$prepare = $pdo -> prepare('SELECT * FROM users WHERE pseudo = :pseudo LIMIT 1');
	$prepare -> bindValue(':pseudo',$_SESSION['pseudo']);
	$prepare -> execute();
	$user = $prepare -> fetch();
	$first_name = $user -> first_name;
	$last_name = $user -> last_name;
	$hours_signup = explode(' ', $user -> last_signup);
	$date_signup = explode('-', $hours_signup[0]);
	$hours_signin = explode(' ', $user -> date_signin);
	$date_signin = explode('-', $hours_signin[0]);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= empty($_SESSION['pseudo'])?'Formulaire BDD | Jean Law Yim':$first_name.' '.$last_name.' | Account' ?></title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
	<?php
	// if connected
	if(!empty($_SESSION['pseudo'])) {
		// display personnal informations
	?>
		<h1>Espace membre</h1>

		<p class="infos-login">
			Connecté en tant que : <?= $_SESSION['pseudo'] ?>
			<span><a href="logout.php">Se déconnecter</a></span>
		</p>

		<fieldset>
		<legend>Informations personnelles</legend>
			<div>
				<p>
					<label>: Prénom</label>
					<?= $first_name ?>
				</p>
			</div>
			<div>
				<p>
					<label>: Nom</label>
					<?= $last_name ?>
				</p>
			</div>
			<div>
				<p>
					<label>: Email</label>
					<?= $user -> email ?>
				</p>
			</div>
			<div>
				<p>
					<label>: Lieu d'habitation</label>
					<?= $user -> country ?>
				</p>
			</div>
			<div>
				<p>
					<label>: Inscription</label>
					<?php echo $date_signin[2]; ?>/<?php echo $date_signin[1]; ?>/<?php echo $date_signin[0]; ?> à <?php echo $hours_signin[1]; ?></p>
			</div>
			<div>
				<p>
					<label>: Dernière connexion</label>
					<?php echo $date_signup[2]; ?>/<?php echo $date_signup[1]; ?>/<?php echo $date_signup[0]; ?> à <?php echo $hours_signup[1]; ?></p>
			</div>
		</fieldset>
		<!-- Form for change password -->
		<form action="#" method="POST">
			<fieldset>
				<legend>Modifier mes informations</legend>
				<span style="margin-bottom:25px;font-size : 12pt;margin-left: 0px;">
					<?= array_key_exists('autre', $errors)?$errors['autre']:'Attention : vous serez automatiquement déconnecté après avoir modifié votre mot de passe' ?>
				</span>
				<div>
					<p>
						<label for="password">: Password</label>
						<input type="password" name="password" id="password" value="" placeholder="Password" required>
						<span><?= array_key_exists('password', $errors)?$errors['password']:'' ?></span>
					</p>
				</div>
				<div>
					<p>
						<label for="password_confirm">: Confirm password</label>
						<input type="password" name="password_confirm" id="password_confirm" value="" placeholder="Confirm Password" required>
						<span><?= array_key_exists('password_confirm', $errors)?$errors['password_confirm']:'' ?></span>
					</p>
				</div>
				<p><input type="submit" name="change" value="Modifier"></p>
			</fieldset>
		</form>

	<?php
	}
	// if not connected
	else {
		// check if p is given in URL parameter
		if(isset($_GET['p']) && !empty($_GET['p'])) {
			$page = $_GET['p'];
			// if p value is "signup"
			if($page == "signup") {
	?>
				<h1>Connexion</h1>

				<p class="<?= array_key_exists('autre', $errors)?'not-valid':'' ?>">
					<?= array_key_exists('autre', $errors)?$errors['autre']:'Pas encore inscrit ? Cliquez <a href="index.php">ici</a> pour vous créer un compte : c\'est facile et rapide !' ?>
				</p>
				
				<!-- Display the signup form -->

				<form action="#" method="POST">
					<fieldset>
						<legend>Identifiants</legend>
						<div>
							<p>
								<label for="pseudo">: Pseudo</label>
								<input type="text" name="pseudo" id="pseudo" value="" placeholder="Pseudo" required>
								<span><?= array_key_exists('pseudo', $errors)?$errors['pseudo']:'' ?></span>
							</p>
						</div>
						<div>
							<p>
								<label for="password">: Password</label>
								<input type="password" name="password" id="password" value="" placeholder="Password" required>
								<span><?= array_key_exists('password', $errors)?$errors['password']:'' ?></span>
							</p>
						</div>
						<input type="submit" value="Sign Up" name="signup">
					</fieldset>
				</form>
	<?php
			}
			// if another value is given to p, go to index.php -> signin form
			else {
	?>
				<script>
				document.location.href="index.php";
				</script>
	<?php
			}
		}
		// then, parameter p does not exist, we display the signin form
		else {
	?>
			<h1>Inscription</h1>

	<?php
			// If try to signin and signin ok
			if(isset($success) && ($success == true)) {
	?>
				<p class="sign-ok">Votre inscription a bien été prise en compte, vous allez être redirigé d'ici quelques instants sur la page de connexion.</p>
				<p>Vous pouvez cliquer <a href="#">ici</a> si vous ne voulez pas attendre...</p>
				<script>
					window.setTimeout("location=('index.php?p=signup');",3000);
				</script>
	<?php
			}
			// else, display the form
			else {
	?>

				<form action="index.php" method="POST">

					<p class="<?= array_key_exists('validate', $errors)?'not-valid':'' ?>">
						<?= array_key_exists('validate', $errors)?'Une erreur est survenue lors de l\'inscription. Merci de réessayer ultérieurement.':'Déjà inscrit ? Cliquez <a href="index.php?p=signup">ici</a> pour vous connecter.' ?>
					</p>

					<fieldset>
						<legend>Informations</legend>
						<div>
							<p>
								<label for="pseudo">: Pseudo</label>
								<input type="text" name="pseudo" id="pseudo" value="<?php if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])) { echo $_POST['pseudo']; } ?>" placeholder="Pseudo" required>
								<span><?= array_key_exists('pseudo', $errors)?$errors['pseudo']:'' ?></span>
							</p>
						</div>
						<div>
							<p>
								<label for="password">: Password</label>
								<input type="password" name="password" id="password" value="" placeholder="Password" required>
								<span><?= array_key_exists('password', $errors)?$errors['password']:'' ?></span>
							</p>
						</div>
						<div>
							<p>
								<label for="password_confirm">: Confirm password</label>
								<input type="password" name="password_confirm" id="password_confirm" value="" placeholder="Confirm Password" required>
								<span><?= array_key_exists('password_confirm', $errors)?$errors['password_confirm']:'' ?></span>
							</p>
						</div>
					</fieldset>
					<fieldset>
						<legend>Identity and contact</legend>
						<div>
							<p>
								<label for="last_name">: Last name</label>
								<input type="text" name="last_name" id="last_name" value="<?php if(isset($_POST['last_name']) && !empty($_POST['last_name'])) { echo $_POST['last_name']; } ?>" placeholder="Last Name" required>
								<span><?= array_key_exists('last_name', $errors)?$errors['last_name']:'' ?></span>
							</p>
						</div>
						<div>
							<p>
								<label for="first_name">: First name</label>
								<input type="text" name="first_name" id="first_name" value="<?php if(isset($_POST['first_name']) && !empty($_POST['first_name'])) { echo $_POST['first_name']; } ?>" placeholder="First Name" required>
								<span><?= array_key_exists('first_name', $errors)?$errors['first_name']:'' ?></span>
							</p>
						</div>
						<div>
							<p>
								<label for="email">: Email</label>
								<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']) && !empty($_POST['email'])) { echo $_POST['email']; } ?>" placeholder="Email" required>
								<span><?= array_key_exists('email', $errors)?$errors['email']:'' ?></span>
							</p>
						</div>
						<div>
							<p>
								<label for="country">: Country</label>
								<select name="country" id="country" required>
									<option value=""> </option>
									<option value="Allemagne" <?= $_POST['country']=='Allemagne'?'selected':'' ?> >Allemagne</option>
									<option value="Chine" <?= $_POST['country']=='Chine'?'selected':'' ?> >Chine</option>
									<option value="France" <?= $_POST['country']=='France'?'selected':'' ?> >France</option>
									<option value="Japon" <?= $_POST['country']=='Japon'?'selected':'' ?> >Japon</option>
									<option value="Russie" <?= $_POST['country']=='Russie'?'selected':'' ?> >Russie</option>
								</select>
								<span><?= array_key_exists('country', $errors)?$errors['country']:'' ?></span>
							</p>
						</div>
					</fieldset>
					<input type="submit" value="Sign In" name="signin">
				</form>
	<?php
			}

		}
	}
	?>

</body>
</html>