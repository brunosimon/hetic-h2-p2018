<?php
	
	require 'inc/config.php';


	$pseudo = $_POST['pseudo'];
	$mail   = $_POST['mail'];
	$mdp    = $_POST['mdp'];
	$mdp2   = $_POST['mdp2'];

	// Seulement un mail 	
	$getmail = $pdo->prepare("SELECT mail FROM inscription WHERE mail ='$mail' ");
	$getmail->bindValue(':mail',$_POST['mail']);
	$getmail->execute();
	

//Verification mdp
function verifmdp($mdp, $mdp2)	
{
	if($mdp != $mdp2 || $mdp == '' || $mdp2 == '' ) return 'different';
	else return "mdp=mdp2";
}

//Verification mail
function verifMail($mail)
{
	if($mail == '' && !preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#is', $mail) && !empty($getmail)) return 'notok';
	
	
	else  return "ok"; 
}

//Verication login
function verifpseudo($pseudo)
{
	if($pseudo =='') return 'notok';
	else return 'ok';
}


	


	if(!empty($_POST) && verifmdp($mdp, $mdp2) == "mdp=mdp2" && verifMail($mail) == "ok" && verifpseudo($pseudo)=="ok")
	{	
		// header('location: bienvenue.php');
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		echo '<pre>';
		print_r($getmail);
		echo '</pre>';

		$prepare = $pdo->prepare('INSERT INTO inscription (pseudo,mail,mdp,mdp2) VALUES (:pseudo,:mail,:mdp,:mdp2)');

		$prepare->bindValue(':pseudo', $_POST['pseudo']);
		$prepare->bindValue(':mail',$_POST['mail']);
		$prepare->bindValue(':mdp', hash('sha256',SALT.$_POST['mdp']));
		$prepare->bindValue(':mdp2', hash('sha256',SALT.$_POST['mdp2']));
		

		$prepare->execute();

		$_SESSION['mail'] = $mail;
		$_SESSION['mdp']  = $mdp;	
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Inscription</h1>
	<form action="#" method="POST">
		<input type="text" name='pseudo'>
		<label for="">Pseudo</label>
		<br>
		<input type="text" name='mail'>
		<label for="">Mail</label>
		<br>
		<input type="password" name='mdp'>
		<label for="">Mot de Passe</label>
		<br>
		<input type="password" name='mdp2'>
		<label for=""> Verification du Mot de Passe</label>
		<br>
		<input type="submit">
	</form>
</body>
</html>