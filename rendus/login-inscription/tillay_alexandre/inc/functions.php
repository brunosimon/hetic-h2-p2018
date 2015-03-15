<?php 

require 'config.php';

// Login function
if(isset($_GET["login"])) {

	if( isset($_POST["user"]) && isset($_POST["password"]) ) {
			
		$prepare = $pdo->prepare('SELECT * FROM users WHERE mail=:user OR username=:user LIMIT 1');
		$prepare->bindValue(':user', $_POST["user"]);
		$prepare->execute();

		$user = $prepare->fetch();

		if(!$user) {		
			echo 'Identifiants incorrects';
			die();			
		}

		else {
			if($user->password == hash('sha256', SALT.$_POST["password"])) {
				session_start();
				$_SESSION['login'] = $user->username;
				echo 'true';
				die();
			}
			else {
				echo 'Identifiants incorrects';
				die();
			}
		}
	}

	else {
		header('Location: ../index');
	}

}


// Register function
else if(isset($_GET["register"])) {

	if( isset($_POST["username"]) && isset($_POST["mail"]) && isset($_POST["password"]) && isset($_POST["passwordConfirm"]) ) {
		
		if($_POST["username"]!="" && $_POST["mail"]!="" && $_POST["password"]!="" && $_POST["passwordConfirm"]!="") {

			// Vérification taille pseudo
			if(strlen($_POST["username"])<8) { 
				echo 'Le pseudo doit contenir au minimum 8 caractères';
				die();
			}

			// Vérification de l'email
			if(!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) { 
				echo 'L\'adresse mail n\'est pas valide';
				die();
			}

			// Vérification taille mot de passe
			if(strlen($_POST["password"])<8) { 
				echo 'Le mot de passe doit contenir au minimum 8 caractères';
				die();
			}

			// Vérification correspondance mot de passe
			if($_POST["password"]!=$_POST["passwordConfirm"]){
				echo 'Les deux mots de passe ne correspondent pas';
				die();
			}

			// Vérification utilisation pseudo
			$prepare = $pdo->prepare('SELECT * FROM users WHERE username=:username LIMIT 1');
			$prepare->bindValue(':username', $_POST["username"]);
			$prepare->execute();
			$user = $prepare->fetch();
			if($user){
				echo 'Ce pseudo est déjà utilisé';
				die();
			}

			// Vérification utilisation adresse mail
			$prepare = $pdo->prepare('SELECT * FROM users WHERE mail=:mail LIMIT 1');
			$prepare->bindValue(':mail', $_POST["mail"]);
			$prepare->execute();
			$user = $prepare->fetch();
			if($user){
				echo 'Cette adresse mail est déjà utilisée';
				die();
			}

		

			$prepare = $pdo->prepare('INSERT INTO users (username, mail, password) VALUES (:username, :mail, :password)');
			$prepare->bindValue(':username', $_POST["username"]);
			$prepare->bindValue(':mail', $_POST["mail"]);
			$prepare->bindValue(':password', hash('sha256', SALT.$_POST["password"]));
			$prepare->execute();

			session_start();
			$_SESSION['login'] = $_POST["username"];

			echo 'true';
		}
		else {
			echo 'Au moins un des champs est vide';
			die();
		}	
	}
	else {
		header('Location: ../index');
	}
}


// Reset password
else if(isset($_GET["resetPassword"])) {

	if(isset($_POST['mail'])) {

		$prepare = $pdo->prepare('SELECT * FROM users WHERE mail=:mail LIMIT 1');
		$prepare->bindValue(':mail', $_POST["mail"]);
		$prepare->execute();
		$mailExist = $prepare->fetch();

		if($mailExist){
			
			$token = md5(microtime().rand());

			$prepare = $pdo->prepare('UPDATE users SET token=:token  WHERE mail=:mail');
			$prepare->bindValue(':mail', $_POST['mail']);
			$prepare->bindValue(':token', $token);
			$prepare->execute();

			$resetLink = 'http://'.$_SERVER['HTTP_HOST'].substr(dirname($_SERVER['PHP_SELF']), 0, -4).'/reset.php?mail='.$_POST['mail'].'&token='.$token;
			$mailBody = 'Pour réinitialiser votre mot de passe, cliquez sur le lien ci-dessous:<br /> <a href="'.$resetLink.'">Réinitialiser mon mot de passe</a> .';
			if(!mail($_POST['mail'], 'Réinitialiser votre mot de passe', $mailBody, 'Content-Type: text/html; charset=ISO-8859-1\r\n')) {
				echo 'Echec de l\'envoi du mail';
			}
			else {
				echo 'true';
			}
		}
		else {
			echo 'Cette adresse mail n\'existe pas';
			die();
		}			

	}

}

// Set new password
else if(isset($_GET["setNewPassword"])) {
	
	if(isset($_POST["mail"]) && isset($_POST["token"]) &&  isset($_POST["newPassword"]) && isset($_POST["newPasswordConfirm"]) ) {
		
		if( $_POST["mail"]!="" && $_POST["token"]!="" && $_POST["newPassword"]!="" && $_POST["newPasswordConfirm"]!="" ) {
			
			// Vérification taille mot de passe
			if(strlen($_POST["newPassword"])<8) { 
				echo 'Le mot de passe doit contenir au minimum 8 caractères';
				die();
			}
			
			if($_POST["newPassword"]==$_POST["newPasswordConfirm"]) {

				$prepare = $pdo->prepare('SELECT * FROM users WHERE mail=:mail AND token=:token LIMIT 1');
				$prepare->bindValue(':mail', $_POST["mail"]);
				$prepare->bindValue(':token', $_POST["token"]);
				$prepare->execute();
				$mailTokenExist = $prepare->fetch();

				if($mailTokenExist) {
					$prepare = $pdo->prepare('UPDATE users SET password=:password, token=NULL WHERE mail=:mail AND token=:token');
					$prepare->bindValue(':password', hash('sha256', SALT.$_POST["newPassword"]));
					$prepare->bindValue(':token', $_POST["token"]);
					$prepare->bindValue(':mail', $_POST["mail"]);
					$prepare->execute();

					echo "true";
				}
				else {
					echo 'L\'email et le jeton d\'accès ne correspondent pas';
				}				
			}	
			else {
				echo 'Les deux mots de passe ne sont pas identiques';
			}
		}
		else {
			echo 'Au moins un des champs est vide';
		}
	}
	else {
		header('Location: ../index');
	}
}

else {
	header('Location: ../index');
}

	


                    