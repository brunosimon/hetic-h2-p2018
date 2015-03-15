<?php  
	// Put erros in an array
	function get_errors($data){
		$result = array();

		// Set variables
		$pseudo   = htmlspecialchars(trim($data['pseudo']));
		$email = htmlspecialchars(trim($data['email']));
		$age = htmlspecialchars(trim($data['age']));
		$phone = htmlspecialchars(trim($data['phone']));
		$password = trim($data['password']);
		$confirm_password = trim($data['confirm_password']);

		$regex_email = "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^";
		$regex_phone = "^[0-9]{10}$^";
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);

		// Testing pseudo
		if(empty($pseudo)){
			$result['pseudo'] = 'Veuillez renseignez un pseudo';
		}else if(strlen($pseudo) < 2){
			$result['pseudo'] = 'Votre pseudo doit comporter au moins 2 caractères';
		}

		// Testing email
		if(empty($email)){
			$result['email'] = 'Veuillez renseignez une adresse email';
		}else if (!preg_match($regex_email,$email)) {
		    $result['email'] = 'Email invalide';
		}

		// Testing age
		if(empty($age)){
			$result['age'] = 'Veuillez renseigner votre age';
		}else if($age < 0 || $age > 150){
			$result['age'] = 'Age invalide';
		}

		// Testing phone
		if(empty($phone)){
			$result['phone'] = 'Veuillez renseigner un numéro de téléphone';
		}
		// else if(!preg_match($regex_phone, $phone)){
		// 	$result['phone'] = 'Numéro invalide';
		// }

		// Testing password
		if(empty($password)){
			$result['password'] = 'Veuillez renseigner un mot de passe';
		}else if(!$uppercase || !$lowercase || !$number || strlen($password) < 8){
			$result['password'] = 'Le mot de passe doit mesurer au moins 8 caractères et doit contenir une minuscule, une majuscule et un chiffre';
		}

		// Testing password confirmation
		if(empty($confirm_password)){
			$result['confirm_password'] = 'Veuillez confirmer le mot de passe';
		}else if($confirm_password != $password){
			$result['confirm_password'] = 'Les mots de passe doivent correspondre';
		}
		
		return $result;
	}

	$errors  = array();
	$success = array();
	$exists = array();

	// Check if the form isn't empty
	if(!empty($_POST)){
		// Get the erros
		$errors = get_errors($_POST);

		// Check if pseudo or email does exists
		// I woulnd't do it here but i have a problem with the $pdo scope
		// In get_errors() the pdo variable is unknow
		//
		$pseudo_check   = htmlspecialchars(trim($_POST['pseudo']));
		$email_check = htmlspecialchars(trim($_POST['email']));
		$query_pseudo = $pdo->query("SELECT * FROM member WHERE pseudo = '$pseudo_check' LIMIT 1");
		$fetch_pseudo = $query_pseudo->fetch();
		// Testing if email already exist
		$query_email = $pdo->query("SELECT * FROM member WHERE mail = '$email_check' LIMIT 1");
		$fetch_email = $query_email->fetch();
		if(!empty($fetch_email)){
			$exists['email'] = 'Un compte avec cet email existe déjà';
		}
		if(!empty($fetch_pseudo)){
			$exists['pseudo'] = 'Ce pseudo existe déjà';
		}

		// If there's no error
		if(empty($errors) && empty($exists)){
			$success[] = 'Nice ! Vous allez reçevoir un mail pour activer votre inscription d\'ici quelques instants';
			// Trim and escape characters, spaces...
			$pseudo   = htmlspecialchars(trim($_POST['pseudo']));
			$email = htmlspecialchars(trim($_POST['email']));
			$age = htmlspecialchars(trim($_POST['age']));
			$phone = htmlspecialchars(trim($_POST['phone']));
			$password = trim($_POST['password']);
			$confirm_password = trim($_POST['confirm_password']);
			$hashed_password = hash('sha256',SALT.$_POST['password']);
			$active = 0;

			// Create new member
			$new_member = $pdo->query("INSERT INTO member (pseudo, mail, age, phone, password, actif) VALUES ('$pseudo', '$email', '$age', '$phone','$hashed_password', '$active')");
			
			// Generate random key
			$key = md5(microtime(TRUE)*100000);

			// Insert key into the the table
			$stmt = $pdo->query("UPDATE member SET cle= '$key' WHERE pseudo = '$pseudo'");

			// Prepare mail informations
			$to = $email;
			$subject = "Activer votre compte" ;
			$headers = "From: stephen.richard@hetic.net" ;
			 
			// Active link contain pseudo and key
			$message = 'Bienvenue sur VotreSite,
			 
			Votre compte a bien été créé, pour l\'activer , veuillez cliquer sur le lien ci dessous
			ou copier/coller dans votre navigateur internet.
			 
			http://stephenrichard.fr/lab/DevoirLoginPhp/validate.php?log='.urlencode($pseudo).'&key='.urlencode($key).'
			 
			 
			---------------
			Ceci est un mail automatique, Merci de ne pas y répondre.';

			// Send mail
			$send = mail($to, $subject, $message, $headers);
			if(!$send)
			{
			  echo "Une erreur s'est produite lors de l'envoi du mail.";
			}

			// Success
			$_POST['pseudo']   = '';
			$_POST['email']    = '';
			$_POST['age']    = '';
			$_POST['phone']    = '';
			$_POST['password']    = '';
			$_POST['confirm_password']    = '';
		}
	}else{
		$_POST['pseudo']   = '';
		$_POST['email']    = '';
		$_POST['age']    = '';
		$_POST['phone']    = '';
		$_POST['password']    = '';
		$_POST['confirm_password']    = '';
	}









