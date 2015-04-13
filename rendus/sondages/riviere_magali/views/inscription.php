<?php 
$title = 'Inscription';


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
?>

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
			</select>
			<?php echo put_error('gender'); ?>
		</div>

		<div>
			<input class="agreement-input" type="checkbox" name="agreement" id="agreement">
			<label class="agreement-label" for="agreement">J'ai lu et j'accepte les règles du site.</label>
			<?php echo put_error('agreement'); ?>
		</div>

		<input type="submit" name="inscription" value="S'inscrire !">
		
	</form>