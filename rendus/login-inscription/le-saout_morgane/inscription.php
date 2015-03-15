<?php 
session_start();


	require 'inc/config.php';
	require 'captcha.php';

	if(!empty($_POST))
	{
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';

		$error=false;

//MAIL
	if(!empty($_POST['mail'])){
			$prepare = $pdo->prepare('SELECT mail FROM users WHERE mail = :mail ');
			
			$prepare->bindValue(':mail',$_POST['mail']);
			$prepare->execute();
			$mail=$prepare->fetch();
		
		if($mail) {
			$error=true;
			$errors['mail'] = 'Mail already exists';
		}
	}

// PASSWORD
	if($_POST['password'] != $_POST['rewrite_password']){
		$error=true;
		$errors['rewrite_password'] = 'Your password confirmation failed';
		}

	if(strlen($_POST['password']) < 8 || strlen($_POST['password']) >16 )
		{
			$error=true;
			$errors['password'] = 'Password must have 8 characters';
		}

//AGE
	if($_POST['age'] < 12)
		{
			$error=true;
			$errors['age'] = 'You must have 12years old';
		}

//NAME & LAST NAME
		if(empty($_POST['name']))
		{
			$error=true;
			$errors['name'] = 'Missing name';
		}
		else if(strlen($_POST['name']) < 2) { 
			$error=true;
			$errors['name'] = 'Wrong name';
		}

		if(empty($_POST['lastname']))
		{
			$error=true;
			$errors['lastname'] = 'Missing lastname';
		}else if (strlen($_POST['lastname']) < 2){
			$error=true;
			$errors['lastname'] = 'Wrong lastname';
		}

//GENDER
		if(empty($_POST['gender']))
		{	$error=true;
			$errors['gender'] = 'Missing gender';
		}else if (!in_array($_POST['gender'], array('male', 'female'))){
			$error=true;
			$errors['gender'] = 'Wrong gender';
		}

//CAPTCHA
		if($_POST['captcha'] != $_SESSION['captcha'])
		{
		$error=true;
		$errors['captcha'] = 'Wrong captcha';
		}

//PREPARE
		if(!$error){
			echo "Inscription réussion";
			$prepare = $pdo->prepare('INSERT INTO users (name,lastname,gender,mail,password,age) VALUES (:name,:lastname,:gender,:mail,:password,:age) ');
			
			$prepare->bindValue(':name',$_POST['name']);
			$prepare->bindValue(':lastname',$_POST['lastname']);
			$prepare->bindValue(':gender',$_POST['gender']);
			$prepare->bindValue(':mail',$_POST['mail']);
			$prepare->bindValue(':password',hash('sha256',SALT.$_POST['password']));
			$prepare->bindValue(':age',$_POST['age']);

			$prepare->execute();
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
</head>
<body>
	<h1>Inscription</h1>
	<form action="#" method="POST">
	<input type="text" name="name">
		<label>Name</label>
		<br>
	<input type="text" name="lastname">
		<label>Last Name</label>
		<br>
	<label>
	<input type="radio" name="gender" value="female">
	Female
	</label>
	<label>
	<input type="radio" name="gender" value="male">
	Male
	</label>
	<br>
	<input type="text" name="mail">
	<label>Mail</label>
	<br>
	<input type="password" name="password">
	<label>Password</label>
	<br>
	<input type="password" name="rewrite_password">		<label>Confirmation password</label>
	<br>
   	<input type="number" name="age">
	<label>Age</label>
 	<br>
 	<label for="captcha">Recopiez le mot : "<?php echo captcha(); ?>" <input type="text" name="captcha" id="captcha" /><br /></label>
 	<br>
	<input type="submit">
	</form>

	<p><?= (isset($errors['rewrite_password'])) ? $errors['rewrite_password'] : ' '  ?></p>
	<p><?= (isset($errors['mail'])) ? $errors['mail'] : ' '  ?></p>
	<p><?= (isset($errors['password'])) ? $errors['password'] : ' '  ?></p>
	<p><?= (isset($errors['password_length'])) ? $errors['password'] : ' '  ?></p>
	<p><?= (isset($errors['age'])) ? $errors['age'] : ' '  ?></p>
	<p><?= (isset($errors['name'])) ? $errors['name'] : ' '  ?></p>
	<p><?= (isset($errors['lastname'])) ? $errors['lastname'] : ' '  ?></p>
	<p><?= (isset($errors['gender'])) ? $errors['gender'] : ' '  ?></p>
	<p><?= (isset($errors['captcha'])) ? $errors['captcha'] : ' '  ?></p>

</body>
</html>

