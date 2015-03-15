<?php 

session_start();

require 'inc/config.php';

include 'form.php';

// echo '<pre>';
// print_r($_POST);
// echo'</pre>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
	<style>
		body{
			width: 960px;
			margin: auto;
		}

		form span{
			color: red;
		}

		fieldset{
			border: none;
			border-top: 3px orange solid;
			margin: auto;
		}

		fieldset legend{
			padding: 0 25px;
		}

		label{
			float: left;
			width: 100px;
			margin-left: 250px;
		}

		input[type="submit"]{
			margin-left: 430px;
			width: auto;
		}

		h1{
			text-align: center;
		}

		input, select{
			width: 150px;
		}
	</style>
</head>
<body>
	<h1>Inscription</h1>
	<form action="#" method="POST">
		<fieldset id="patie_1">
			<legend> Personal Information </legend>
			<p>
				<label for="first_name">First Name :</label>
				<input type="text" id="first_name" name="first_name"/>
				<span> 
					<?= array_key_exists('first_name', $errors)? $errors['first_name']:''?> <!-- Error Viewing -->
				</span>
			</p>
			<p>
				<label for="last_name">Last Name :</label>
				<input type="text" id="last_name" name="last_name"/>
				<span>
					<?= array_key_exists('last_name', $errors)? $errors['last_name']:''?><!-- Error Viewing -->
				</span>
			</p>
			<p>
				<label for="mail">E-mail :</label>
				<input type="text" id="mail" name="mail"/>
				<span>
					<?= array_key_exists('mail', $errors)? $errors['mail']:''?><!-- Error Viewing -->
				</span>
			</p>
			<p>
				<label for="born">Born : </label>
				<input type="date" id="born" name="born"/>
				<span>
					<?= array_key_exists('born', $errors)? $errors['born']:''?><!-- Error Viewing -->
				</span>
			</p>
			<p>
				<label for="country">Country :</label>
				<span>
					<?= array_key_exists('country', $errors)? $errors['country']:''?><!-- Error Viewing -->
				</span>
				<select name="country" id="country">
					<option>Choose your country</option>
					<optgroup Label="Europe">
						<option value="France">France</option>
						<option value="Belgique">Belgique</option>
						<option value="Espagne">Espagne</option>
						<option value="Italie">Italie</option>
					</optgroup>
					<optgroup Label="Amérique du nord">
						<option value="USA">Etats Unis</option>
						<option value="Canada">Canada</option>
					</optgroup>
				</select>
			</p>
		</fieldset>
		<fieldset id="partie_2">
			<legend> Account </legend>
			<p>
				<label for="pseudo">Pseudo :</label>
				<input type="text" id="pseudo" name="pseudo"/>
				<span>
					<?= array_key_exists('pseudo', $errors)? $errors['pseudo']:''?><!-- Error Viewing -->
				</span>
			</p>
			<p>
				<label for="password">Password : </label>			
				<input type="password" id="password" name="password"/>
				<span>
					<?= array_key_exists('password', $errors)? $errors['password']:''?><!-- Error Viewing -->
				</span>
			</p>
			<p>
				<label for="password_confirm">Confirm password : </label>
				<input type="password" id="password_confirm" name="password_confirm"/>
				<span>
					<?= array_key_exists('password_confirm', $errors)? $errors['password_confirm']:''?><!-- Error Viewing -->
				</span>
			</p>
		</fieldset>
		<p>
			<input type="submit" value="Registration" name="registration" />
		</p>
	</form>
	<script>
		function login()
		{
			document.location.href="login.php";
		}
	</script>
	<br>
	<div>
		<span>Already registred ? Go to the login page</span>
		<input type="button" name="Login" value="Log In" onclick="login()">
	</div>
</body>
</html> 