<?php  
	// Put erros in an array
	function get_errors($data){
		$result = array();

		// Set variables
		$password = trim($data['password']);
		$confirm_password = trim($data['confirm_password']);

		$regex_email = "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^";
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);

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

	// Check if the form isn't empty
	if(!empty($_POST)){
		// Get the erros
		$errors = get_errors($_POST);

		// If there's no error
		if(empty($errors)){
			$success[] = 'Votre mot de passe a bien été modifié. Vous pouvez à présent vous connecter à votre espace membre.';
			$password = trim($_POST['password']);
			$hashed_password = hash('sha256',SALT.$_POST['password']);
			$key = $_GET['key'];
			$id = $_GET['id'];

			$query = $pdo->query("UPDATE member SET password = '$hashed_password' WHERE id = '$id' AND forgot_key = '$key'");
			if($query){
				$query_delete = $pdo->query("UPDATE member SET forgot_key = '' WHERE password = '$hashed_password'");
			}else{
				$errors[] = 'Une erreur s\'est produite, merci de réeaasyer la manipulation plus tard';
			}

			// Success
			$_POST['password']    = '';
			$_POST['confirm_password']    = '';
		}
	}else{
		$_POST['password']    = '';
		$_POST['confirm_password']    = '';
	}









