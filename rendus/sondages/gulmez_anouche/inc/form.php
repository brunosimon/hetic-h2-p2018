<?php

// function if try qcm
function get_errors_qcm() {
	$result = array();
	// set error number and answers type number
	$nberr 				= 0;
	$triangle   		= 0;
	$diamond 			= 0;
	$star 				= 0;
	$circle 			= 0;
	$square 			= 0;
	// look for each question
	for($i = 1; $i <= 20; $i++) :
		// if the question as no answer
		if(!isset($_POST['question'.$i])) :
			$result['question'.$i] = 'Réponse n°'.$i.' absente';
			$nberr += 1;
		else :
			if($_POST['question'.$i] == "triangle")
				$triangle = $triangle + 1;
			else if($_POST['question'.$i] == "diamond")
				$diamond = $diamond + 1;
			else if($_POST['question'.$i] == "star")
				$star = $star + 1;
			else if($_POST['question'.$i] == "circle")
				$circle = $circle + 1;
			else if($_POST['question'.$i] == "square")
				$square = $square + 1;
		endif;
	endfor;

	// put values in result array
	$result['nberr'] 	 = $nberr;
	$result['triangle']  = $triangle;
	$result['diamond'] 	 = $diamond;
	$result['star'] 	 = $star;
	$result['circle'] 	 = $circle;
	$result['square'] 	 = $square;

	return $result;
}

// function that choose which character you are by selecting the max
function get_character($result) {
	$character = '';

	if(max($result['triangle'],$result['diamond'],$result['star'],$result['circle'],$result['square']) == $result['triangle'])
		$character ="bart";
	else if(max($result['triangle'],$result['diamond'],$result['star'],$result['circle'],$result['square']) == $result['diamond'])
		$character ="ned";
	else if(max($result['triangle'],$result['diamond'],$result['star'],$result['circle'],$result['square']) == $result['star'])
		$character ="lisa";
	else if(max($result['triangle'],$result['diamond'],$result['star'],$result['circle'],$result['square']) == $result['circle'])
		$character ="marge";
	else if(max($result['triangle'],$result['diamond'],$result['star'],$result['circle'],$result['square']) == $result['square'])
		$character ="homer";

	return $character;
}

// function if try to change password
function get_errors_change_pwd() {
	$result = array();

	//testing password
	if(isset($_POST['password']) && empty($_POST['password']))
		$result['password'] = 'Le champ est vide';
	else if(strlen($_POST['password']) <= 4)
		$result['password'] = 'Votre mot de passe doit faire plus de 4 caractères';

	//testing password_confirm
	if(isset($_POST['password_confirm']) && empty($_POST['password_confirm']))
		$result['password_confirm'] = 'Le champ est vide';
	else if($_POST['password_confirm'] != $_POST['password'])
		$result['password_confirm'] = 'Les deux mots de passe ne sont pas identiques';

	return $result;
}

// function if try to signup
function get_errors_signup() {
	$result = array();

	// testing pseudo
	if(isset($_POST['pseudo_signup']) && empty($_POST['pseudo_signup']))
		$result['pseudo_signup'] = 'Le champ est vide';

	//testing password
	if(isset($_POST['password_signup']) && empty($_POST['password_signup']))
		$result['password_signup'] = 'Le champ est vide';

	return $result;
}

// function if try to register
function get_errors_register() {
	$result = array();

	// testing pseudo
	if(isset($_POST['pseudo']) && empty($_POST['pseudo']))
		$result['pseudo'] = 'Le champ est vide';
	else if(strlen($_POST['pseudo']) <= 4)
		$result['pseudo'] = 'Votre pseudo doit faire au moins 4 caractères';

	//testing password
	if(isset($_POST['password']) && empty($_POST['password']))
		$result['password'] = 'Le champ est vide';
	else if(strlen($_POST['password']) <= 4)
		$result['password'] = 'Votre mot de passe doit faire plus de 4 caractères';

	//testing password_confirm
	if(isset($_POST['password_confirm']) && empty($_POST['password_confirm']))
		$result['password_confirm'] = 'Le champ est vide';
	else if($_POST['password_confirm'] != $_POST['password'])
		$result['password_confirm'] = 'Les deux mots de passe ne sont pas identiques';

	//testing email
	if(isset($_POST['email']) && empty($_POST['email']))
		$result['email'] = 'Le champ est vide';
	else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		$result['email'] = 'Votre email est invalide';

	//testing email_confirm
	if(isset($_POST['email_confirm']) && empty($_POST['email_confirm']))
		$result['email_confirm'] = 'Le champ est vide';
	else if($_POST['email'] != $_POST['email_confirm'])
		$result['email_confirm'] = 'Les deux email ne sont pas identiques';

	return $result;
}

$errors = array();
$answers = array();
$success = array();

