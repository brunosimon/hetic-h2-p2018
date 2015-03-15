<?php

	$errors		= array();
	$success	= array();

	function get_errors($data)
	{
		$result = array();

		// Set variables
		$nom = trim($data['nom']);
		$age = trim($data['age']);
		$mail = trim($data['mail']);
		$password = trim($data['password']);
		$password2 = trim($data['password2']);

		//Testing nom
		if(empty($nom))
			$result['nom'] = 'Vous navez pas rentré de nom';
		else if(strlen($nom) < 2 )
			$result['nom'] = 'Votre nom est trop cours';
		//Testing age
		if(empty($age))
			$result['age'] = 'Vous navez pas rentré dage';
		else if($age < 1 || $age > 125)
			$result['age'] = 'Votre age nest pas réel';
		//Testing mail
		if(!empty($mail))
		{
			$mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
			if(filter_var($mail, FILTER_VALIDATE_EMAIL) === false)
			{
  				 $result['mail'] = 'Mauvais Email';
			}		
			
		}
		else if(empty($mail))
			$result['mail'] = 'Pas de mail rentré';
		//Testing password
		if(empty($password))
			$result['password'] = 'Vous navez pas entre de password';
		//Testing concordance pass
		if($password != $password2)
			$result['password_conc'] ='Vos deux mots de passes ne correspondent pas';

		return $result;
	}

	// Data sent
	if(!empty($_POST))
	{
		// Default mail
		if(empty($_POST['mail']))
			$_POST['mail'] = '';

		//Get errors
		$errors = get_errors($_POST);
		//Success
		if(empty($errors))
		{
			$success[] ='Bravo !';
		}
	}


