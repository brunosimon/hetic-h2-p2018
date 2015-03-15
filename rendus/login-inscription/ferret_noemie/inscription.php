<?php //Set variable
// OK Gestion des erreurs du formulaire et login 
// OK Demander deux fois le mot de passe à l'inscription et tester que les deux soient égaux OK
// Tester la complexité du mot de passe à faire
// OK Tester si le mail n'a pas déjà été enregistré dans la BDD 
// OK Plus de champs à l’inscription 
// OK Envoyer un mail de confirmation d’inscription 
// Envoyer un mail contenant un lien permettant de confirmer l'inscription
// OK Bouton de déconnexion sur la page privée. 
// Système "Mot de passe oublié"
// OK Système "Se souvenir de moi" : en fermant la page de navigation, l'uilisateur reste connecté
// Captcha
// Limiter le nombre de tentatives 
// OK Mots de passe sécurisés (hash et salt minimum) 
// En plus : OK Bordure rouge et message d'erreur rouge quand il y a une erreur, vérification si le pseudo existe
			
			
			// Afficher les erreurs à l'écran
			// error_reporting(E_ALL); 
			// ini_set("display_errors", 1);
		
			//définition des variables
			$prenom   	= $_POST['prenom'];
			$nom      	= $_POST['nom'];
			$login    	= $_POST['login'];
			$email     	= $_POST['email'];
			$password 	= $_POST['password'];
			$password2 	= $_POST['password2'];
			
			
			//vérification du formulaire 
			if(!empty($_POST))
			{ 
				require_once('inc/config.php');
				$valid = true; 
				

				// vérification si l'email est déjà dans la Base de données ou non
				$prepare = $pdo->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
				$prepare->bindValue(':email',$_POST['email']);
				$prepare->execute();

			 	$user = $prepare->fetch();

			 	if($user)
			 	{
			 		$valid = false; 
			 		$erroremail = "Email déjà utilisé";
			 	}

			 	// vérification si le pseudo est déjà enregistré

			 	$prepare = $pdo->prepare('SELECT * FROM users WHERE login = :login LIMIT 1');
				$prepare->bindValue(':login',$_POST['login']);
				$prepare->execute();

			 	$user = $prepare->fetch();

			 	if($user)
			 	{
			 		$valid = false; 
			 		$errorlogin = "Pseudo déjà utilisé! Choisis-en un autre";
			 	}
				
				// Vérification que les champs ne soient pas vide 		
				if(empty($prenom)){ 

						$valid = false; 
						$errorprenom = "Vous n'avez pas rempli votre prénom";

					}
				if(empty($nom)){ 

						$valid = false;
						$errornom =  "Vous n'avez pas rempli votre nom";
					}
				if(empty($login)){ 

						$valid = false;
						$errorlogin =  "Vous n'avez pas rempli votre login";
					}

				if(empty($email)){ 

						$valid = false;
						$erroremail =  "Vous n'avez pas rempli votre email";
					}

				if(empty($password) && empty($password2)){ 

						$valid = false;
						$errorpassword =  "Vous n'avez pas choisis de password";
					}
				
				if(hash('sha256',SALT.$password) != hash('sha256',SALT.$password2)){ 

						$valid = false;
						$errorpassword =  "les passwords ne sont pas identiques";
					}
				

				if ($valid){ //Si le formulaire n'as pas d'erreur, alors on peut envoyer
						
							
							
						$prepare = $pdo->prepare('INSERT INTO users(prenom,nom,login,email,password) VALUES (:prenom,:nom,:login,:email,:password)'); //remplace par les valeurs
						$prepare ->bindValue(':prenom',$_POST['prenom']);
						$prepare ->bindValue(':nom',$_POST['nom']);
						$prepare ->bindValue(':login',$_POST['login']);
						$prepare ->bindValue(':email',$_POST['email']);
						$prepare ->bindValue(':password',hash('sha256',SALT.$_POST['password']));
						$exec = $prepare->execute();
					
					// envoie d'un email de confirmation d'inscription

					$email = $_POST['email']; 
					$nom = $_POST['nom'];
					$login = $_POST['login'];
					$message = "Vous êtes désormais inscrit sur notre site réalisé en PHP.
					Vos identifiants sont : $login - $email - votre mot de passe : seul vous, le connaissez.

					Ceci est un mail automatique merci de ne pas répondre.";

					$destinataire = $email;
					$sujet = "Inscription réussie";
					$entete = "From: inscription@websitephp.com";

					// Dans le cas où nos lignes comportent plus de 66 caractères, nous les coupons en utilisant wordwrap()
					$message = wordwrap($message, 66, "\r\n");

					// Envoi du mail
					mail($email, $sujet, $message,$entete);
					
     				//on redirige une fois que l'inscription est finie vers la page home du site
                    header('Location: validation.php');
                    die();
                }
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<title> Inscription</title>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Enriqueta:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/reset.css">
		

</head>
<body>	
	<div class="content">
	
	<ul>
		<form action="inscription.php" method="POST">
			<h1> Inscription </h1>
		<li><input type="text" name="prenom" id="prenom" <?php if(isset($errorprenom)) echo "class='error'"?> value="<?php echo $prenom ?>">
			<label for="prenom">Prénom</label>
				<span class="error-message">
					<?php if(isset($errorprenom)) echo $errorprenom; ?>
				</span>
		</li>
	
		<li><input type="text" name="nom" id="nom" <?php if(isset($errornom)) echo "class='error'"?>value="<?php echo $nom ?>">
			<label for="nom">Nom</label>
				<span class="error-message">
					<?php if(isset($errornom)) echo $errornom; ?>
				</span>
		</li>
		
		<li><input type="text" name="login" id="login" <?php if(isset($errorlogin)) echo "class='error'"?> value="<?php echo $login ?>">
			<label for="login">Login</label>
				<span class="error-message">
					<?php if(isset($errorlogin)) echo $errorlogin; ?>
				</span>
		</li>
	
		<li><input type="text" name="email" id="email" <?php if(isset($erroremail)) echo "class='error'"?>value="<?php echo $email ?>">
			<label for="email"> Email </label>
				<span class="error-message">
					<?php if(isset($erroremail)) echo $erroremail; ?>
				</span>
		</li>
	
		<li><input type="password" name="password" class="password" <?php if(isset($errorpassword)) echo "class='error'"?> value="">
			<label for="password">Password</label>
				<span class="error-message"><?php if(isset($errorpassword) != (isset($errorpassword2))) echo $errorpassword; ?>
				</span>
		</li>
	
		<li><input type="password" name="password2" class="password" <?php if(isset($erreurpassword2)) echo "class='error'"?> value="">
			<label for="password2">Confirm Password</label>
				<span class="error-message"><?php if(isset($errorpassword) != (isset($errorpassword2))) echo $errorpassword; ?>
				</span>
		</li>
		
		<br>
		<input type="submit" class="submit" value="Envoyer">
	</form>
	</div>
</body>
</html>



