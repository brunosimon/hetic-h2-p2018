<?php

$query = $pdo->query('SELECT mail FROM table_lol');
$mail_lol = $query->fetchAll();

$query = $pdo->query('SELECT pseudo FROM table_lol');
$pseudo_lol = $query->fetchAll();

// Function that return every errors in $data
function get_errors($data)
{
	$result = array();
	global $mail_lol;
	global $pseudo_lol;

	// Set variables
	$mail 			  = $data['mail'];
	$confirm_mail	  = $data['confirm_mail'];
	$pseudo 		  = $data['pseudo'];
	$password 		  = $data['password'];
	$confirm_password = $data['confirm_password'];
	$age			  = $data['age'];	
	$gender 		  = $data['gender'];	
	$birth 			  = $data['birth'];
	$region 		  = $data['region'];
	$terms_of_use 	  = $data['terms_of_use'];



	// Testing mail
	if(empty($mail))
		$result['mail'] = 'Missing email';
	else if((!filter_var($mail, FILTER_VALIDATE_EMAIL)))
		$result['mail'] = 'Enter a valid email';
	else if($mail !== $confirm_mail)
		$result['mail'] = 'Both emails aren \' the same. ';
		foreach ($mail_lol as $test_mail) 
	{if($test_mail->mail == $mail)
		$result['mail'] = 'This email is already taken.';}

	// Testing pseudo
	if(empty($pseudo))
		$result['pseudo'] = 'Missing pseudo';
	else if(strlen($pseudo) < 4 || strlen($pseudo) > 20)
		$result['pseudo'] = 'Your pseudo has to be between 4 and 20 numerals.';
	foreach ($pseudo_lol as $test_pseudo) 
	{if($test_pseudo->pseudo == $pseudo)
		$result['pseudo'] = 'This pseudo is already taken.';}

	//Testing password
	if(empty($password))
		$result['password'] = 'Missing password';
	if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $password))
		$result['password'] = "Your password must have at least one lowercase, one uppercase and one digit, and have between 8 and 20 numerals";
	else if($password !== $confirm_password)
		$result['password'] = 'Both passwords aren \'t the same.';

	// Testing age
	if(empty($age))
		$result['age'] = 'Missing age';
	else if($age < 5 || $age > 101)
		$result['age'] = 'Wrong age';

	// Testing gender
	if(empty($gender))
		$result['gender'] = 'I think there \'s a mistake there, or maybe you\'re a troll.';
	else if(!in_array($gender, array('1', '2')))
		$result['gender'] = 'Oh, you\'re a troll. Nice to meet you :)';

	// Testing the day of birth
	if(empty($birth))
		$result['birth'] = 'Missing your birth :(';

	// Testing region
	if(empty($region))
		$result['region'] = 'Missing region';
	else if(!in_array($region, array('1', '2', '3', '4', '5', '6', '7')))
		$result['region'] = 'Sorry, but we don\'t have any servers for this region :( Really sorry.';

	if(!isset($_POST['terms_of_use']))
		$result['terms_of_use'] = 'You have to accept the terms of use.';


	return $result;
}

// Set variables
$errors = array();
$success = array();

// POST n'est pas vide
if(!empty($_POST))
{
	if(empty($_POST['terms_of_use']))
		$_POST['terms_of_use'] = null;


	$errors = get_errors($_POST);

	// Success (no error)
	if(empty($errors))
	{	
		send_data();
		session_start ();
		// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd)
		$_SESSION['pseudo'] = $_POST['pseudo'];

		// on redirige notre visiteur vers une page de notre section membre
			header('Location:session.php');
		exit;		
		// $success[] = 'Bravo !';
		// ini_set("SMTP", "localhost");
		// ini_set("smtp_port", "25");
		// ini_set("sendmail_from", "your_user@gmail.com");
		// $to      = $_POST['mail'];
  	// 	   $subject = 'Welcome'.$_POST['pseudo'];
  	//    	$message = 'Welcome'.$_POST['pseudo'];
  	//    	$headers = 'From: webmaster@example.com' . "\r\n" .
  	//  	   'Reply-To: webmaster@example.com' . "\r\n" .
  	//     'X-Mailer: PHP/' . phpversion();

	  //   	mail($to, $subject, $message, $headers);

		
		// Reset form
		$_POST['pseudo']   = '';
		$_POST['age']    = '';
		$_POST['gender'] = '';
		$_POST['mail'] = '';
		$_POST['confirm_mail'] = '';
		$_POST['password'] = '';
		$_POST['confirm_password'] = '';
		$_POST['birth'] = '';
		$_POST['region'] = '';
		

	}
}

// POST est vide
else
{
	$_POST['pseudo']   = '';
	$_POST['age']    = '';
	$_POST['gender'] = '';
}


