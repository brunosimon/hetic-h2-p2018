<?php
session_start(); // On initialise une session

require 'inc/config.php';

if(!empty($_POST))
	{
		// Variable booléenne permettant de savoir si tout est validé, par défaut vraie.
		$valid = true;

		// Variable qui vérifie que la chaine de caractères ne contient pas de chiffre.
		$first_name_Number = strcspn($_POST['first_name'], '0123456789');
		$name_Number = strcspn($_POST['name'], '0123456789');

		// Si le prénom est vide on affiche un message d'erreur, sinon si inférieur à 2 caractères ou s'il contient des chiffres, message d'erreur.
		if(empty($_POST['first_name'])) {
			$valid = false;
			$blank_first_name = "Veuillez renseignez un prénom";
		} 
		else if(strlen($_POST['first_name']) < 2 || $first_name_Number != strlen($_POST['first_name'])) {
			$valid = false;
			$error_first_name = "Veuillez renseignez un prénom correct";
		} 

		// Comme pour le prénom mais avec le nom.
		if(empty($_POST['name'])) {
			$valid = false;
			$blank_name = "Veuillez renseignez un nom";
		} 
		else if(strlen($_POST['name']) < 2 || $name_Number != strlen($_POST['name'])) {
			$valid = false;
			$error_name = "Veuillez renseignez un nom correct";
		} 

		// Si l'âge est vide, message d'erreur. Si la valeur entrée n'est pas un nombre et s'il est inférieur à 5 ou supérieur à 100, message d'erreur.
		if(empty($_POST['age'])) {
			$valid = false;
			$blank_age = "Veuillez renseigner votre âge";
		} 
		else if(is_nan((double)$_POST['age']) || ($_POST['age']) < 5 || ($_POST['age']) > 100) {
      		$valid = false;
      		$error_age = 'Veuillez renseigner votre âge réel';
   		}

   		// Si aucun bouton radio n'est coché, message d'erreur
   		if(empty($_POST['gender'])) {
			$valid = false;
			$blank_gender = "Veuillez indiquer votre sexe";
		}

		// Si le mail est vide, message d'erreur.
		if(empty($_POST['mail'])) {
			$valid = false;
			$blankmail = "Vous n'avez pas rempli votre mail";
		}	
		else if (!filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)) {
			$valid = false; 
			$errormail = 'Mail incorrect';
		}

		// Si le pseudo est vide, message d'erreur, sinon si supérieur à 12 message d'erreur.
		if(empty($_POST['pseudo'])) {
			$valid = false;
			$blankpseudo = "Vous n'avez pas rempli votre pseudo";
		}
		else if (strlen($_POST['pseudo']) > 12) {
			$valid = false;
			$errorpseudo = 'Le mot de passe doit contenir maximum 12 caractères';
		}

		// Si le password est vide, message d'erreur, et doit contenir au moins 6 caractères (1minuscule, 1majuscule) et 1 chiffre
		if(empty($_POST['password'])) {
			$valid = false;
			$blankpassword = "Vous n'avez pas rempli votre mot de passe";
		}
		else if (strlen($_POST['password']) < 6 || !preg_match("#[a-z]+#", $_POST['password']) || !preg_match("#[A-Z]+#", $_POST['password']) || !preg_match("#[0-9]+#",$_POST['password'])) {
			$valid = false;
			$errorpassword = 'Le mot de passe doit contenir au moins 6 caractères, dont une minuscule et une majuscule, et 1 chiffre';
		}

		// Si le mot de passe de confirmation est vide, message d'erreur.
		if(empty($_POST['confirmed'])) {
			$valid = false;
			$blankconfirmed = "Merci de confirmer votre mot de passe";
		}
		else if ($_POST['password'] != $_POST['confirmed']){
			$valid = false;
			$errorconfirmed = "Mauvaise confirmation";
		}

		// Validation du captcha. S'il est vide ou mauvais, message d'erreur. 
    	if ($_SESSION['captcha'] != $_POST['captcha']) {
    		$valid = false;
        	$captcha_error = "Veuillez indiquer le texte correspondant à l'image";
    	} 

		// Vérifie si le mail est déjà dans la BDD 
		$prepare = $pdo->prepare('SELECT mail FROM users WHERE mail = :mail');
		$prepare->bindValue(':mail',$_POST['mail']);
		$prepare->execute();
		$mail = $prepare->fetch();
			if ($mail) {
				$valid = false;
				$error_mail['mail'] = 'Cette adresse est déjà utilisée';
			}

		// Si tout est bien remplis, on insert les données dans la BDD et on chiffre le mot de passe.
		if ($valid) {
			$prepare = $pdo->prepare('INSERT INTO users (prenom, nom, mail,password) VALUES (:first_name, :name, :mail, :password)');
			$prepare->bindValue(':first_name',$_POST['first_name']);
			$prepare->bindValue(':name',$_POST['name']);
			$prepare->bindValue(':mail',$_POST['mail']);
			$prepare->bindValue(':password',hash('sha256',SALT.$_POST['password']));
			$prepare->execute(); 
			
			$to = $_POST['mail']; // Adresse de destination.
			$passage_ligne = "\n"; // Saut de ligne
			$boundary = "-----=".md5(rand()); //Création de la boundary
			$sujet = "Inscription"; // Sujet
			//Création du header du mail
			$header = "From: \"Romain\"<lapi.romain@gmail.com>".$passage_ligne;
			$header.= "Reply-to: \"Romain\" <lapi.romain@gmail.com>".$passage_ligne;
			$header.= "MIME-Version: 1.0".$passage_ligne;
			$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
			// Déclaration du message à envoyer
			$message = "Merci de votre inscription";
			// Envoi du mail.
			mail($to,$sujet,$message,$header);

			echo "<script language='Javascript'>document.location='login.php'</script>";
			}	
	}
