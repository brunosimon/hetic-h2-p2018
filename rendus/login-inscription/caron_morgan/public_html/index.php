<?php 
	require ('../inc/config.php'); 
	session_start();

	//try to log in from cookie
	include ('../autologin.php');

	if (!empty($_SESSION['errors'])) 
		$errors = $_SESSION['errors'];
	unset($_SESSION['errors']);

	//set up a random image for the captcha
	$img = time().'lorem.ovh-80-240.jpgx';
			
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login et Inscription</title>
	<link rel="stylesheet" href="./css/reset.css">
	<link rel="stylesheet" href="./css/style.css">
</head>

<!-- Énoncé
Seul, vous devez développer un formulaire d'inscription et un formulaire de login permettant d'accéder à une page privée.
Si le visiteur tente d'accéder à la page sans s'être connecté, il sera automatiquement redirigé vers la page de login.
Ces formulaires devront intégrer un maximum des features suivantes ainsi que toutes les features que vous auriez pu imaginer. 

	Exemple de features
	 Gestion des erreurs du formulaire
	 Demander deux fois le mot de passe à l'inscription et tester que les deux soient égaux
	 Tester la complexité du mot de passe
	 Tester si le mail n'a pas déjà été enregistré dans la BDD
	Plus de champs à l'inscription
	 Envoyer un mail de confirmation d'inscription
	 Envoyer un mail contenant un lien permettant de confirmer l'inscription
	 Bouton de déconnexion sur la page privée
	 Système "Mot de passe oublié"
	 Système "Se souvenir de moi"
	 Captcha
	 Limiter le nombre de tentatives
	 Mots de passe sécurisés (hash et salt minimum) 
-->
<body>
	<div class="intro">
		<h1>Bienvenue, souhaitez-vous visiter la <a href="private.php">Zone Privée</a> ?</h1>
	</div>
	<!-- if user is not authentified -->
	<?php if (empty($_SESSION['usr'])): ?>
	<div class="connect-container">
	<!-- Login -->
		<div class="form-container">
		<?php if(!empty($errors)):?><p class="errors"> <?= $errors ?> </p> <?php endif;?>
			<div class="login-container">
				<h2>Se connecter</h2>
				<form action="../login.php" method="POST" class="connect-form login-form">
					<label for="email">Email<br/>
						<input type="email" id="email" name="email" placeholder="email">
					</label>
					<label for="password">Password<br/>
						<input type="password" id="password" name="password" placeholder="password">
					</label>
					<label for="rememberMe">Rester connecté (1 jour)
						<input type="checkbox" id="rememberMe" name="rememberMe">
					</label>
					<input type="hidden"  name="action" value="login">
					<input type="submit" value="Se connecter">
				</form>
			</div>	
			<!-- Inscription -->
			<div class="register-container ">
				<h2>S'inscrire</h2>
				<form action="../register.php" method="POST" class="connect-form register-form">
			<!-- 					<label for="firstname">Prénom
							<input type="text" id="firstname" name="firstname" placeholder="Votre prénom">
						</label>
						<label for="lastname">Nom
							<input type="text" id="lastname" name="lastname" placeholder="Votre nom">
						</label> -->
					<label for="email">E-mail<br/>
						<input type="email" id="email" name="email" placeholder="Email">
					</label>				
					<label for="email-bis">Vérifiez votre email<br/>
						<input type="email" id="email-bis" name="email-bis" placeholder="Email">
					</label>
					<label for="password">Mot de passe<br/>
						<input type="password" id="password" class="login-password" name="password" placeholder="Password">
					</label>				
					<label for="password-bis">Vérifiez le mot de passe<br/>
						<input type="password" id="password-bis" class="login-password-bis" name="password-bis" placeholder="Password">
					</label>
					<label for="show-password">Voir son mot de passe
					<input type="checkbox" id="show-password" name="show-password">
					</label>

					<a href='http://www.opencaptcha.com'>
						<img src='http://www.opencaptcha.com/img/<?=$img?>' height='$height' alt='captcha' width='$width' border='0' />
					</a>
					<input type="text" name="captcha" placeholder='Entrez le code' size='35'/>	
					<input type="hidden" name="captcha_data" value="<?=$img?>">	
					<input type="hidden"  name="action" value="register">
					<input type="submit" value="S'inscrire">
				</form>
			</div>	
		</div>
		
	</div>
	
	<!-- if user is authentified -->
	<?php else:  ?>

	<div>
		<h1>Bienvenue sur votre page personnelle <?= $_SESSION['usr'] ?> !</h1>
		<form action="../logout.php" method="GET">
			<input type="hidden" name="action" value="logout">
			<input type='hidden' name='link' value='<?= $_SERVER['REQUEST_URI']; ?>' />
			<input type="submit" name="logout" id="logout" value="Se déconnecter">
		</form>
	</div>

	<?php endif; ?>

	<script src="./js/script.js"></script>
</body>
</html>