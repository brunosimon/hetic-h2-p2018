<?php 

require 'inc/config.php';

	// Afficher le firstname et le lastname quand on arrive sur la private page
	session_start();
	if (isset($_GET['remember']))
	{
		$_SESSION['firstname'] = $_POST['firstname'];
		$_SESSION['lastname']  = $_POST['lastname'];

		$prepare = $pdo->prepare('SELECT * FROM users WHERE firstname = :firstname LIMIT 1');
		$prepare->bindValue(':firstname',$_POST['firstname']);
		$prepare->execute();

		$user = $prepare->fetch();
	}

	// Gérer la déconnexion
	if (isset($_GET['remember'])) 
	{
		session_destroy();
	    unset($_COOKIE['cookiemail']); // suppression des cookies ne marche pass
		unset($_COOKIE['cookiepassword']);  
		header('Location: login.php?disconnect=1');
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Devoir PHP</title>
	<link rel="stylesheet" href="style2.css">
</head>
<body>
	<div class="content">
		<h1>Your profil</h1>
		<!--<p>Welcome <?php if (isset($user)) { echo $_SESSION['firstname']. ' ' . $_SESSION['lastname'];} ?>!</p>-->
		<br>
		<div class="button">
			<a href="login.php?disconnect=1"><button>Sign out</button></a>
		</div>
	</div>
</body>
</html>