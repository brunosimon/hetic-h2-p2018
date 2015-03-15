<?php

// On récupère la liste des email et pseudo pour futurs tests
$query = $pdo->query('SELECT mail, pseudo FROM site_diablo');
$list_mail_pseudo = $query->fetchAll();


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

// Function that return every errors in $data
function get_errors($data)
{
	$result = array();

	// Set variables
	$pseudo		      = $data['pseudo'];
	$mail 			  = $data['mail'];
	$mail_confirm 	  = $data['mail_confirm'];
	$password 		  = $data['password'];
	$password_confirm = $data['password_confirm'];
	$age 			  = $data['age'];
	$birth 			  = $data['birth'];
	$gender 		  = $data['gender'];
	$class 		  	  = $data['class'];


	// Testing pseudo
	if(empty($pseudo))
		$result['pseudo'] = 'Un pseudo est obligatoire ! :)';
	else if(strlen($pseudo) <= 1)
		     $result['pseudo'] = 'Ce pseudo est trop court !';
		 else if(in_database($pseudo, 'pseudo'))
			  	  $result['pseudo'] = 'Ce pseudo est déjà utilisé';


	// Testing Email
	if(empty($mail))
		$result['mail'] = 'Mail obligatoire pour la création de votre compte';
	else if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
			 $result['mail'] = $result['mail_confirm'] = 'Mail incorrect';
		 else if($mail != $mail_confirm)
			      $result['mail'] = $result['mail_confirm'] = 'Mail non identique';
			  else if(in_database($mail, 'mail'))
			  	       $result['mail'] = $result['mail_confirm'] = 'Ce mail est déjà utilisé';

	// Testing password
	if(empty($password))
		$result['password'] = 'Mot de passe obligatoire';
	else if(strlen($password) < 6)
			 $result['password'] = $result['password_confirm'] = 'Votre mot de passe doit faire plus de 6 caractères !';
		else if(!preg_match_all("/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{5,255})/", $password))
				 $result['password'] = $result['password_confirm'] = 'Votre mot de passe n\'est pas assez complexe ! 1 chiffre et 1 majuscule obligatoire';
			 else if($password != $password_confirm)
				      $result['password'] = $result['password_confirm'] = 'Mot de passe non identique';

	// Testing age
	if(empty($age))
		$result['age'] = 'Votre age est obligatoire';
	else if($age < 1 || $age > 125)
		     $result['age'] = 'Age non valide';

	// Testing birth
	if(empty($birth))
		$result['birth'] = 'Votre date de naissance est obligatoire';

	// Testing gender
	if(empty($gender))
		$result['gender'] = 'Veuillez choisir votre genre';
	else if(!in_array($gender, array('male', 'female', 'other')))
		     $result['gender'] = 'Vous êtes, apparemment, un ornithorynque. Félicitations.';

	// Testing class
	if(empty($class))
		$result['class'] = 'Veuillez choisir votre classe';
	else if(!in_array($class, array('hunter', 'wizard', 'monk', 'crusader', 'doctor', 'barbarian')))
		     $result['class'] = 'Votre classe n\'est pas définie';

	// Testing agreement
	if(!array_key_exists('agreement', $data))
		$result['agreement'] = 'Vous devez accepter les règles du site';

	return $result;
}

// Set variables
$errors = array();
$success = array();

// POST n'est pas vide
if(!empty($_POST))
{
	if(empty($_POST['gender']))
		$_POST['gender'] = '';


	$errors = get_errors($_POST);

	// Success (no error)
	if(empty($errors))
	{
		send_data();

		// Reset form
		$_POST['pseudo']		   = '';
		$_POST['mail'] 			   = '';
		$_POST['mail_confirm']     = '';
		$_POST['password'] 		   = '';
		$_POST['password_confirm'] = '';
		$_POST['age'] 			   = '';
		$_POST['birth'] 		   = '';
		$_POST['gender'] 		   = '';
		$_POST['class'] 		   = '';

		header('Location:login.php');
		exit;
	}
}

// POST est vide
else
{
	$_POST['pseudo']		   = '';
	$_POST['mail'] 			   = '';
	$_POST['mail_confirm']     = '';
	$_POST['password'] 		   = '';
	$_POST['password_confirm'] = '';
	$_POST['age'] 			   = '';
	$_POST['birth']			   = '';
	$_POST['gender'] 		   = '';
	$_POST['class'] 		   = '';
}