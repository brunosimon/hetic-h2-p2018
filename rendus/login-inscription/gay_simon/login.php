<?php 
	session_start(); //Démarrage de la session avant le require 
	require 'inc/config.php';

	if(!empty($_POST))
	{

		echo '<pre>';
		print_r($_POST);
		echo '</pre>';

		$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1'); //on vérifie que le mail fait partie de la bdd
		$prepare ->bindValue(':mail',$_POST['mail']);
		$prepare->execute();

		$user = $prepare->fetch(); // on stocke toutes les données dans user

		if(!$user)
		{
			echo 'Vous n avez rien rentré';
			echo '</pre>';
		}
		else
		{ 
			if($user->password == hash('sha256',SALT.$_POST['password'])) //on vérifie si le mot de passe associé à l'email est le bon dans la BDD
				{ 	
					if($user->activate == '1') // Si activate est égal à 1, on autorise la connexion 
 					{
	 					// tout à été vérifier, cela existe bien dans la db et le mail a été validé 
						echo 'You shall pass';

						// on enregistre tout cela dans une session pour la connexion ultérieur 

						$_SESSION['mail']        = $_POST['mail'];
						$_SESSION['password']    = $_POST['password'];
						echo '<pre>';
						print_r($_SESSION);
						echo '</pre>';
 					}
					else // Sinon la connexion est refusé...
 				    {
  						echo "Vous n'avez pas encore activer votre compte";
  						echo "<pre>";
  					}
				}
			else
				{ 
					echo 'You shall not pass';
					echo "<pre>";
				}
		}

	}

echo '</pre>';
echo '<a href="member.php">Page membre</a>';
echo '<pre>';
echo '<a href="inscription.php">Page inscription</a>';
echo '<pre>';
echo '<a href="forgpassword.php">Mot de passe oublié ? </a>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<title> Login</title>
<body>	
	<h1> Login </h1>
	<form action="#" method="POST">
		<input type="text" name="mail"> <label>email</label>
		<br>
		<input type="password" name="password"> <label>Password</label>
		<br>
		<input type="submit">
	</form>
</body>
</html>

