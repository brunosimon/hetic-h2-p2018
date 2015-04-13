<?php
	session_start();
	require'inc/config.php';

	if(!empty($_POST))
	{

		$prepare = $pdo->prepare('SELECT * FROM joueur WHERE pseudo = :pseudo LIMIT 1');

		$prepare->bindValue(':pseudo',$_POST['pseudo']);

		$prepare->execute();
		$joueur = $prepare->fetch();

		if(!$joueur)
		{
			echo 'User not found';
		}
		else
		{
			if($joueur->password == hash('sha256',SALT.$_POST['password']))
			{
				header("location:index.php");
				$_SESSION['login']  = $joueur->pseudo;
				$_SESSION['nom']    = $joueur->nom;
				$_SESSION['prenom'] = $joueur->prenom;
				echo '<pre>';
				print_r($_SESSION);
				echo '</pre>';	
				echo " on est la !";


			}
			else{
				echo " Echec de connexion";
			}
		}
	}

	

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="src/css/reset.css">
	<link rel="stylesheet" href="src/css/style.css">
	<title>Login</title>
</head>
<body>
	<div class="formu">
		<h1>Login</h1>
		<form action="login.php" method="POST">
			<input type="text"name="pseudo">
			<label>: Pseudo</label>
			<br>
			<input type="password" name="password">
			<label>: Password</label>
			<br>
			<input type="submit">
		</form>
	
	</div>
	
	
</body>
</html>