<?php

require 'inc/config.php';
require_once 'inc/testing.php';


session_start();

	 if (!empty($_POST)) 
	 {
	 	


	 	// Checking mail in DB
	 	$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');

	 	$prepare->bindValue(':mail',$_POST['mail']);
		$prepare->execute();

	 	$user = $prepare->fetch();

	 	if(!$user)
	 	{
	 		// echo "User not found";
	 	}

	 	else 
	 	{	
	 		// Cheking the password
	 		if($user->password == hash('sha256',SALT.$_POST['password']))
	 		{

	 			setcookie('user',$_POST['mail']);
	 			// set_Cookie($_POST['mail'], $_POST['password']);

	 			if (ob_get_length()) ob_end_clean();

	 			// rediect to hp
				redirect_hp();
	 		}

	 		// incorrect password
	 		else
	 		{

				// session_start();

				// if first try
	 			if (!isset($_SESSION['value']))
	 			{
	 				$_SESSION['value'] = 1;
	 			}

	 			// if session is under
	 			if ($_SESSION['value'] < 3) {
	 				$_SESSION['value']++;	 					 				
	 			}

	 			else {
	 				header("Location: waiting_page.php");
	 				session_destroy ();
	 				exit();
	 			}
	 			
	 			// echo $_SESSION['value'];
	 			
	 			
	 			
	 		}
	 		// echo "User Found";
	 	}

	 
	 }

	 /* ------ Retriving password ----- */

	  if (!empty($_POST)) {
	  	// Checking mail in DB
	 	$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');
	 	$prepare->bindValue(':mail',$_POST['check_mail']);
		$prepare->execute();
	 	$user = $prepare->fetch();

	 	if(!$user)
	 	{
	 		// echo "User not found";
	 	}
	 	else {

	 			

	 			$to      = $_POST['mail'];
				$subject = 'Hello again';
				$message = 'Your password is ';
				$headers = 'MIME-Version:1.0'."\r\n".
						   'From:server@domain.com'."\r\n";

				mail($to,$subject,$message,$headers);

				header('Location: welcome.php');
				exit();
	 	}
	  }



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700italic,800italic,300,400,700,600' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


<div class="container" class="visible">
	<h1>Login</h1>
	<div id="login">	


	<div class="forget">Forgot Password</div>
		
		<form action="#" method="POST">
			<span class="error">
				<?php  if (!empty($_POST)) { if(!user) echo 'User not found'; }?>
			</span>
			<input type="text" name="mail" placeholder="email@domain.com" class="user_info">
			<br>
			<input type="password" name="password" placeholder="Password" class="user_info">
			<br>
			<input type="submit">
		</form>
	</div>


	<div id="forget_password" class="not_visible">	
		
		<h2>Forgot Password</h2>
		<div class="exit">Exit</div>
		<form action="#" method="POST">
			<span class="error">
				<?php  if (!empty($_POST)) { if(!user) echo 'User not found'; }?>
			</span>
			<input type="text" name="check_mail" placeholder="Check valide email">
			<br>
			<input type="submit">
		</form>
	</div>


	

	<script type="text/javascript" src="script/jquery-2.1.1.min.js"></script>
	<script type="text/javascript">

	$('.forget').on('click', function() {
		$('#login').toggleClass('visible').toggleClass('not_visible');
		$('#forget_password').toggleClass('visible').toggleClass('not_visible');
	});

	$('.exit').on('click', function() {
				$('#forget_password').toggleClass('visible').toggleClass('not_visible');
		$('#login').toggleClass('visible').toggleClass('not_visible');
	});

	</script>
</div>
</body>
</html>