<?php

require 'inc/config.php';
require 'inc/form.php';

// affiche erreur
function put_error($type)
{
	global $errors;
	return array_key_exists($type, $errors) ? '<span class="alert">' . $errors[$type] . '</span>' : '';
}

// garde valeur si correcte
function maintain_value($type)
{
	global $errors;
	if(isset($_POST[$type]))
	{
		if(!array_key_exists($type, $errors))
			echo $_POST[$type];
	}
}

// garde valeur si correcte pour select
function maintain_select($select, $option_value)
{
	if($_POST[$select] == $option_value)
		return true;
	return false;
}

// Envoie des donnée à la BDD
function send_data()
{
	global $pdo;
	$prepare = $pdo->prepare('INSERT INTO site_diablo (pseudo, mail, password, age, birth, gender, class, valid) VALUES (:pseudo, :mail, :password, :age, :birth, :gender, :class, :valid)');

	$prepare->bindValue(':pseudo'  , $_POST['pseudo']);
	$prepare->bindValue(':mail'    , $_POST['mail']);
	$prepare->bindValue(':password', hash('sha256', PREFIX_SALT.$_POST['password'].SUFFIX_SALT));
	$prepare->bindValue(':age'     , $_POST['age']);
	$prepare->bindValue(':birth'   , $_POST['birth']);
	$prepare->bindValue(':gender'  , $_POST['gender']);
	$prepare->bindValue(':class'   , $_POST['class']);
	$prepare->bindValue(':valid'   , false);

	$prepare->execute();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
	<link rel="stylesheet" href="src/css/style.css"></link>
</head>
<body class="body-registration">

	<h1>Inscription</h1>

	<form action="#" method="POST">

		<div class="<?= array_key_exists('pseudo', $errors) ? 'error' : '' ?>">
			<label for="pseudo">Pseudo</label>
			<input type="text" name="pseudo" id="pseudo" value="<?php maintain_value('pseudo') ?>" placeholder="Votre pseudo">
			<?php echo put_error('pseudo'); ?>
		</div>

		<div class="<?= array_key_exists('mail', $errors) ? 'error' : '' ?>">
			<label for="mail">Mail</label>
			<input type="mail" name="mail" id="mail" value="<?php maintain_value('mail') ?>" placeholder="Votre adresse mail">
			<?php echo put_error('mail'); ?>
		</div>

		<div class="<?= array_key_exists('mail', $errors) ? 'error' : '' ?>">
			<label for="mail_confirm">Confirmation du mail</label>
			<input type="mail" name="mail_confirm" id="mail_confirm" value="<?php maintain_value('mail_confirm') ?>" placeholder="Validez votre adresse mail">
		</div>

		<div class="<?= array_key_exists('password', $errors) ? 'error' : '' ?>">
			<label for="password">Mot de passe</label>
			<input type="password" name="password" id="password" value="<?php maintain_value('password') ?>" placeholder="Votre mot de passe">
			<?php echo put_error('password'); ?>
		</div>

		<div class="<?= array_key_exists('password', $errors) ? 'error' : '' ?>">
			<label for="password_confirm">Confirmation mot de passe</label>
			<input type="password" name="password_confirm" id="password_confirm" value="<?php maintain_value('password_confirm') ?>" placeholder="Validez votre mot de passe">
		</div>

		<div class="<?= array_key_exists('age', $errors) ? 'error' : '' ?>">
			<label for="age">Age</label>
			<input type="number" name="age" id="age" value="<?php maintain_value('age') ?>" placeholder="Votre age">
			<?php echo put_error('age'); ?>
		</div>

		<div class="<?= array_key_exists('birth', $errors) ? 'error' : '' ?>">
			<label for="birth">Date de naissance</label>
			<input type="date" name="birth" value="<?php maintain_value('birth') ?>">
			<?php echo put_error('birth'); ?>
		</div>

		<div class="<?= array_key_exists('gender', $errors) ? 'error' : '' ?>">
			<label for="gender">Genre</label>
			<select name="gender" id="gender" value="<?php maintain_value('gender') ?>">
				<option value>Choisissez votre genre</option>
				<option value="male"   <?php if(maintain_select('gender', 'male'))   echo"selected" ?>>Homme</option>
				<option value="female" <?php if(maintain_select('gender', 'female')) echo"selected" ?>>Femme</option>
				<option value="other"  <?php if(maintain_select('gender', 'other'))  echo"selected" ?>>Autre</option>
			</select>
			<?php echo put_error('gender'); ?>
		</div>

		<div class="<?= array_key_exists('class', $errors) ? 'error' : '' ?>">
			<label for="class">Sélectionnez une classe</label>
			<select name="class" id="class" value="<?php maintain_value('class') ?>">
				<option value>Choisissez votre classe</option>
				<option value="hunter"    <?php if(maintain_select('class', 'hunter'))    echo"selected" ?>>Chasseur de démon</option>
				<option value="wizard"    <?php if(maintain_select('class', 'wizard'))    echo"selected" ?>>Sorcier</option>
				<option value="monk"      <?php if(maintain_select('class', 'monk'))      echo"selected" ?>>Moine</option>
				<option value="crusader"  <?php if(maintain_select('class', 'crusader'))  echo"selected" ?>>Croisé</option>
				<option value="doctor"    <?php if(maintain_select('class', 'doctor'))    echo"selected" ?>>Féticheur</option>
				<option value="barbarian" <?php if(maintain_select('class', 'barbarian')) echo"selected" ?>>Barbare</option>
			</select>
			<?php echo put_error('class'); ?>
		</div>

		<div>
			<input class="agreement-input" type="checkbox" name="agreement">
			<label class="agreement-label" for="agreement">J'ai lu et j'accepte les règles infernales.</label>
			<?php echo put_error('agreement'); ?>
		</div>

		<input type="submit" value="S'inscrire !">
		
	</form>
</body>
</html>