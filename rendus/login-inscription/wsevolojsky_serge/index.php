<?php 
	
	require 'inc/config.php';

	//Show errors
	// error_reporting(E_ALL); 
	// ini_set("display_errors", 1);

	// sir le cookie exist et que la session est active redirige directement vers la page privée
	if(isset($_COOKIE['user_id']) && $_SESSION['connected'] == true)
	{
		header('Location: public/acceuil.php');
		exit();
	}

	if(!empty($_POST)){

		$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail OR pseudo = :pseudo');

		$prepare->bindValue(':mail',$_POST['identifiant']);
		$prepare->bindValue(':pseudo',$_POST['identifiant']);

		$prepare->execute();
		$user = $prepare->fetch();

		if(!$user)
		{
			$error = "user not found";		
		}
		else
		{
			// on definis un suffixe et prefixe dynamiquement afin de faire
			// un hashage du mot de passe propre a l'utilisateur
			define('PREFIXE',$user->pseudo);
			define('SUFFIXE',$user->mail);

			if($user->password == hash('sha512',sha1(PREFIXE).$_POST['password'].sha1(SUFFIXE)))
			{
				$_SESSION['name'] = $_POST['identifiant'];
				$_SESSION['connected'] = true;

				if(isset($_POST['remember'])){
					// créé le cookie afion de se souvenir de la personne
					setcookie('user_id', $user->password,time() + 3600,'/','localhost',false,true);
				}
				// une fois verifié on le redirige vers sa page privée
				header('Location: public/acceuil.php');
			}
			else
			{
				$error = 'try again';
			}
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400' rel='stylesheet' type='text/css'>
		
		<title>Acceuil</title>
	</head>
	<body>
		<div class="login-wrap">
			<form method="post" action="">
					<?php if(!empty($error)) {?> 
					<p class="error">
						<?php echo 'User nor found' ?> 
					</p>
				<?php } ?>
				<input type="text" placeholder="Mail or nickname" name="identifiant">
				<input type="password" placeholder="Password" name="password">
				<input type="checkbox" id="remember" name="remember"> <label for="remember">Remember me</label>
				<input type="submit" value="valider">
				
			</form>
			<p class="text">Don't have an account ?</p>
			<a href="sign_up.php"><button>Sign up</button></a>
		</div>
	</body>
</html>