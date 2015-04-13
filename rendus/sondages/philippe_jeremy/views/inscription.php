<?php 

require '../inc/config.php';

//Check login
function check_login($login){
	if(!empty($login)){
		if(preg_match('/[a-zA-Z0-9]/', $login)){
			$correct_syntax= true;
		}else{
			$result['login']=  'Caractères spréciaux non autorisés';
		}
		if(strlen($login)>= 5 && strlen($login)<= 25){
			$login_length= true;
		}else{
			$login_length= false;
			$result['login'] = 'Votre login doit être compris entre 5 et 25 caractères.';
		}
		if($correct_syntax && $login_length){
			$result['login'] = '';
		}else{
			return false;
		}
	}
return $result['login'];
}

//Check mail
function check_mail($mail){
	if(!empty($mail)){
		if(preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $mail)){
			$mail_syntax= true;
			$result['mail'] = '';
		}else{
			$result['mail'] = 'Veuillez correctement saisir votre adresse mail.';					
		}
	}
return $result['mail'];	
}

//Check password
function check_password($password, $password_cfrm){
	if(!empty($password)){
		if(preg_match('/[a-zA-Z0-9-_.]+/', $password) && strlen($password)>= 8){
			$password_syntax= true;
		}else{ 
			$result['password'] = 'Veuillez choisir un mot de passe sécurisé d\'au moins 8 caractères et mélangeant lettres minuscules et majuscules, chiffres et caractères spéciaux (: / ; . , ? ! §).';
		}	
	}
	if(!empty($password_cfrm)){
		if(strcasecmp($password, $password_cfrm)!== 0){
			$result['password'] = 'Vos mots de passe ne correspondent pas, veuillez confirmer à nouveau votre saisie.';
		}
		else if(strcasecmp($password, $password_cfrm)== 0 && $password_syntax==true){
			$result['password'] = ''; 
		}
	}
return $result['password'];
}

//Check si mail ou login n'existe pas dans BDD ??  



	//Set variables
	$errors= array();
	$success= array();

//Si tout bon, renvoie vrai, enregistrement BDD.
if(!empty($_POST)){
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';

	$login= $_POST['login'];
	$mail= $_POST['mail'];
	$password= $_POST['password'];
	$password_cfrm= $_POST['password_cfrm'];

	/*$errors= get_errors($_POST);*/
	$result= array();

	$result=['login', 'mail', 'password'];

	$result['login']= check_login($login);
	$result['mail']= check_mail($mail);
	$result['password']= check_password($password, $password_cfrm);

	$all_right= $result['login']== "" && $result['mail']== '' && $result['password']== '';

	if($all_right){
		$success[]= 'Bravo !';
		
		define('SALT', 'zwqx(rd_v,jiao;k)p:l=^m');
		
		//Correct formular
		$prepare= $pdo->prepare('INSERT INTO users (login, mail, password) VALUES (:login, :mail, :password)');
		
		$prepare-> bindValue(':login', $_POST['login']);
		$prepare-> bindValue(':mail', $_POST['mail']);
		$prepare-> bindValue(':password',hash('sha256', $_POST['password'].SALT));
		$prepare-> execute();

		echo 'membre enregistré !';

		//Mettre qqch ici pour rediriger l'utilisateur sur la
	
	}else{
		echo 'It seems your form isn\'t correctly filled, please follow our remarks.';
	}
}else{
	echo 'You have to fill the form.';	
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
	<link rel="stylesheet" href="../css/reset.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php include 'views/menu.php' ?>

	<!--  SUCCESS -->
	<?php if(!empty($success)): ?>
		<div class="success">
			<?php foreach($success as $_success): ?>
				<span>
					<?= $_success; ?>
				</span>
			<?php endforeach; ?>		
		</div>
	<?php  endif; ?>

	<!--  ERRORS -->
	<?php if(!empty($errors)): ?>
		<div class="errors">
			<?php foreach($errors as $_error): ?>
				<span>
					<?= $_error; ?>
				</span>
			<?php endforeach; ?>		
		</div>
	<?php  endif; ?>

	<!-- FORM -->
	<form method="POST">
		<div class="<?= array_key_exists('login', $errors) ? 'error' : ''?>">
			<label for="login">Login :
				<input type="text" name="login">	
			</label>
		<br>
		</div>
		<div class="<?= array_key_exists('mail', $errors) ? 'error' : ''?>">	
			<label for="mail">Mail :
				<input type="text" name="mail">	
			</label>
		<br>
		</div>
		<div class="<?= array_key_exists('password', $errors) ? 'error' : ''?>">
			<label for="password">Password :
				<input type="password" name="password">
			</label>
		<br>
		</div>
		<div class="<?= array_key_exists('password', $errors) ? 'error' : ''?>">
			<label for="password_cfrm">Confirm password :
				<input type="password" name="password_cfrm">
			</label>
		<br>
		</div>
		<input type="submit" value="Envoyer">
	</form>	
</body>
</html>