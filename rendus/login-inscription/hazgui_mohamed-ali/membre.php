<?php

session_start();
if($_SESSION['username'])
{
echo"Bienvenue".$_SESSION['username'];
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Membre</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

		<p> Bienvenue dans votre espace sécurisé </p>


</form>
</body>
</html>