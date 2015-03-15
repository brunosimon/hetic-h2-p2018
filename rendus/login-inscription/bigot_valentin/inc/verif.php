<?php
//devoir
	error_reporting(E_ALL); 
	ini_set("display_errors", 1);

	function get_errors($data)
	{
		$result = array();

		//set variables
		$password   = trim($data['password']);
		$passwordbis    = trim($data['passwordbis']);
		$gender = trim($data['gender']);
		$mail = trim($data['mail']);

		//testing password
		if(empty($password))
			$result['password'] = 'missing password';
		else if(strlen($password) < 6)
			$result['password'] = 'wrong password';
		else if($password != $passwordbis)
			$result['password'] = 'different password';

		//testing mail
		if(empty($mail))
			$result['mail'] = 'missing mail';
		else if( !filter_var($mail, FILTER_VALIDATE_EMAIL) )
			$result['mail'] = 'wrong mail';

		//testing gender
		if(empty($gender))
			$result['gender'] = 'wrong gender';

		return $result;
	}
		
		$errors = array();
		$success = array();

	if(!empty($_POST))
	{
		if(empty($_POST['gender']))
			$_POST['gender'] = '';

		//get errors
		$errors = get_errors($_POST);

		if (empty($errors)) 
		{
			$success[] = 'Bravo !';
			$_POST['name'] = '';
			$_POST['age'] = '';
			$_POST['gender'] = '';
		}
	}

	else
	{
		$_POST['name'] = '';
		$_POST['age'] = '';
		$_POST['gender'] = '';


	}

echo '<pre>';
print_r($_POST);
echo '</pre>';
echo '<pre>';
print_r($errors);
echo '</pre>';