<?php
require 'inc/config.php';

session_start();

// on récupère les mail et pseudo pour futurs tests
$query = $pdo->query('SELECT mail, pseudo FROM site_diablo');
$list_mail_pseudo = $query->fetchAll();

// Redirection si non connecté
if(empty($_SESSION['pseudo'])) 
{
  header('Location:login.php');
  exit();
}

// On instancie les variables
$errors = array();
$valid = array();

// Si un formulaire / bouton a été cliqué :
if(!empty($_POST))
{
	// Test pour changmeent pseudo
	$pseudo = $_POST['pseudo'];
	if(!empty($pseudo))
	{
		if(strlen($pseudo) <= 1)
		    $errors['pseudo'] = 'Ce pseudo est trop court !';
		else if(in_database($pseudo, 'pseudo'))
			  	  $errors['pseudo'] = 'Ce pseudo est déjà utilisé';
			  else
			  {
			  	  // Changement pseudo
			  	  $old_pseudo = $_SESSION['pseudo'];
			  	  $exec = $pdo->exec("UPDATE site_diablo SET pseudo = '$pseudo' WHERE pseudo = '$old_pseudo'");
			  	  $_SESSION['pseudo'] = $pseudo;
			  	  $valid['pseudo'] = 'Done !';
			  }
	}

	// Test pour changement mdp
	$password = $_POST['password'];
	$password_confirm = $_POST['password_confirm'];
	if(!empty($password))
	{
		if(strlen($password) < 6)
			 $errors['password'] = $errors['password_confirm'] = 'Votre mot de passe doit faire plus de 6 caractères !';
		else if(!preg_match_all("/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{5,255})/", $password))
				 $errors['password'] = $errors['password_confirm'] = 'Votre mot de passe n\'est pas assez complexe ! 1 chiffre et 1 majuscule obligatoire';
			 else if($password != $password_confirm)
				      $errors['password'] = $errors['password_confirm'] = 'Mot de passe non identique';
				  else
				  {
				  	  // Changement mdp
				  	  $pseudo_user = $_SESSION['pseudo'];
				  	  $new_password = hash('sha256', PREFIX_SALT.$password.SUFFIX_SALT);
				  	  $exec = $pdo->exec("UPDATE site_diablo SET password = '$new_password' WHERE pseudo = '$pseudo_user'");
				  	  $_SESSION['password'] = $new_password;
				  	  $valid['password'] = 'Done !';
				  }
	}

}


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

// Vérifie si un élément si trouve déjà dans la BDD
function in_database($tested, $what)
{
	global $list_mail_pseudo;
	foreach ($list_mail_pseudo as $value) {
		if($value->$what == $tested)
			return true;
	}
	return false;
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="src/css/style.css"></link>
</head>
<body class="body-home">
	<h1>Modifiez votre profil</h1>
	<form action="#" method="POST">
	<div class="<?= array_key_exists('pseudo', $errors) ? 'error' : '' ?><?= array_key_exists('pseudo', $valid) ? 'valid' : '' ?>">
		<label for="pseudo">Pseudo</label>
		<input type="text" name="pseudo" id="pseudo" value="<?php maintain_value('pseudo') ?>" placeholder="Votre nouveau pseudo">
		<?php echo put_error('pseudo'); ?>
	</div>

	<div class="<?= array_key_exists('password', $errors) ? 'error' : '' ?><?= array_key_exists('password', $valid) ? 'valid' : '' ?>">
		<label for="password">Mot de passe</label>
		<input type="password" name="password" id="password" value="<?php maintain_value('password') ?>" placeholder="Votre nouveau mot de passe">
		<?php echo put_error('password'); ?>
	</div>

	<div class="<?= array_key_exists('password', $errors) ? 'error' : '' ?><?= array_key_exists('password', $valid) ? 'valid' : '' ?>">
		<label for="password_confirm">Confirmation mot de passe</label>
		<input type="password" name="password_confirm" id="password_confirm" value="<?php maintain_value('password_confirm') ?>" placeholder="Validez votre mot de passe">
	</div>

	<input type="submit" value="Modifier">

	</form>
</body>
</html>