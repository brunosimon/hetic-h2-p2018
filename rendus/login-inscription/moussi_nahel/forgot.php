<?php 


require_once 'inc/config.php';

//Si l'utilisateur envoie un mail correct ..
if( !empty($_POST) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){

	$email = $_POST['email'];
	$req_email = $pdo->prepare('SELECT email FROM nm_devoir1 WHERE email = :email LIMIT 1');
	$req_email->execute(['email'=> $_POST['email']]);

	//Si un mail est present dans la base de donné alors .. 
		if($req_email -> fetch()){

			//On genere un mot de passe aléatoire
			function CarAleatoire($taille){
				  $cars="azertyiopqsdfghjklmwxcvbn0123456789"; //Listes des caractères possibles
				  $mdp='';
				  $long=strlen($cars);
				  srand((double)microtime()*1000000); //Initialise le générateur de nombres aléatoires
				  for($i=0;$i<$taille;$i++)$mdp=$mdp.substr($cars,rand(0,$long-1),1);
				  return $mdp;
				}
				$n_mdp= CarAleatoire(8); // On stock le nouveau mdp dans une variable

			//On change le mdp dans la base de donnée
			$v= array('email'=>$email, 'password'=> sha1($n_mdp)); 
			$sql='UPDATE nm_devoir1 SET password = :password WHERE email = :email';
			$req = $pdo -> prepare($sql);
			$req->execute($v);

			//Envoie d'un mail avec le nouveau mdp
			$to = $email;
			$sujet = 'Nouveau mot de passe';
			$body = 'Voici votre nouveau mot de passe : ' .$n_mdp. '
			<br/> <a href="http://magnhetic.fr/Nahel/Devoir_un/index.php">Vous connecter à LJDLF </a>';
			$headers  = 'MIME-Version:1.0'."\r\n";                       
			$headers .= 'From: Nahel.fr'."\r\n";                 
			$headers .= 'Content-type:text/html;charset=utf-8'."\r\n";   
			'Reply-To:nahel.moussi@hotmail.fr'."\r\n";             
			'X-Mailer : PHP/' . phpversion();
			mail($to, $sujet, $body, $headers);

			$validation='Un E-mail vient de vous être envoyé.';
		}
//Sinon le mail n'est pas present dans la base de donnée
	else{
			$error_email_inexiste="Votre E-mail n'est pas enrengistrer.";

		}
	}
//Sinon si l'email est incorrect...
else if( !empty($_POST) && isset($_POST['submit']) ){
			$error_email='Veillez saisir un E-mail correct.';

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Connexion</title>
</head>
<body>
	<h1>Mot de passe oublié</h1>
		<form action="forgot.php" method="POST">

			<input type="text" name='email'>
			<label for="email">Veillez saisir votre email</label>
			<br>
			<input type="submit" name='submit'>
		</form>

		<div class="error"> 
				<?php if(isset($error_email_inexiste)) {echo $error_email_inexiste;} ?>
			</div>

			<div class="error"> 
				<?php if(isset($validation)) {echo $validation;} ?>
			</div>

			<div class="error"> 
				<?php if(isset($error_email)) {echo $error_email;} ?>
			</div>

	<a href="register.php">Vous n'avez pas de compte</a>
	<a href="index.php">Je me souviens de mon mot de passe</a>

</body>
</html>