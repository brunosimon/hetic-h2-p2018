<?php

function get_errors($data)
{
	$result = array();

	//Set variables
	$name = $data['name'];
	$age = $data['age'];
	$gender = $data['gender'];
	$mail = $data['mail'];
	$password = $data['password'];
	$retype_password = $data['retype_password'];

	//Testing name
	if(empty($name))
		$result['name'] = 'Saisissez votre nom';
	else if(strlen($name) <= 1)
		$result['name'] = 'Nom trop court';

	//Testing age
	if(empty($age))
		$result['age'] = 'Saisissez votre âge';
	else if(strlen($age) < 1 || $age > 125)
		$result['age'] = 'Âge incorrect';

	//Testing gender
	if(empty($gender))
		$result['gender'] = 'Indiquez votre genre';
	else if(!in_array($gender,array('male','female')))
		$result['gender'] = 'Genre incorrect';

	//Testing mail
	if(empty($mail))
		$result['mail'] = 'Saisissez votre adresse email';
	else if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
		$result['mail'] = 'Adresse email incorrecte';

	//Testing password
	if(empty($password))
		$result['password'] = 'Saisissez un mot de passe';
	else if(strlen($password) < 6)
		$result['password'] = 'Mot de passe trop court (Minimum 6 caractères)';
	else if($_POST['password'] != $_POST['retype_password'])
		$result['retype_password'] = 'Merci de resaissir un mot de passe';

	return $result;
}

$errors = array();
$success = array();

if(!empty($_POST))
{
	if(empty($_POST['gender']))
		$_POST['gender'] = '';

	$errors = get_errors($_POST);

	//Send values
	if(empty($errors))
	{
		$prepare = $pdo->prepare('INSERT INTO users (name,age,gender,mail,password) VALUES (:name,:age,:gender,:mail,:password)');

		$prepare->bindValue(':name',$_POST['name']);
		$prepare->bindValue(':age',$_POST['age']);
		$prepare->bindValue(':gender',$_POST['gender']);
		$prepare->bindValue(':mail',$_POST['mail']);
		$prepare->bindValue(':password',hash('sha256',$_POST['password'].SALT));

		$prepare->execute();

		$_POST['name'] = '';
		$_POST['age'] = '';
		$_POST['gender'] = '';
		$_POST['mail'] = '';
		$_POST['password'] = '';
		$_POST['retype_password'] = '';

		//Connexion at private page
		session_start();
		$_SESSION['login'] = '$mail';
		header('Location: private.php');
		exit();
	}
}
else
{
	$_POST['name'] = '';
	$_POST['age'] = '';
	$_POST['gender'] = '';
	$_POST['mail'] = '';
	$_POST['password'] = '';
	$_POST['retype_password'] = '';
}

echo '<pre>';
print_r($_POST);
echo '</pre>';
echo '<pre>';
print_r($errors);
echo '</pre>';