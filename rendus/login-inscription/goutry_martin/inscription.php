<?php 
	require 'inc/config.php';

	if (!empty($_POST)) 
	{

		// Creating an array to store errors
		$errors = array();

		// Testing username

			// Checking if username field is empty
			if (empty($_POST['username']))
			{
				$errors['username_empty'] = 'You need to pick a username.';
			}

			// Checking if username does not contain special symbols (still allowing ' - _ and .)
			if (!preg_match('#^[\w\.\'-]+$#i', $_POST['username']))
			{
				$errors['username_invalid'] = 'Your username uses invalid characters.';
			}

			// Checking length of username
			if (strlen($_POST['username']) < 4 || strlen($_POST['username']) > 30)
			{
				$errors['username_length'] = 'Username must be 4-30 characters long.';
			}

			// Checking if username is already taken
			$prepare = $pdo->prepare('SELECT username FROM users WHERE username = :username LIMIT 1');
			$prepare->bindValue(':username', $_POST['username']);
			$prepare->execute();
			$username = $prepare->fetch();
			if ($username) 
			{
				$errors['username_taken'] = 'Username already taken.';
			}

		// Testing age

			// Checking if age field is empty
			if (empty($_POST['age']))
			{
				$errors['age_empty'] = 'Please fill in your age.';
			}

			// Checking if age is legit
			if ($_POST['age'] < 1 || $_POST['age'] > 120)
			{
				$errors['age_wrong'] = 'Age is wrong.';
			}

		// Testing mail

			// Checking if mail field is empty
			if (empty($_POST['mail']))
			{
				$errors['mail_empty'] = 'You forgot to fill in your email.';
			}

			// Checking if mail is legit

			if (!strpos($_POST['mail'], '@'))
			{
				$errors['mail_invalid'] = 'Your email adress is invalid.';
			}

			// Checking if mail is already used in DB
			$prepare = $pdo->prepare('SELECT mail FROM users WHERE mail = :mail LIMIT 1');
			$prepare->bindValue(':mail', $_POST['mail']);
			$prepare->execute();
			$mail = $prepare->fetch();
			if ($mail) 
			{
				$errors['mail_taken'] = 'Mail already exists.';
			}

		// Testing password

			// Checking if password field is empty
			if (empty($_POST['password']))
			{
				$errors['password_empty'] = 'You forgot to set a password.';
			}

			if (empty($_POST['confirmpassword']))
			{
				$errors['password_confirm'] = 'You forgot to retype your password.';
			}

			// Checking if password is strong enough (length + complexity)
			if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,50}$/', $_POST['password'])) 
			{
				$errors['password_weak'] = 'Your password is not strong enough, please follow instructions.';
			}

			// Checking if passwords match
			if ($_POST['password'] != $_POST['confirmpassword'])
			{
				$errors['password_donotmatch'] = 'Your passwords do not match.';
			}

		// Set variable
		$success = array();

		// Registering new users in DB with hashed/salted password if there is no error
		if (empty($errors)) 
		{
			$prepare = $pdo->prepare('INSERT INTO users (username, age,mail,password) VALUES (:username,:age,:mail,:password)');
			$prepare->bindValue(':username',$_POST['username']);
			$prepare->bindValue(':age',$_POST['age']);
			$prepare->bindValue(':mail',$_POST['mail']);
			$prepare->bindValue(':password',hash('sha256',SALT.$_POST['password']));
			$prepare->execute();

			// Mail confirmation

			$to      = 'mail@adress.com';
			$subject = 'Thanks for signing up!';
			$message = 'Just to confirm you signed up!';
			$headers = 'MIME-Version:1.0'."\r\n".
			           'From:server@domain.com'."\r\n";

			mail($to,$subject,$message,$headers);

			$success[] = 'Registration complete! A mail has been sent to confirm your registration.';
		}

	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Varela+Round">
</head>
<body>
	<div class="container">
		<div id="login">



			<h2>Register</h2>

			<!-- SUCCESS MESSAGE -->
			<?php if(!empty($success)){ ?>
				<div class="success">
					<?php foreach($success as $_success){ ?>
						<p>
							<?php echo $_success; ?>
						</p>
						<br>
							<a href="login.php"><p><input type="submit" value="Go to Login Page"></p></a>
						
					<?php } ?>
				</div>
			<?php } ?>

			<!-- ERROR MESSAGE-->
			<?php if(!empty($errors)){ ?>
				<div class="errors">
					<?php foreach($errors as $_error){ ?>
						<p>
							<?php echo $_error; ?>
						</p>
					<?php } ?>
				</div>
			<?php } ?>

			<form action="#" method="POST">
				<fieldset>
					<p><input type="text" name="username" placeholder="Your username"></p>
					<p><input type="number" name="age" placeholder="Your Age"></p>
					<p><input type="text" name="mail" placeholder="Mail"></p>
					<p><input type="password" name="password" placeholder="Password">Password must be between 8-50 characters, must contain lowercase and uppercase letters, at least one digit and one of the following special character : @#\-_$%^&+=§!\?</p>
					<p><input type="password" name="confirmpassword" placeholder="Confirm password"></p>
					<p><input type="submit" value="Sign In"></p>
				</fieldset>
			</form>

		</div>
	</div>




</body>
</html>



