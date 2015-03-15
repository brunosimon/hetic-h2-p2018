<?php
session_start();

/* 
si la variable de session login n'existe pas cela siginifie que le visiteur 
n'a pas de session ouverte, il n'est donc pas logué ni autorisé à
acceder à l'espace membres
*/
//Vérifie que l'utilisateur est bien passé par la page login
if(isset($_SESSION['id']) && isset($_SESSION['first_name'])) 
{
  echo 'Welcome '.$_SESSION['first_name'].'';
}
else
{
	echo "Please login first.";
}

//Déconnexion
if (isset($_GET["disconnect"])) 
{
	$_SESSION = array();

	//destruction des cookies aussi
	if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"]
    );
	}

	// Détruit la session
	session_destroy();
	header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>User session</h1>
    <a href="login.php">Login</a>
    <a href="login.php?disconnect=1">Disconnect</a>
</body>
</html>