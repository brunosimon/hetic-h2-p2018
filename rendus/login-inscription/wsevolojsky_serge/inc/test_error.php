<?php
	
	error_reporting(E_ALL); 
	ini_set("display_errors", 1);
	

	$errors = array();
	$success = false;

	function check_errors($data)
	{
		$result = array();
		global $pdo;	

		$name   		= trim($data['name']);
		$lastname  	 	= trim($data['lastname']);
		$mail   		= trim($data['mail']);
		$re_mail   		= trim($data['re_mail']);
		$pseudo   		= trim($data['pseudo']);
		$password   	= trim($data['password']);
		$re_password   	= trim($data['re_password']);

		//name test
		if(empty($name))
			$result['name'] = 'Missing name';
		else if(strlen($name) <2 || strlen($name) > 15)
			$result['name'] = 'Your name must contain between 2 and 15 characters';
		else if(strlen($name) <2)
			$result['name'] = 'Wrong name';

		//lastname test
		if(empty($lastname))
			$result['lastname'] = 'Missing lastname';
		else if(strlen($name) <2 || strlen($name) > 20)
			$result['name'] = 'Your name must contain between 2 and 20 characters';

		//mail test
		if(empty($mail))
			$result['mail'] = 'Missing mail';
		else if($mail != $re_mail)
			$result['mail'] = 'The mails aren\'t same';
		
		//test pseudo
		if(empty($pseudo))
		{
			$result['pseudo'] = 'Missing pseudo';
		}
		else
		{
			$req = $pdo->prepare('SELECT COUNT(*) AS nbr FROM users WHERE pseudo = :pseudo');
			$req->bindValue(':pseudo', $pseudo);
			$req->execute();
			$datass = $req->fetch();

			if($datass->nbr != 0) {
				$result['pseudo'] = 'This pseudo already exist';
			} 

		}

		// password test

		if(empty($password))
			$result['password'] = 'Missing password';
		else if($password != $re_password)
			$result['password'] = 'The password aren\'t same';
		else if(strlen($password) < 8 || strlen($password) > 15)
			$result['password'] = 'Your password must contain between 8 and 15 caracters';
		else if(ctype_alpha($password))
			$result['password'] = 'Your password must contain at least one number';
		else if(ctype_lower($password))
			$result['password'] = 'Your password must contain at least one UPPERCASES';


		return $result;

	}


	if(!empty($_POST))
	{
		$errors = check_errors($_POST);

		if(empty($errors))
		{
			$success = true;
		}
	}
	// on vide les champs 
	else{
		$_POST['name'] = '';
		$_POST['lastname'] = '';
		$_POST['mail'] = '';
		$_POST['re_mail'] = '';
		$_POST['pseudo'] = '';
		$_POST['password'] = '';
		$_POST['re_password'] = '';
	}
?>