?> 
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Formulaire d'inscription</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<h1>Inscription</h1>
		<form action="#" method="POST">
			<input type="text" placeholder="Prénom" id="first_name" name="first_name" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
			<label for="first_name">Prénom</label>
			<span class="error-message"><?php if(isset($error_first_name)) echo $error_first_name; else if(isset($blank_first_name)) echo $blank_first_name ?></span>
			<br>
			<input type="text" placeholder="Nom" id="name" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>">
			<label for="name">Nom</label>
			<span class="error-message"><?php if(isset($error_name)) echo $error_name; else if(isset($blank_name)) echo $blank_name ?></span>
			<br>
			<input type="text" placeholder="Age" id="age" name="age" value="<?php if(isset($_POST['age'])) echo $_POST['age']; ?>">
			<label for="age">Age</label>
			<span class="error-message"><?php if(isset($blank_age)) echo $blank_age; else if(isset($error_age)) echo $error_age; ?></span>
			<br>
			<input type="radio" id="male" name="gender" <?php if (isset($_POST['gender']) && $_POST['gender']=="male") echo "checked";?> value="male">
			<label for="male">Homme</label>
			<input type="radio" id="female" name="gender" <?php if (isset($_POST['gender']) && $_POST['gender']=="female") echo "checked";?> value="female">
			<label for="female">Femme</label>
			<span class="error-message"><?php if(isset($blank_gender)) echo $blank_gender ?></span>
			<br>
			<input type="text" placeholder="Mail" id="mail" name="mail" value="<?php if(isset($_POST['mail'])) echo $_POST['mail']; ?>">
			<label for="mail">Mail</label>
			<span class="error-message"><?php if(isset($blankmail)) echo $blankmail; else if (isset($errormail)) echo $errormail; else if (isset($error_mail['mail'])) echo $error_mail['mail'] ?></span>
			<br>
			<input type="text" placeholder="Pseudo" id="pseudo" name="pseudo" value="<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo']; ?>">
			<label for="pseudo">Pseudo</label>
			<span class="error-message"><?php if(isset($errorpseudo)) echo $errorpseudo; else if(isset($blankpseudo)) echo $blankpseudo ?></span>
			<br>
			<input type="password" placeholder="Mot de passe" id="password" name="password">
			<label for="password">Mot de passe</label>
			<span class="error-message"><?php if(isset($blankpassword)) echo $blankpassword; else if (isset($errorpassword)) echo $errorpassword ?></span>
			<br>
			<input type="password" placeholder="Confirmation" id="confirmed" name="confirmed">
			<label for="confirmed">Confirmation</label>
			<span class="error-message"><?php if (isset($blankpassword)) echo''; else if(isset($blankconfirmed)) echo $blankconfirmed; else if (isset($errorconfirmed)) echo $errorconfirmed; ?></span>
			<br>
			<img src="captcha.php" id="captcha" /><br/>
			<a href="#" onclick="document.getElementById('captcha').src='captcha.php?'+Math.random();"
		    id="change-image">Générer un autre texte</a><br/><br/>
			<input type="text" placeholder="Captcha" id="captcha" name="captcha">
			<label for="captcha">Captcha</label>
			<span class="error-message"><?php if (isset($captcha_error)) echo $captcha_error; ?></span>
			<br>		
			<input type="SUBMIT">
		</form>
	</body>
</html>