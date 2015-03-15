<?php
	//Securize private page
	session_start();
	if(empty($_SESSION['login']))
	{
		header('Location: login.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Private</title>
	</head>

	<body>

		<p>Vous faites partie des nôtres et vous êtes correctement connecté à cette page privée !</p>
		
		<p>Attention ! Si vous supprimez le Cookie PHPSESSID ou que vous vous déconnectez et que vous re-actualisez cette page, il vous faudra vous re-connecter !</p>
		
		<a href="inc/deconnexion.php" target="_blank">
			<input type="button" value="Se déconnecter">
		</a>

	</body>

</html>