<?php
require 'inc/config.php';

// User authorized to view this page?
session_start();

if(empty($_SESSION["loggedin"])){
	header("Location: login.php");
}

if(!empty($_POST)){
	if(!empty($_POST['forgetme'])){
		setcookie('rememberme', "", time()-3600);
	}
	$_SESSION["loggedin"] = "";
	header("Location: index.html");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MyLittleForm - HomePage</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<div class="message">
		<p>You're logged in :)</p><br>
		<form action="" method="POST">
			<p>Forget Me? So that I am no longer redirected here. <input type="radio" name="forgetme" value="1"></p><br>
			<input type="submit" name="logout" value="Logout">
		</form>
	</div>
</body>
</html>