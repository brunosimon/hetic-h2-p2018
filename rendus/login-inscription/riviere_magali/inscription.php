<?php

require 'inc/config.php';
require 'inc/form.php';




function errors($name)
{
	global $errors;
	if(array_key_exists($name, $errors)) echo $errors[$name];
}

function send_data()
{
	global $pdo;

	//$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');

	$prepare = $pdo->prepare('INSERT INTO table_lol (mail, pseudo, password, age, gender, birth, region) VALUES (:mail, :pseudo, :password, :age, :gender, :birth, :region)');

	$prepare->bindValue(':mail',$_POST['mail']);
	$prepare->bindValue(':pseudo',$_POST['pseudo']);
	$prepare->bindValue(':password', hash('sha256',SALT.$_POST['password'])); 
	$prepare->bindValue(':age',$_POST['age']);
	$prepare->bindValue(':gender',$_POST['gender']);
	$prepare->bindValue(':birth',$_POST['birth']);
	$prepare->bindValue(':region',$_POST['region']);
	$prepare->execute();

	$user = $prepare->fetch();

}




?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="src/css/style.css">
</head>
<body>
	<!-- SUCCESS -->
	<?php if(!empty($success)){ ?>
		<div class="success">
			<?php foreach($success as $success){ ?>
				<p>
					<?php echo $success; ?>
				</p>
			<?php } ?>
		</div>
	<?php } ?>


	<!-- ERROR -->
	<?php if(!empty($errors)){ ?>
		<div class="errors">
			<?php foreach($errors as $_error){ ?>
				<p>
					<?php echo $_error; ?>
				</p>
			<?php } ?>
		</div>
	<?php } ?>
	<h1>Inscription</h1>

		<form action="#" method="POST">
			<div>
				<label for="mail">Mail</label>
				<input type="text" name="mail" id="mail" value="<?php if(isset($_POST['mail']))echo $_POST['mail'] ?>">
				<?php errors('mail') ?>
			</div>
			<div>
				<label for="confirm_mail">Confirm mail</label>
				<input type="text" name="confirm_mail" id="confirm_mail" value="<?php if(isset($_POST['confirm_mail']))echo $_POST['confirm_mail'] ?>">
			</div>
			<div>
				<label for="pseudo">Pseudo</label>
				<input type="text" name="pseudo" id="pseudo" value="<?php if(isset($_POST['pseudo']))echo $_POST['pseudo'] ?>">
				<?php errors('pseudo') ?>
			</div>
			<div>
				<label for="password">Password</label>
				<input type="password" name="password" id="password" value="<?php if(isset($_POST['password']))echo $_POST['password'] ?>">
				<?php errors('password') ?>
			</div>
			<div>
				<label for="confirm_password">Confirm Password</label>
				<input type="password" name="confirm_password" id="confirm_password" value="<?php if(isset($_POST['confirm_password']))echo $_POST['confirm_password'] ?>">
			</div>
			<div>
				<label for="age">Age</label>
				<input type="number" name="age" id="age" value="<?php if(isset($_POST['age']))echo $_POST['age'] ?>">
				<?php errors('age') ?>
			</div>
			<div>
				<label for="gender">Tell me your gender</label>
				<select name="gender">
					<option value selected>Gender</option>
					<option value="1">Female</option>
			        <option value="2">Male</option>
		   		</select>
		   		<?php errors('gender') ?>
	   		</div> 
			<div>
				<label for="birth">Date of Birth</label>
				<input type="date" name="birth" value="<?php if(isset($_POST['birth']))echo $_POST['birth'] ?>">
			</div>
			<div>
				<label for="region">Select your region</label>
				<select name="region">
					<option value selected>Chose your region</option>
			        <option value="1">Latin America North</option>
			        <option value="2">Latin America South</option>
			        <option value="3">EU West</option>
			        <option value="4">EU Nordic and East</option>
			        <option value="5">Russia</option>
			        <option value="6">Oceania</option>
			        <option value="7">Brazil</option>
		   		</select>
		   		<?php errors('region') ?>
	   		</div>
	   		<div>
		   		<input type="radio" name="terms_of_use" id="terms"> 
				<label for="terms" class="terms">I agree to the Terms of Use, EULA and Privacy Policy</label>
				<?php errors('terms_of_use') ?>
			</div>

			<input type="submit" name="inscription">
		</form>
</body>
</html>


