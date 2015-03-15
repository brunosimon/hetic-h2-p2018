<?php
	if (empty($_SESSION['login'])){
		header("location=login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>page secu</title>
</head>
<body>

<h1>Bienvenue sur votre espace perso</h1>
<br/>
<a href="deconnexion.php">Déconnexion</a>

</body>
</html>