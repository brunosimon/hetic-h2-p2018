<?php
	/*
	[ ]Formulaire : pseudo mdp & confirmation, email, nom & prénom, image?

	F E A T U R E S
	[√]Gestion des erreurs du formulaire
	[√]Demander deux fois le mot de passe à l'inscription et tester que les deux soient égaux
	[√]Tester la complexité du mot de passe
	[√]Si erreur laisser les champs complétés
	[√]Tester si le mail et le pseudo n'ont pas déjà été enregistré dans la BDD
	[ ]Plus de champs à l'inscription
	[ ]Envoyer un mail de confirmation d'inscription
	[ ]Envoyer un mail contenant un lien permettant de confirmer l'inscription
	[√]Mots de passe sécurisés (hash et salt minimum)

	N E  P A S  O U B L I E R
	[√] Passer les input des psswd en type password
	*/

	require 'inc/config.php';

	if(!empty($_POST))
	{

		//S E T   V A R I A B L E S  
		$pseudo 	= $_POST['pseudo'];
		$password 	= $_POST['password'];
		$password1 	= $_POST['password1'];
		$mail 		= $_POST['mail'];
		$error		= false;

		//S E T   E R R O R S

		//mail already in db
		$query = $pdo->query("SELECT COUNT(pseudo) FROM users WHERE pseudo='$pseudo'");
		$user_pseudo = $query->fetchColumn();
		if($user_pseudo != 0){
			echo "<p>Pseudo déja utilisé</p>";
			$error = true;
		}

		//pseudo length
		if(strlen($pseudo)>25 || strlen($pseudo)<6)
		{
			echo "<p>Ton pseudo doit faire entre 6 et 25 caractères</p>";
			$error = true;
		}

		//no space in pseudo
		if(strstr($pseudo, ' '))
		{
			echo "<p>Ton pseudo ne doit pas contenir d'espace(s)<p>";
			$error = true;
		}

		//pass length
		if(strlen($password)>25 || strlen($password)<8)
		{
			echo "<p>Ton mot de passe doit faire entre 8 et 25 caractères</p>";
			$error = true;
		}

		//pass w/ at least 1 figure
		if(!preg_match('#[1-9]#', $password))
		{
			echo "<p>Le mot de passe doit comporter des lettres (majuscule(s) ET minuscules) ET de chiffres et ne doit pas contenir d'espace(s)</p>";
			$error = true;
		}

		//pass w/ not only letters, not only figures, no spaces
		if(ctype_alpha($password) || ctype_digit($password) || strstr($password, ' '))
		{
			echo "<p>Le mot de passe doit comporter des lettres (majuscule(s) ET minuscules) ET de chiffres et ne doit pas contenir d'espace(s)</p>";
			$error = true;
		}

		//checking pass confirmation
		if($password !== $password1)
		{
			echo "<p>Les mots de passe de sont pas identiques</p>";
			$error = true;
		}

		//checking the mail
		if(!strstr($mail, '@') && !strstr($mail, '.'))
		{
			echo "<p>Entre une adresse e-mail valide s'il te plait</p>";
			$error = true;
		}

		//mail already in db
		$query = $pdo->query("SELECT COUNT(email) FROM users WHERE email='$mail'");
		$user_mail = $query->fetchColumn();
		if($user_mail != 0){
			echo "<p>Mail déja utilisé</p>";
			$error = true;
		}

		//D B   I N S C R I P T I O N
		if(!$error)
		{
			// Prepare the query
			$prepare = $pdo->prepare('INSERT INTO users (pseudo,password,email) VALUES (:pseudo,:password,:email)');

			// Set variables
			$prepare->bindValue(':pseudo',$pseudo);
			$prepare->bindValue(':password',hash('sha256', SALT.$password));
			$prepare->bindValue(':email',$mail);

			// Execute the query
			$exec = $prepare->execute();

			echo "</p>Bravo, maintenant <a href='login.php'> Connectez-vous</a></p>";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Inscription</title>
		<link rel="stylesheet" href="styles.css">
		<link href='http://fonts.googleapis.com/css?family=Raleway:200,500,900' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<form action="#" method="post">
			<fieldset>
			<legend>Inscription</legend>
				<input type="text" name="pseudo" placeholder="Ton pseudo" value="<?php echo $pseudo ?>">
				<br>
				<input type="password" name="password" placeholder="Ton mot de passe">
				<br>
				<input type="password" name="password1" placeholder="Confirmation du mot de passe">
				<br>
				<input type="mail" name="mail" placeholder="Ton adresse e-mail" value="<?php echo $mail ?>">
				<br>
				<input type="submit" value="Valider">
			</fieldset>
		</form>
	</body>
</html>