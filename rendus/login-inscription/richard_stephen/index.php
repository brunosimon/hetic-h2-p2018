<?php 
	require 'config.php';
	require 'login.php';
?>

<!-- 
-Gestion des erreurs du formulaire
-Demander deux fois le mot de passe à l'inscription et tester que les deux soient égaux
-Tester la complexité du mot de passe
-Tester si le mail n'a pas déjà été enregistré dans la BDD
-Plus de champs à l'inscription
-Envoyer un mail de confirmation d'inscription
-Envoyer un mail contenant un lien permettant de confirmer l'inscription
-Bouton de déconnexion sur la page privée
Système "Mot de passe oublié"
Système "Se souvenir de moi"
Captcha
Limiter le nombre de tentatives
-Mots de passe sécurisés (hash et salt minimum)  
-->

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Home page</title>
		<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/index.css">
	</head>
	<body>
		<div class="left">
			<h1>Bienvenue a l'accueil de ce super espace sécurisé</h1>
			<!-- <img src="img/all_logo1.png" alt="test"> -->
			<canvas class="locker" width="400" height="500"></canvas>
		</div>
		<div class="right">
			<h2>Accès espace membre</h2>
			<?php if(!empty($errors)){ ?>
			<div class="errors">
				<?php foreach($errors as $_error){ ?>
					<p>
						<?php echo $_error; ?>
					</p>
				<?php } ?>
			</div>
			<?php } ?>
			<?php if(!empty($success)){ ?>
			<div class="success">
				<?php foreach($success as $_success){ ?>
					<p>
						<?php echo $_success; ?>
					</p>
				<?php } ?>
			</div>
			<?php } ?>
			<?php if(!empty($exists)){ ?>
			<div class="exists">
				<?php foreach($exists as $_exist){ ?>
				<p>
					<?php echo $_exist; ?>
				</p>
				<?php } ?>
			</div>
			<?php } ?>
			<form action="#" method="post">
				<div class="field <?= array_key_exists('email', $errors) ? 'error' : '' ?>">
					<label for="email">Mail</label>
					<input type="email" name="email" id="email" value="<?= $_POST['email']; ?>">					
				</div>
				
				<div class="field <?= array_key_exists('password', $errors) ? 'error' : '' ?>">
					<label for="password">Password</label>
					<input type="password" name="password" id="password">
				</div>
				
				<div class="links">
					<div class="forgot link"><a href="motdepasseoublie.php">Mot de passe oublié ?</a></div>
					<div class="subscribe link"><a href="inscription.php">Pas encore inscrit ?</a></div>	
				</div>

				<input type="submit" value="CONNEXION" id="submit">
			</form>
		</div>

		<script type="text/javascript" src="js/polyfill.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		
	</body>
</html>

