<?php 

	require 'inc/config.php';

	echo '<a href="inscription.php"> inscription</a>';
	echo '<pre>';

	if(!empty($_POST))
	{
			if(!empty($_POST))
			{

				$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1'); //on vérifie que le mail fait partie de la bdd
				$prepare ->bindValue(':mail',$_POST['mail']);
				$prepare->execute();

				$user = $prepare->fetch(); // on stocke toutes les données dans user

				if($user->mail == $_POST['mail'])
				{
					echo 'user found';
					echo '<pre>';

					if($user->telnumber == hash('sha256',SALT.$_POST['tel_number'])) //on vérifie si le numéros de téléphone associé à l'email est le bon dans la BDD
						{ 	
							$hash2 = hash('sha256',uniqid(rand(), true)); 
							/*------------------->envoie du mail<------------------------------*/
							$subject = "Activer votre compte" ;
 
							// Le lien d'activation est composé du login(log) et de la clé(cle)
							$message = 'Changement de mot de passe,\n
							Pour changer de mot de passe, remplissez le formulaire du lien.\n.
							http://localhost/password/verifpassword.php\n.
							---------------
							Ceci est un mail automatique, Merci de ne pas y répondre.\n';

							$headers = "From: password@formulaire.com".urlencode($_POST['mail']).'&cle='.urlencode($_POST['tel_number']).'\r\n' ;
							$hearders = 'priority:urgent';
								 	 
							if(mail($_POST['mail'], $subject, $message, $headers))  // Envoi du mail
							{ 
								// tout à été vérifier, cela existe bien dans la db 
								echo 'You shall pass';
								echo '<pre>';
								echo 'Un e-mail vous a été envoyé pour changer votre mot de passe';
								echo '<pre>';
							}
							else
							{
								echo "le mail ne s'envoie plus";
							}
						}
						else 
						{
							echo "mauvais numéro";
						}
				}
				else
				{ 
					echo "mauvaise adresse e-mail";
				}

			}
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<title> Login</title>
<body>	
	<h1> Login </h1>
	<form action="#" method="POST">
		<input type="text" name="mail"> <label> email </label>
		<br>
		<input type="text" name="tel_number"> <label>Phone number</label>
		<br>
		<input type="submit">
	</form>
</body>
</html>