// if try to register
if(isset($_POST['register']) && ($_POST['register'] == "Register")) {
	// recup data from function
	$errors = get_errors_register();
	// if no errors then save data
	if(empty($errors)) {
		$prepare = $pdo->prepare('INSERT INTO users (pseudo,email,password,date_signin) VALUES (:pseudo,:email,:password,:date_signin)');
		$prepare->bindValue(':pseudo',$_POST['pseudo']);
		$prepare->bindValue(':email',$_POST['email']);
		$prepare->bindValue(':password', hash('sha256', SALT.$_POST['password']));
		$prepare->bindValue(':date_signin', date('Y-m-d H:i:s'));
		// if save done
		if($prepare->execute()) {
			// Display success notification
			$success['title']   = 'Inscription terminée';
			$success['success'] = 'Votre inscription a bien été prise en compte, vous pouvez dès à présent vous connecter.';
			// format inputs
			$_POST['pseudo_signup'] 	= $_POST['pseudo'];
			$_POST['pseudo'] 			= '';
			$_POST['password'] 			= '';
			$_POST['password_confirm'] 	= '';
			$_POST['email'] 			= '';
			$_POST['email_confirm'] 	= '';
		}
		else {
			// display error notification
			$success['title'] 	= 'Erreur';
			$success['success'] = 'Une erreur est survenue. Inscription impossible.';
			}
	}
}
else {
	$_POST['pseudo'] 			= '';
	$_POST['password'] 			= '';
	$_POST['password_confirm'] 	= '';
	$_POST['email'] 			= '';
	$_POST['email_confirm'] 	= '';
}

// If user try to change his password
if(isset($_POST['change']) && ($_POST['change'] == "Change")) {
	$errors = get_errors_change_pwd();

	$prepare = $pdo->prepare('SELECT * FROM users WHERE pseudo LIKE BINARY :pseudo');
	$prepare->bindValue(':pseudo',$_SESSION['pseudo']);
	$prepare->execute();

	$user = $prepare->fetch();

	if($user->password == hash('sha256', SALT.$_POST['password']))
		$errors['password'] = 'Vous avez déjà ce mot de passe';

	if(empty($errors)) {
		$prepare = $pdo->prepare('UPDATE users SET password = :password WHERE pseudo LIKE BINARY :pseudo');
		$prepare->bindValue(':password', hash('sha256', SALT.$_POST['password']));
		$prepare->bindValue(':pseudo',$_SESSION['pseudo']);
		if($prepare->execute()) {
			header('Location: logout');
			exit;
		}
		else {
			// display error notification
			$success['title'] 	= 'Erreur';
			$success['success'] = 'Une erreur est survenue. Impossible de modifier votre mot de passe pour le moment.';
		}
	}
}

// If user try to signup
if(isset($_POST['signup']) && ($_POST['signup'] == "Sign Up")) {
	$errors = get_errors_signup();

	if(empty($errors)) {
		$prepare = $pdo->prepare('SELECT * FROM users WHERE pseudo LIKE BINARY :pseudo LIMIT 1');
		$prepare->bindValue(':pseudo',$_POST['pseudo_signup']);
		if($prepare->execute()) {
			$user = $prepare->fetch();

			if(!$user)
				$errors['pseudo_signup'] = 'Pseudo introuvable';
			else {
				if($user->password == hash('sha256', SALT.$_POST['password_signup'])) {
					// if no existing session, we start one
					if(!isset($_SESSION)) {
						session_start();
					}
					$_SESSION['pseudo'] = $_POST['pseudo_signup'];
					// update last_signup and redirect
					$last_signup = $pdo->prepare('UPDATE users SET last_signup = "'.date('Y-m-d H:i:s').'" WHERE pseudo = "'.$_SESSION['pseudo'].'"');
					$last_signup->execute();
					header('Location: admin');
					exit;
				}
				else
					$errors['password_signup'] = 'Votre mot de passe est incorrect';
			}
		}
		else {
			// display error notification
			$success['title'] 	= 'Erreur';
			$success['success'] = 'Une erreur est survenue. Merci de réessayer ultérieurement.';
		}
	}
}

// if validate qcm
if(isset($_POST['envoyer']) && ($_POST['envoyer'] == "Envoyer")) :
	$prepare = $pdo->prepare('SELECT * FROM users WHERE pseudo LIKE BINARY :pseudo');
	$prepare->bindValue(':pseudo', $_SESSION['pseudo']);
	$prepare->execute();
	$info = $prepare->fetch();

	$errors = get_errors_qcm();

	if($errors['nberr']  == 0) :
		$perso = get_character($errors);
		$prepare = $pdo->prepare('INSERT INTO results (id_user, triangle, diamond, star, round, square, perso, date, hour) VALUES (:id_user, :triangle, :diamond, :star, :round, :square, :character, :date, :hour)');
		$prepare->bindValue(':id_user', $info->id);
		$prepare->bindValue(':triangle',$errors['triangle']);
		$prepare->bindValue(':diamond',$errors['diamond']);
		$prepare->bindValue(':star',$errors['star']);
		$prepare->bindValue(':round',$errors['circle']);
		$prepare->bindValue(':square',$errors['square']);
		$prepare->bindValue(':character',$perso);
		$prepare->bindValue(':date',date('Y-m-d'));
		$prepare->bindValue(':hour',date('H:i:s'));

		if($prepare->execute()) :
			// format inputs
			for($i = 1; $i <= 20; $i++) :
				$_POST['question'.$i] = '';
			endfor;
			// display success message
			$success['save'] = true;
		else :
			$success['sent'] = 'Erreur';
		endif;
	endif;
else :
	// format inputs and set nberr to 0
	for($i = 1; $i <= 20; $i++) :
		$_POST['question'.$i] = '';
	endfor;
	$errors['nerr'] = '';
endif;