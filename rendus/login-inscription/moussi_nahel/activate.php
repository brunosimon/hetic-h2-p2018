<?php 

require_once 'inc/config.php';


//Il faut que la valeur token soit identique à celle de l'URL
$token = $_GET['token'];
$email = $_GET['email'];
	

//Si on a bien une valeur dans l'URL...
if(!empty($_GET)){

	$q= array('email'=>$email, 'token'=>$token);
	$sql='SELECT email,token FROM nm_devoir1 WHERE email = :email AND token = :token '; //On recupére le bon utilisateur
	$req = $pdo -> prepare($sql);
	$req->execute($q);
	$count = $req ->rowCount($sql); //rowCount retourne le nombre de lignes affectées par le dernier appel à la fonction 

		//Si il y'a bon une requête avec un utilisateur existant...
		if($count == 1){
			$v= array('email'=>$email, 'activer'=>'1');

			$sql='SELECT email,activer FROM nm_devoir1 WHERE email = :email AND activer = :activer';
			$req = $pdo -> prepare($sql);
			$req->execute($v);
			$actif = $req ->rowCount($sql);

			//Si l'utilisateur est déjà actif
			if($actif == 1 ){
				$error_actif = 'Votre compte est déjà actif';
			}
			else{
				//Sinon on active son compte
				$u=array('email'=>$email, 'activer'=>'1' );
				$sql= 'UPDATE nm_devoir1 SET activer = :activer WHERE email = :email';
				$req = $pdo -> prepare($sql);
				$req->execute($u);
				$activated = 'Votre compte est desormais actif, 
				<br/> <a href="http://magnhetic.fr/Nahel/Devoir_un/index.php">Vous connecter à LJDLF </a>';
			}
		}
		else{
			//Si l'utilisateur est inconnu
			$prob_token = 'Utilisateur inexistant
			<br/> <a href="http://magnhetic.fr/Nahel/Devoir_un/register.php">Vous créer un compte </a>';
		}

	}
?> 





<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Activation</title>
</head>
<body>
	<h1>Activation du compte : </h1>

	<div class="error"> 
		<?php if(isset($error_actif)) {echo $error_actif;} ?>
	</div>
	<div class="error"> 
		<?php if(isset($activated)) {echo $activated;} ?>
	</div>
	<div class="error"> 
		<?php if(isset($prob_token)) {echo $prob_token;} ?>
	</div>
		
	
</body>
</html>