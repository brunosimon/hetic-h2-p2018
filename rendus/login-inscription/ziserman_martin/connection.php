<?php
	require 'inc/config.php';
	/*
		[ ]Système "Mot de passe oublié"
		[ ]Système "Se souvenir de moi"
	*/
	if(!empty($_POST)){
		$prepare = $pdo->prepare('SELECT * FROM user WHERE name = :name LIMIT 1');
		$prepare->bindValue(':name',$_POST['name']);
		$prepare->execute();
		$user = $prepare->fetch();

		if(!$user){
			echo 'Votre pseudo est invalide';
		} else {
			if ($user->password == hash('sha256',SALT.$_POST['pass'])){
				header("location:secu.php");
				session_start();
				$_SESSION['id'] = hash('sha256',hash('sha256',SALT.$_POST['pass']));
				$_SESSION['name'] = $user->name;
				exit;
			} else {
				echo "Mauvais mot de passe";
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Connection</title>
</head>
<body>
	<h1>Page de connection</h1>
	<form action="#" method="POST">
		<div class="name">
			<input type="text" name="name">
			<label for="name">Nom</label>
		</div>
		<div class="pass">
			<input type="password" name="pass">
			<label for="pass">Mot de passe</label>
		</div>
		<div class="remember"></div>
			<input type="checkbox" id="remember" name ="remember" value="remember">
			<label for="remember" id="remember">Se souvenir de moi</label>
		</div>
		<div class="submit">
			<input type="submit" value="Connection">
		</div>
	</form>
</body>
</html>