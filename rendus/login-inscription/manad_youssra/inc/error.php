<?php

error_reporting(E_ALL);
ini_set("display_errors",1);

function find_errors($data) {

	global $pdo; // PDO as a global variable
	$result=array();

	$name = trim($data['name']);
	$lastname = trim($data['lastname']);
	$user_name = trim($data['user_name']);
	$email = trim($data['email']);
	$password = trim($data['password']);
	$password_confirm = trim($data['password_confirm']);

	//Find errors in name
	if(empty($name))
		$result['name'] = 'Missing name';
	else if(strlen($name) <2 || strlen($name) >30)
		$result['name'] = 'Your name must contain between 2 and 30 characters';
	else if (ctype_alpha($name) == false)
		$result['name'] = 'Your name must contain only letters please';

	//Find errors in lastname
	if(empty($lastname))
		$result['lastname'] = 'Missing lastname';
	else if(strlen($lastname) <2 || strlen($lastname) >30)
		$result['lastname'] = 'Your lastname must contain between 2 and 30 caracters';
	else if (ctype_alpha($lastname) == false)
		$result['lastname'] = 'Your lastname must contain only letters please';

	//Find errors in user_name
	if(empty($user_name))
		$result['user_name'] = 'Missing User name';
	else if(strlen($user_name) <2 || strlen($user_name) >30)
		$result['user_name'] = 'Your name must contain between 2 and 30 characters';
	else {
		$exist_user = $pdo->prepare('SELECT COUNT(*) AS nbr FROM users WHERE user_name = :user_name');
			$exist_user->bindValue(':user_name', $user_name);
			$exist_user->execute();
			$datass = $exist_user->fetch();
			if($datass->nbr != 0) {
				$result['user_name'] = 'Be original! This username aleready exists';
			}
	}

	//find errors in email
	if(empty($email))
		$result['email'] = 'Missing email';
	else {
		$exist_email = $pdo->prepare('SELECT COUNT(*) AS nbr FROM users WHERE email = :email');
			$exist_email->bindValue(':email', $email);
			$exist_email->execute();
			$datass = $exist_email->fetch();
			if($datass->nbr != 0) {
				$result['email'] = 'An account is already registrated with this email';
			}
	}

	//find errors in password
	if(empty($password))
		$result['password'] = 'Missing password';
	else if(ctype_alpha($password) || ctype_lower($password))
		$result['password'] = 'Your password must contain UPPERCASES and numb3rs';
	else if(strlen($password) <6 || strlen($password) >30)
		$result['password'] = 'Your password must contain between 6 and 30 caracters';
	else if(strstr($password, $name)) 
		$result['password']='Your password must not contain your name or your lastname';

	//find errors in password_confirm
	if(empty($password_confirm))
		$result['password_confirm'] = 'Please confirm your password';
	else if(($password_confirm) != ($password))
		$result['password_confirm'] = 'You didnt write the same password';





	return $result;
}

$errors  = array();
$success = false;


if(!empty($_POST))
{
	//Get errors
	$errors = find_errors($_POST);

	if(empty($errors))
	{
		$success = true;

		
	}
} else {
	$_POST['name']="";
}
