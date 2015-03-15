<?php 
	require 'inc/config.php';

	if (!empty($_POST)) 
	{
		$auth_error = array();

		$prepare = $pdo->prepare('SELECT * FROM users WHERE username = :username LIMIT 1');

		$prepare->bindValue(':username',$_POST['username']);
		$prepare->execute();

		$user = $prepare->fetch();

		if(!$user)
		{
			$auth_errors['login_user'] = 'Your username or password is wrong!';
		}

		else 
		{
			if($user->password == hash('sha256',SALT.$_POST['password']))
			{
				header('Location: index.php');
			}
			else
			{
				$auth_errors['login_password'] = 'Your username or password is wrong!';
			}
		}


	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<div id="login">
			<h2>Log In</h2>

			<?php if(!empty($auth_errors)){ ?>
				<div class="loginError">
					<?php foreach($auth_errors as $_autherror){ ?>
						<p>
							<?php echo $_autherror; ?>
						</p>
					<?php } ?>
				</div>
			<?php } ?>
			<form action="#" method="POST">
				<fieldset>
					<p><input type="text" name="username" placeholder="Username"></p>
					<p><input type="password" name="password" placeholder="Password"></p>
					<p><input type="submit" value="Sign In"></p>
				</fieldset>	
			</form>
		</div>
	</div>
	
</body>
</html>
