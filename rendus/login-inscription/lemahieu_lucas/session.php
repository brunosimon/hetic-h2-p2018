<?php

session_start();

// redirection si non connecté
if(empty($_SESSION['pseudo'])) 
{
  header('Location:login.php');
  exit();
}

// Accès à la page profil
if(array_key_exists('profile', $_POST))
{
	header('Location:profile.php');
    exit();
}

// Destruction session et redirection login
if(array_key_exists('disconnect', $_POST))
{
	$_SESSION = array();
	if (ini_get("session.use_cookies")) 
	{
    	$params = session_get_cookie_params();
    	setcookie(session_name(), '', time() - 42000,
	        $params["path"], $params["domain"],
	        $params["secure"], $params["httponly"]
    	);
	}
	session_destroy();
	header('Location:login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="src/css/style.css"></link>
</head>
<body class="body-home">

	<h1>Bienvenue <?php echo $_SESSION['pseudo'] ?> ! </h1>

	<form action="#" method="POST">
		<input type="hidden" name="profile">
		<input class="input-session" type="submit" class="valider" value="Modifier son profil" />
	</form>

	<form action="#" method="POST">
		<input type="hidden" name="disconnect">
		<input class="input-session" type="submit" class="valider" value="Se déconnecter" />
	</form>
</body>
</html>