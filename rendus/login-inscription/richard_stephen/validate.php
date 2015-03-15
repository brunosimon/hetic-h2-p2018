<?php 
	require 'config.php';

	// Need pseudo & key
	$pseudo = $_GET['log'];
	$key = $_GET['key'];
	 
	// Get the corresponding key
	$stmt = $pdo->query("SELECT * FROM member WHERE pseudo like '$pseudo' ");
	$row = $stmt->fetch();
	if(!empty($row)){
		$bddkey = $row->cle;
		$active = $row->actif;
		$id_member 		 = $row->id_membre;
		$pseudo_member   = $row->pseudo;
		$email_member	 = $row->mail;
		$age_member 	 = $row->age;
		$phone_member	 = $row->phone;
		$password_member = $row->password;
	}
	// if()
	//   {
	//     $bddkey = $row['cle'];	// Récupération de la clé
	//     $active = $row['actif']; // $actif contiendra alors 0 ou 1
	//   }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Validation inscription</title>
		<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/index.css">
	</head>
	<body>
		<div class="left">
			<h1>Félicitation votre compte a été activé, bienvenue !</h1>
			<!-- <img src="img/all_logo1.png" alt="test"> -->
		</div>
		<div class="right">
			<?php 
			// On teste la valeur de la variable $actif récupéré dans la BDD
			if($active == '1') // Si le compte est déjà actif on prévient
			  {
			     echo '<p class="alreadyactive">Votre compte est déjà actif vous pouvez vous connecter!</p>';
			     echo '<a href="index.php" class="connect">Se connecter</a>';
			  }else {
			     if($key == $bddkey) // On compare nos deux clés	
			       {
		         	 	// Si elles correspondent on active le compte !	
			         	 // echo "Votre compte a bien été activé !";
			 
			         	 // La requête qui va passer notre champ actif de 0 à 1
			        	  $stmt = $pdo->prepare("UPDATE member SET actif = 1 WHERE pseudo like :pseudo ");
			         	 $stmt->bindParam(':pseudo', $pseudo);
			         	 $stmt->execute();

			         	$_SESSION['id']     = $id_member;
						$_SESSION['pseudo'] = $pseudo_member;
						$_SESSION['email'] = $email_member;
						$_SESSION['age'] = $age_member;
						$_SESSION['phone'] = $phone_member;
						$_SESSION['password'] = $password_member;

						// Send confirm email
						$to = $email_member;
						$subject = "Compte activé avec succès." ;
						$headers = "From: stephen.richard@hetic.net" ;
						 
						// Active link contain pseudo and key
						$message = 'Bienvenue sur Mon super site,
						 
						Votre compe a bien été activé. Vous pouvez dès à présent vous connecter à l\'adresse : 
						http://stephenrichard.fr/lab/DevoirLoginPhp
						 
						---------------
						Ceci est un mail automatique, Merci de ne pas y répondre.';

						// Send mail
						$send = mail($to, $subject, $message, $headers);
						if(!$send)
						{
						  echo "Une erreur s'est produite lors de l'envoi du mail.";
						}

						header('Location: member.php');
			       }
			  }
		   ?>
		</div>
		
	</body>
</html>