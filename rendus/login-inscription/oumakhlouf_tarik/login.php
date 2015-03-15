<?php

require_once("config.php");

if(isset($_POST['username']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];

	if($username && $password)
	{
		$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$result = $db->query("SELECT * FROM users WHERE username = '$username'");
		$user = $result->fetch_assoc();

		if (sizeof($user) != 0) 
		{
			if($user['password'] == hash('sha256', $user['salt'] . $password))
			{
				session_start();
				$_SESSION['username'] = $username;

				header('Location: membre.php');
			}
			else
				$error = "Pseudo ou Password incorrect";
		}
		else 
			$error = "Pseudo ou Password incorrect";
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
	<form method="POST" action="login.php">
		<p>Votre Pseudo</p>
			<input type="text" name="username">
		<p>Votre Password</p>
			<input type="password" name="password">
				<br/>
				<br/>
			<?php if (isset($error)): ?>
				<p class="error" style="color:red;"><?php echo $error; ?></p>
			<?php endif; ?>
			<input type="submit" value="S'inscrire" name="submit">
			<p><a href='forgot.php'>Mot de passe oublié ?</a></p>
	</form>
</body>