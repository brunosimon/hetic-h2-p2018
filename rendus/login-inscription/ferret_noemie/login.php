<?php 
	



	// session_start();
	// $loginOK = false; 

	session_start();

		$_SESSION['login'] = ($_POST['login']);
        $_SESSION['password'] = ($_POST['password']);

        $login    	= $_POST['login'];
		$password 	= $_POST['password'];


	if(!empty($_POST))
	{ 	
		require_once('inc/config.php');
		$valid = true;
		

    	//si pseudo vide

	    if(empty($login)){

	    	$valid = false; 
	        $errorlogin = "Vous n'avez pas rempli le login";
	    }	
	    //si mot de passe vide
		if(empty($password)){

			$valid = false; 
	    	$errorpassword = "Vous n'avez pas remplit le  mot de passe";  
	    }
	    if($valid){
			$prepare = $pdo->prepare('SELECT * FROM users WHERE login = :login LIMIT 1');
			$prepare->bindValue(':login',$_POST['login']);

			$prepare->execute();
			
			$user = $prepare->fetch();

			// Si on trouve un utilisateur, alors cela veut dire qu'il est bien enregistré dans la base de donnée
			if(!$user)
			{
				
				header('Location: inscription.php'); // On renvoie vers  le formulaire d'inscription
	    		die();
			}
			else{ 

				if($user->password == hash('sha256',SALT.$_POST['password'])) //on vérifie si le mot de passe associé au login est le bon dans la BDD
					{ 
						if(isset($_POST['remember'])){ 
							$_SESSION['remember'] = ($_POST['login'] && $_POST['password']); // on enregistre les données de l'utilisateur en session lorsqu'il veut que le site se rappelle de lui 
							//lorsqu'il a cliqué sur le bouton "se souvenir de moi"
            				
            			}	
				   		header('Location: index.php'); // S'il n'a pas demandé, on envoie vers la page principal du site.
				   		die();
				   	}
				else
					{ 
						$error = "Ceci n'est pas le bon mot de passe";

					}
			}

		} 
	
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Enriqueta:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/reset.css">
<body>
	<div class="content">	
		<h1 class="login"> Login </h1>
			<form action="login.php" method="POST">
				<input type="text" name="login"> 
					<label> Login </label>
					<span class="error-message">
						<?php if(isset($errorlogin)) echo $errorlogin; ?>
					</span>
				<br>
				<input type="password" name="password"><label>Password</label>
					<span class="error-message">
						<?php if(isset($errorpassword)) echo $errorpassword; ?>
						<?php if(isset($error)) echo $error; ?>
					</span>
				<br>
				<input type="checkbox" name="remember"><label>Se souvenir de moi </label>
				<input type="submit" class="submit-2" value="Envoyer">
			</form>
	</div>
</body>
</html>

