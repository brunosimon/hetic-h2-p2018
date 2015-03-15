<?php

session_start();
require_once "inc/config.php";
require_once 'inc/testing.php';



if (!isset($_SESSION['user'])) {
	header("Location: welcome.php");
   	exit();
}



else if (!isset($_COOKIE['user'])) {
   	 header("Location: welcome.php");
   	 exit();
} else {
	 
	/* ----- deconnect button----- */

	 if (isset($_POST['button'])) {



		unset($_COOKIE['user']);
  		setcookie('user', '', time() - 3600);

  		session_destroy();

  		header("Location: welcome.php");
   	 	exit();
	 }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Page</title>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700italic,800italic,300,400,700,600' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
	<h1>Home Page</h1>
	
	<p class="hp_text"> Hello 
		<?php

		// send mail all the way to @
		$mail_mail = $_COOKIE['user'];
		$cookie_rest = substr($mail_mail, 0, strpos($mail_mail, "@")); 

		echo $cookie_rest;
		// echo "A mail has been send to $_COOKIE['user']";

		?>.</p>
	<br>
	<div class="moto"></div>
	<form action="#" method="POST">
		<input type="submit" name="button" value="Deconnect Me">
	</form>
</div>

<script type="text/javascript" src="script/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="script/script.js"></script>
</body>
</html>







