<?php  

	// Put erros in an array
	function get_errors($data){
		$result = array();

		// Set variables
		$email = htmlspecialchars(trim($data['email']));
		$password = trim($data['password']);

		$regex_email = "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^";
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);

		// Testing email
		if(empty($email)){
			$result['email'] = 'Veuillez renseignez une adresse email';
		}else if (!preg_match($regex_email,$email)) {
		    $result['email'] = 'Email invalide';
		}

		// Testing password
		if(empty($password)){
			$result['password'] = 'Veuillez renseigner un mot de passe';
		}else if(!$uppercase || !$lowercase || !$number || strlen($password) < 8){
			$result['password'] = 'Le mot de passe doit mesurer au moins 8 caractères et doit contenir une minuscule, une majuscule et un chiffre';
		}
		
		return $result;
	}

	$errors  = array();
	$success = array();
	$exists  = array();

	// Check if the form isn't empty
	if(!empty($_POST)){
		// Get the erros
		$errors = get_errors($_POST);

		// If there's no error
		if(empty($errors)){
			// Trim and escape characters, spaces...
			$email = htmlspecialchars(trim($_POST['email']));
			$password = trim($_POST['password']);
			$hashed_password = hash('sha256',SALT.$_POST['password']);

			// Select the member
			$query = $pdo->query("SELECT * FROM member WHERE mail = '$email' AND password = '$hashed_password'");

			if(!empty($query)){
				$infos = $query->fetchAll();
			}else{
				$exists['member'] = "Ce compte n'existe pas, vous pouvez vous inscire.";
			}

			if(!empty($infos)){
				$id_member 		 = $infos[0]->id_membre;
				$pseudo_member   = $infos[0]->pseudo;
				$email_member	 = $infos[0]->mail;
				$age_member 	 = $infos[0]->age;
				$phone_member	 = $infos[0]->phone;
				$password_member = $infos[0]->password;
				$active 		 = $infos[0]->actif;

				if($active == '1'){
					// If login and password matches -> go to the member page
					if($email_member == $email && $password_member == $hashed_password){
						$_SESSION['id']     = $id_member;
						$_SESSION['pseudo'] = $pseudo_member;
						$_SESSION['email'] = $email_member;
						$_SESSION['age'] = $age_member;
						$_SESSION['phone'] = $phone_member;
						$_SESSION['password'] = $password_member;

						header('Location: member.php');
					}
				}else{
					echo 'Votre compte existe mais n\'est pas activé, veuillez consulter vos mails';
					header('Location: index.php');
				}

				
			}
			// Success
			$_POST['email']    = '';
			$_POST['password']    = '';
		}
	}else{
		$_POST['email']    = '';
		$_POST['password']    = '';
	}









