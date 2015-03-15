<?php

session_start();

require 'inc/config.php';

include 'form.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
	<style>
		body{
			width: 960px;
			margin: auto;
		}
		fieldset{
			border: none;
			border-top: 3px orange solid;
			margin: auto;
		}
		input[type="submit"]{
			margin-left: 430px;
		}
		label{
			float: left;
			width: 100px;
			margin-left: 260px;
		}
		fieldset legend{
			padding: 0 25px;
		}
		h1{
			text-align: center;
		}
		fieldset span{
			color: red;
		}
	</style>
</head>
<body>
	<script>
		function registration()
		{
			document.location.href="index.php";
		}
	</script>
	<form action="#" method="POST">
		<h1>Login</h1>
		<fieldset>
			<legend> Login </legend>
			<label>E-mail :</label>
			<input type="text" name="mail">
			<span>
				<?= array_key_exists('mail', $errors)? $errors['mail']:''?><!-- Error Viewing -->
			</span>
			<br>
			<label>Password : </label>
			<input type="password" name="password">
			<span>
				<?= array_key_exists('password', $errors)? $errors['password']:''?><!-- Error Viewing -->
			</span>
			<br>
			<br>
			<input type="submit" value="Login" name="login">
			<br>
			<br>
			<br>
		</fieldset>
		<div>
			<span>Not registred ? Go to create an account</span>
			<input type="button" name="registration" value="Create an account" onclick="registration()">
		</div>
	</form>
</body>
</html>