<?php 

require 'inc/config.php';

if(!empty($_POST))
	{
		$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');
		$prepare->bindValue(':mail',$_POST['mail']);
		$prepare->execute();

		$user = $prepare->fetch();

		if(!$user)
		{
			echo 'User not found';
		}
		else if($user->password == hash('sha256',md5(PRE_SALT.$_POST['password'].SUF_SALT)))
			{
				// Session
				if (isset($_POST['remember'])) 
				{
					session_start();

					setcookie('cookiemail',':mail',time() + 60 * 60);
					setcookie('cookiepassword',':password',time() + 60 * 60);

					header('Location: index.php');
				}
				else 
				{
					header('Location: index.php');
				}
				echo 'You can log in';
			}
		else
			{
				echo 'You can not log in';
			}	
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Devoir PHP</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<fieldset>
		<legend>Login</legend>
		<form action="#" method="POST" id="form">
			<label>Mail</label><input type="text" name="mail" placeholder="example@gmail.com">
			<br>
			<label>Password</label><input type="password" name="password" placeholder="*******">
			<br>
			<div class="log">
				<button type="submit">Log in</button>
				<label id="remember">Remember me</label><input type="checkbox" name="remember" value="save">
			</div>
			<p>You don't have an account ?</p><a href="inscription.php"><button class="register" type="button">Register now</button></a>
		</form>
	</fieldset>
</body>
</html>