<?php
	session_start();
	require 'inc/config.php';

	$prepare = $pdo->prepare('SELECT * FROM users_session WHERE session_id = :session_id LIMIT 1');

	$prepare->bindValue(':session_id', session_id());
	$prepare->execute();
	$userID = $prepare->fetch();

	if ($userID){
		header('Location: index.php');
	}

	if(!empty($_POST)){

		$prepareEmail = $pdo->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
		$prepareUsername = $pdo->prepare('SELECT * FROM users WHERE username = :username LIMIT 1');

		$prepareEmail->bindValue(':email', $_POST['username']);
		$prepareUsername->bindValue(':username', $_POST['username']);

		$prepareEmail->execute();
		$user = $prepareEmail->fetch();

		if(!$user) {
			$prepareUsername->execute();
			$user = $prepareUsername->fetch();

			if (!$user){
				$error = 'Identifiant/E-mail ou mot de passe incorrect.';
			}
			else {
				if($user->password == hash('sha256',SALT.$_POST['password'])) {
					header('Location: index.php');

					$prepareConnexion = $pdo->prepare('INSERT INTO users_session (user_id, session_id) VALUES (:user_id, :session_id)');
					$prepareConnexion->bindValue(':user_id', $user->id);
					$prepareConnexion->bindValue(':session_id', session_id());

					$prepareConnexion->execute();
				}
				else {
					$error = 'Identifiant/E-mail ou mot de passe incorrect.';
				}	
			}
		}
		else {
			if($user->password == hash('sha256',SALT.$_POST['password'])) {
				header('Location: index.php');

				$prepareConnexion = $pdo->prepare('INSERT INTO users_session (user_id, session_id) VALUES (:user_id, :session_id)');
				$prepareConnexion->bindValue(':user_id', $user->id);
				$prepareConnexion->bindValue(':session_id', session_id());

				$prepareConnexion->execute();
			}
			else {
				$error = 'Identifiant/E-mail ou mot de passe incorrect.';
			}	
		}
	}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="style/style.css"/>
</head>
<body>
	<div class="container-login">
		<h1>NOM DU SITE</h1>
		<p class="presentation">Inscrivez-vous ici.</p>
		<div class="formulaire">
			<form action="#" method="POST">
				<label> 
					<p class="info">Identifiant ou E-mail</p>
					<input type="text" name="username" placeholder="Identifiant ou E-mail" value="<?= isset($_POST['username']) ? $_POST['username'] : ''; ?>">
				</label>	
				<label> 
					<p class="info">Mot de passe</p>
					<input type="password" name="password" placeholder="Mot de passe"> 
				</label>			
				
				<?php if (isset($error)) echo '<p class="error">'.$error.'</p>'; ?>

		  		<input type="submit" value="Valider">
			</form>
		</div>
	<p class="register"> Pas de compte ? Créez en un <a class="lien2" href="inscription.php"> ici </a> </p>
	</div>
</body>
</html>