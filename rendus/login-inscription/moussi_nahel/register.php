<?php 


//On se connecte à la base de donnée
require_once 'inc/config.php';
?>

<?php 

//On verifier si il y'a un post + conditions 
if(!empty($_POST) && strlen($_POST['prenom'])>4 && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){

	//Declaration variable + Securise contre l'injection Mysql (1 = 1)
	$prenom = addslashes($_POST['prenom']);
	$email = addslashes($_POST['email']);
	$password = sha1($_POST['password']);
	$token = sha1(uniqid(rand())); //On securise le token
	$req_email = $pdo->prepare('SELECT email FROM nm_devoir1 WHERE email = :email LIMIT 1');
	$req_email->execute(['email'=> $_POST['email']]);
	$req_prenom = $pdo->prepare('SELECT prenom FROM nm_devoir1 WHERE prenom = :prenom LIMIT 1');
	$req_prenom->execute(['prenom'=> $_POST['prenom']]);

		//Mise en place des differentes conditions
		if ($req_email -> fetch()){ 

			$error_email_existe='Votre E-mail est déjà enrengistré';
		}
		if ($req_prenom -> fetch()){ 

			$error_prenom_existe='Ce pseudo est déjà utilisé';
		}
		if (ctype_digit($_POST['password']) || ctype_alpha($_POST['password']) ){
			$error_mdp_imcomplet = 'Votre mot de passe doit comporter des chiffres et des lettres';
		}
		if($_POST['password'] != $_POST['r_password']){
			$error_password_verification = 'Les deux mots de passes sont differents';
		}

		//Si toute les conditions sont remplies..
	else{
	//Requete PDO
	$q= array('prenom'=>$prenom, 'email'=>$email, 'password'=>$password, 'token'=>$token);
	$sql='INSERT INTO nm_devoir1 (prenom, email, password, token) VALUES (:prenom, :email, :password, :token)';
	$req = $pdo-> prepare($sql);
	$req->execute($q);

	//Envoyer un mail pour la validation du compte
	$to = $email;
	$sujet = 'Activation de votre compte';
	$body = 'Bienvenu sur LJDLF, veillez activer votre compte en cliquant ici -> 
	<a href="http://magnhetic.fr/Nahel/Devoir_un/activate.php?token='.$token.'&email='.$to.'">Activation du compte </a>';
	$headers  = 'MIME-Version:1.0'."\r\n";                       // Email content type system (?)
	$headers .= 'From: Nahel.fr'."\r\n";                 // Classique
	$headers .= 'Content-type:text/html;charset=utf-8'."\r\n";   // Contenu HTML
	'Reply-To:nahel.moussi@hotmail.fr'."\r\n";             // Reply to
	'X-Mailer : PHP/' . phpversion();
	mail($to, $sujet, $body, $headers);
	$validation= "Bienvenue sur LJDLF " .$prenom. " un mail d'activation de compte vien de vous être envoyé ";

	}
}
//Si les conditions sont mal remplies...
else{
		if(!empty($_POST) && strlen($_POST['prenom'])<4){
			$error_prenom = 'Votre pseudo doit au minimum comporter 4 caractéres!';
		}

		if(!empty($_POST) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$error_email = 'Votre E-mail est invalide!';
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
</head>
<body>
	<h1>Formulaire de d'inscription : </h1>
		<form action="register.php" method="POST">

			
			<input type="text" name='prenom' value='<?php if(isset($_POST['prenom'])) { echo $_POST['prenom']; }?>' >
			<label for="prenom">Pseudo</label>
			<br>
			<div class="error"> 
				<?php if(isset($error_prenom)) {echo $error_prenom;} ?>
			</div>
			<div class="error"> 
				<?php if(isset($error_prenom_existe)) {echo $error_prenom_existe;} ?>
			</div>

			<input type="text" name='email' value='<?php if(isset($_POST['email'])) { echo $_POST['email']; }?>'>
			<label for="email">E-mail</label>
			<br>
			<div class="error"> 
				<?php if(isset($error_email)) {echo $error_email;} ?>
			</div>

			<div class="error"> 
				<?php if(isset($error_email_existe)) {echo $error_email_existe;} ?>
			</div>

			<input type="password" name="password" value="">
			<label for="password">Password</label>
			<br>
			<div class="error"> 
				<?php if(isset($error_mdp_imcomplet)) {echo $error_mdp_imcomplet;} ?>
			</div>

			<input type="password" name="r_password" value="">
			<label for="r_password">Password</label>
			<br>
			<div class="error"> 
				<?php if(isset($error_password_verification)) {echo $error_password_verification;} ?>
			</div>

			<div class="error"> 
				<?php if(isset($validation)) {echo $validation;} ?>
			</div>

			
			

			<input type="submit" value="S'inscrire">
		</form>

	
</body>
</html>