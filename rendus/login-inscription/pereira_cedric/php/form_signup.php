<?php 

if(isset($_POST['send'])) {
	global $pdo;
	$errors = array();
	// Verification of each field in the signup form
	if(empty($_POST['firstname']))
		$errors['firstname'] = 'Le champs prénom est vide';
	else if(strlen($_POST['firstname']) < 2)
		$errors['firstname'] = 'Prénom trop court';

	if(empty($_POST['lastname']))
		$errors['lastname'] = 'Le champs nom est vide';
	else if(strlen($_POST['lastname']) < 2)
		$errors['lastname'] = 'Nom trop court';

	if(empty($_POST['email']))
		$errors['email'] = 'Le champs email est vide';
	else if(!regexpValidation($_POST['email']))
		$errors['email'] = 'Cet email ne semble pas valide';

	if(empty($_POST['password']))
		$errors['password'] = 'Aucun mot de passe défini';
	// Password verification > Minimum 8 characters with minimum 1 uppercase character & 1 number
	else if(strlen($_POST['password']) < 8 || !preg_match('/[A-Za-z]/', $_POST['password']) || !preg_match('/[0-9]/', $_POST['password']))
		$errors['password'] = 'Votre mot de passe n\'est pas assez complexe';

	// Verification of password and confirmpassword are the same
	if($_POST['password'] != $_POST ['confirmpassword'])
		$errors['confirmpassword'] = 'Les deux mot de passe ne correspondent pas';

	if(empty($_POST['confirmpassword']))
		$errors['confirmpassword'] = 'Veuillez confirmer le mot de passe';

	// If the postal code field is not empty, verification of the content > 5 characters exactly and only numbers
	if(!empty($_POST['postalcode'])) {
		if(strlen($_POST['postalcode']) !=5 || !preg_match('/^[1-9][0-9]{0,15}$/', $_POST['postalcode'])) {
			$errors['postalcode'] = 'Code postal invalide';
		}
	}

	if(empty($_POST['gender']))
		$errors['gender'] = 'Le genre est manquant';
	elseif (!in_array($_POST['gender'], array('homme','femme')))
		$errors['gender'] = 'Genre inéxistant';

	if(!isset($_POST['terms']))
		$errors['terms'] = 'Il faut accepter les CGU';
	
	// Request to Google server for Captcha validation
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, 'secret=6Lf4DQMTAAAAALG6uJwiQiTVLVC0oV6I68-4_TjG&response='.$_POST['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR'].'');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$server_output = json_decode(curl_exec($ch));
	curl_close ($ch);
	
	// Error with captcha
	if($server_output->success != 1)
		$errors['captcha'] = 'Le captcha est eronné...';
	
	// Checking the database to see if a user have already the same email
	$prepare = $pdo->prepare('SELECT COUNT(*) AS nbr FROM users WHERE email = :email');
	$prepare->bindValue(':email', $_POST['email']);
	$prepare->execute();
	$data = $prepare->fetch();
	
	// A user used saved in the database used the same email > error
	if($data->nbr != 0)
		$errors['email'] = 'Un utilisateur utilise déjà cette adresse email';
	
	// Any error > account creation
	if(count($errors) == 0) {
		// Generate token to validate the account by mail
		$confirmationcode = sha1(uniqid());
		
		$prepare = $pdo->prepare('INSERT INTO `users`(`firstname`, `lastname`, `email`, `pwd`, `confirmationcode`, `birthdate`, `postalcode`, `country`, `gender`) VALUES (:firstname, :lastname, :email, :pwd, :confirmationcode, :birthdate, :postalcode, :country, :gender)');
		$prepare->bindValue(':firstname', $_POST['firstname']);
		$prepare->bindValue(':lastname', $_POST['lastname']);
		$prepare->bindValue(':email', $_POST['email']);
		$prepare->bindValue(':pwd', hash('sha512', $_POST['password'].SALT));
		$prepare->bindValue(':confirmationcode', $confirmationcode);
		$prepare->bindValue(':birthdate', preg_replace('&([0-9]{2})/([0-9]{2})/([0-9]{4})&', '$3-$2-$1', $_POST['birthday']));
		$prepare->bindValue(':postalcode', $_POST['postalcode']);
		$prepare->bindValue(':country', $_POST['city']);
		$prepare->bindValue(':gender', $_POST['gender']);
		
		$exec = $prepare->execute();
		
		
		// Sending the confirmation email
		$mail = new PHPMailer();
		$mail->SMTPDebug = 0;
		$mail->IsSMTP();
		$mail->SMTPAuth   = true;
		$mail->Host       = 'ns0.ovh.net';
		$mail->Port       = 587;
		$mail->Username   = 'dev@cedricpereira.com';
		$mail->Password   = 'devhetic';
		$mail->Subject    = 'Validation par mail';
		$mail->SetFrom('dev@cedricpereira.com');
		$mail->MsgHTML('Merci de valider votre compte : <br/> http://'.$_SERVER['SERVER_NAME'].':8888/PEREIRA_Cedric_Rendu_PHP/www/validation.php?key='.$confirmationcode.'');
		$mail->AddAddress($_POST['email']);
		$mail->Send();

		$good = true;
	}
}

// Function to check if it's really an email inside the email field
function regexpValidation($email) {
	if (preg_match("/^([-_a-z0-9+.])+\@([-a-z0-9]+\.)+([a-z]){2,}$/i", $email))
		return true;
	else
		return false;
}