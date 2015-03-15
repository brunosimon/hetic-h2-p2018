<?php  

	// Put erros in an array
	function get_errors($data){
		$result = array();

		// Set variables
		$email = htmlspecialchars(trim($data['email']));
		$regex_email = "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^";

		// Testing email
		if(empty($email)){
			$result['email'] = 'Veuillez renseignez une adresse email';
		}else if (!preg_match($regex_email,$email)) {
		    $result['email'] = 'Email invalide';
		}
		return $result;
	}

	$errors  = array();
	$success = array();

	// Check if the form isn't empty
	if(!empty($_POST)){
		// Get the erros
		$errors = get_errors($_POST);

		// If there's no error
		if(empty($errors)){
			// Trim and escape characters, spaces...
			$email = htmlspecialchars(trim($_POST['email']));

			$query = $pdo->query("SELECT * FROM member WHERE mail = '$email'");
			if(!empty($query)){
				// Génération d'une clé aléatoire pour vérifier que l'utilisateur veuille faire la démarche du changement de pseudo.
				$forgot_key = $rand = substr(md5(microtime()),rand(0,26),20);
				$infos = $query->fetch();
				$id = $infos->id_membre;

				$update = $pdo->query("UPDATE member SET forgot_key= '$forgot_key' WHERE mail = '$email'");

				// Prepare mail informations
				$to = $email;
				$subject = "Récupérer votre mot de passe" ;
				$headers = "From: stephen.richard@hetic.net" ;
				 
				// Active link contain pseudo and key
				$message = 'Bienvenue sur Mon super site,
				 
				Vous avez souhaité récupérer votre mot de passe, pour celà, veuillez cliquer
				sur le lien suivant : http://stephenrichard.fr/lab/DevoirLoginPhp/newpassword.php?key='.urlencode($forgot_key).'&id='.urlencode($id).'
				 

				---------------
				Ceci est un mail automatique, Merci de ne pas y répondre.';

				// Send mail
				$send = mail($to, $subject, $message, $headers);
				die($message);
				if(!$send)
				{
				  echo "Une erreur s'est produite lors de l'envoi du mail.";
				}
			}else{
				echo "Aucun compte ne correspond avec cette adresse mail.";
			}

			

			
			// Success
			$_POST['email']    = '';
		}
	}else{
		$_POST['email']    = '';
	}









