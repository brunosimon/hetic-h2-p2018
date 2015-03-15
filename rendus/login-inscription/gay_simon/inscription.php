<?php 

	/* différents points à dévelloper : 
		--> Gestion des erreurs du formulaire [√]
		-->	Demander deux fois le mot de passe à l'inscription et tester que les deux soient égaux [√]
		-->	Tester la complexité du mot de passe [√]
		-->	Tester si le mail n'a pas déjà été enregistré dans la BDD [√]
		-->	Plus de champs à l'inscription [√]
		-->	Envoyer un mail de confirmation d'inscription [V]
		-->	Envoyer un mail contenant un lien permettant de confirmer l'inscription [√]
		-->	Bouton de déconnexion sur la page privée [√]
		-->	Système "Mot de passe oublié" [/√]
		-->	Système "Se souvenir de moi" [√]
		-->	Captcha [√]
		-->	Limiter le nombre de tentatives [x]
		-->	Mots de passe sécurisés (hash et salt minimum) [√]
	*/ 
	session_start();
	require 'inc/config.php';
	if(!empty($_POST))
	{	
		/*-------------------> tester si les mails sont identiques et si le format est le bon <------------------------------*/
		$req  = $pdo->prepare('SELECT COUNT(*) AS nbr_mail FROM users WHERE mail = :mail'); // Utilisation de COUNT pour compter le nombre de collones avec le meme mail. 
		$req->execute(array('mail' => $_POST['mail']));
		$data = $req->fetch(); // fetch nous ressort les collones avec les memes

    	if ($data->nbr_mail > 0)
    	{
        	echo "existe déjà";
        	echo '<pre>';
   		}
    	else
    	{	
    		if(filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL))
    		{	
		        	echo"données email valides";
		        	echo '<pre>';

		        	if(is_numeric($_POST['tel_number']))
		        	{ 	
		        		/*-------------------> tester si les numéros de téléphones sont identiques <------------------------------*/
		        		$req  = $pdo->prepare('SELECT COUNT(*) AS nbr_phone FROM users WHERE telnumber = :telnumber'); // Utilisation de COUNT pour compter le nombre de collones avec le meme mail. 
						$req->execute(array('telnumber' => $_POST['tel_number']));
						$data = $req->fetch(); // fetch nours ressort les collones avec les memes

			        	if ($data->nbr_phone > 0)
			    		{
			        		echo "le numéro existe déjà";
			        		echo '<pre>';
			   			}
			    		else 
			    		{
			        		echo"le numéros n'existe pas";
			        		echo '<pre>';
			        		
							/*-------------------> tester si les mots de passes sont identiques <------------------------------*/
							if($_POST['password'] != $_POST['verif_password'])
							{ 
								echo 'les mot de passe ne correspondent pas'; 
								echo '<pre>';
							} 
							else
							{	
								if($_POST['captcha']) 
								{
									if($_POST['captcha'] == $_SESSION['captcha'])
									{
										echo "code captcha correct";
										echo '<pre>';		
										echo '<pre>';
										echo'les mots de passes correspondent';
										echo '<pre>';
										/*-------------------> indice de fiabilité <------------------------------*/
										fiab (); 

										/*-------------------> Inserer les quatre champs rentrés par l'utilisateur dans la DB  après les différentes vérifications <------------------------------*/
										$hash = hash('sha256',uniqid(rand(), true)); // uniquid nous donne une ID unique en fonction du temps en M S + Rand la rend random. 								

										$prepare=$pdo->prepare('INSERT INTO users(mail,password,telnumber,hash) VALUES (:mail,:password,:telnumber,:hash)'); //remplace par les valeurs
										$prepare->bindValue(':mail',$_POST['mail']);
										$prepare->bindValue(':password',hash('sha256',SALT.$_POST['password']));
										$prepare->bindValue(':telnumber',hash('sha256',SALT.$_POST['tel_number']));
										$prepare->bindValue(':hash',$hash);

										$prepare->execute();

										/*------------------->envoie du mail <------------------------------*/
										$to = $_POST['mail'];
										$subject = "Activer votre compte" ;
		 
										// Le lien d'activation est composé du login(log) et de la clé(cle)
										$message = 'Bienvenue sur VotreSite,
		 
										Pour activer votre compte, copier/coller dans votre navigateur internet\r\n .
										 
										http://votresite.com/activation.php?log='.urlencode($_POST['mail']).'&cle='.urlencode($hash).'\r\n .
										 
										 
										---------------
										Ceci est un mail automatique, Merci de ne pas y répondre.\r\n';

										$headers = "From: inscription@formulaire.com";
										$hearders = 'priority:urgent';

										if(mail($to,$subject,$message,$headers)) 
										{
											echo 'mail envoyé';
										}
										else 
										{
											echo 'mail non envoyé';
										}
								 	}
								 	else
								 	{
								 		echo "code captcha incorrect";
								 	}
								}
								else
								{
									echo "données invalides";
								}
							} 
						} 
					}
					else 
					{
						echo "Ce n'est pas un numéros";
					}
			}
			else
			{
				echo "données email non valides";
			}	

    	}
	} 


/*-------------------> FONCTIONS <------------------------------*/
/*-------------------> indice de fiabilité <------------------------------*/
	function fiab () 
	{ 
		$point 		  = 0;
		$letter 	  = 0;
		$final		  = 0;
											
		$lenght = strlen($_POST['password']); // strlen == propriété php pour récuperer la longeur d'une string
		for($i = 0; $i < $lenght; $i++){
			$letter = $_POST['password'][$i];

			if($letter >= 'a' && $letter<='z') {
				$point = $point + 2; // le compteur de fiabilité
			}
			else if ($letter >= 'A' && $letter <= 'Z') {
				$point = $point + 4; 
			}
			else if ($letter >= '0' && $letter <= '9') {
				$point = $point + 6; 
				}
				else {
				$point = $point + 10; 
				}

				// Calcul du coefficient points/longueur
				$etape1 = $point / $lenght;
								 
				// Multiplication du résultat par la longueur de la chaîne
				$final = $etape1 * $lenght;
				}
										
				if($final >=0 && $final <=10)
				{
					echo "test de fiabilité : mauvais";
					echo '<pre>';
				}
				if($final >=11 && $final <=25)
				{
					echo "test de fiabilité : moyen";
					echo '<pre>';
				}
				if($final >=26 && $final <=100)
				{
					echo "test de fiabilité : bon";
					echo '<pre>';
				}

	}

echo '<a href="login.php"> login </a>';
echo '<pre>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<title> Inscription</title>
<body>	
	<h1> Inscription </h1>
	<form action="#" method="POST">
		<input type="text" name="mail"> <label>email</label>
		<br>
		<input type="text" name="tel_number"/> <label>Phone number</label>
		<br>
		<input type="password" name="password"> <label>Password</label>
		<br>
		<input type="password" name="verif_password"> <label>Retaper votre mot de passe</label>
		<br>
		<h2> Recopiez ce chiffre </h2>
		<img src="captcha.php"> 
		<br>
		<input type="text" name="captcha" style="width:70px;"> 
		<br>
		<input type="submit">
	</form>
</body>
</html>

