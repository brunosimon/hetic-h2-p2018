<?php
session_start();
if(!empty($_GET) && !empty($_GET['hash']))
{
	extract($_GET);
}
else
{
	header('Location: index.php');
}

  try{
  $bdd = new PDO('mysql:host=localhost;dbname=exercice-login-landanger_lucien', 'root', 'root') or die(print_r($bdd->errorInfo()));
  $bdd->exec('SET NAMES utf8');
  }
  
  catch(Exeption $e){
  die('Erreur:'.$e->getMessage());
  }
	
	$req = $bdd->prepare('SELECT email,hash,actif FROM membre WHERE email=:email AND hash=:hash AND actif=:actif');
	$req->execute(array(
		'email'=>$email,
		'hash'=>$hash,
		'actif'=>0
	));
	$req->closeCursor();
	
	if($req->rowCount()==0)
	{
		$erreur = 'Invalide ! Si vous avez déjà cliqué sur le lien d\'activation, votre compte est déjà actif, sinon consultez votre
		boite de réception';
	}
	
	else
	{
		$req = $bdd->prepare('UPDATE membre SET actif=1 WHERE email=:email AND hash=:hash AND actif=:actif');
		$req->execute(array(
		'email'=>$email,
		'hash'=>$hash,
		'actif'=>0
		));
		$req->closeCursor();
		
		$ok = 'Votre compte est actif ! Vous pouvez vous <a href="login.php">connecter</a> !';
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<head>
  <title></title>
</head>
<body>
  <div id="wrap">
		<h3>Confirmation</h3>
		<div class="ok">
			<?php if(isset($ok)) echo $ok;?>	
		</div>
		<div class="erreur">
			<?php if(isset($erreur)) echo $erreur;?>
		</div>
  </div>
</body>
</html>