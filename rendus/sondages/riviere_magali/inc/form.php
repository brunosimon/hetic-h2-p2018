<?php

// On récupère la liste des email et pseudo pour futurs tests
$query = $pdo->query('SELECT mail, pseudo FROM users');
$list_mail_pseudo = $query->fetchAll();


// Set variables
$errors = array();
$success = array();
$heroes = array();




/********** FONCTIONS GENERALES ***********/


// Vérifie si un élément si trouve déjà dans la BDD
function in_database($tested, $what)
{
	global $list_mail_pseudo;
	foreach ($list_mail_pseudo as $value) {
		if($value->$what == $tested)
			return true;
	}
	return false;
}


/********** FONCTIONS POUR INSCRIPTION ***********/

// Envoie des donnée à la BDD après vérification
function send_data()
{
	global $pdo;
	$prepare = $pdo->prepare('INSERT INTO users (pseudo, mail, password, birth, gender) VALUES (:pseudo, :mail, :password, :birth, :gender)');

	$prepare->bindValue(':pseudo'  , $_POST['pseudo']);
	$prepare->bindValue(':mail'    , $_POST['mail']);
	$prepare->bindValue(':password', hash('sha256', PREFIX_SALT.$_POST['password'].SUFFIX_SALT));
	$prepare->bindValue(':birth'   , $_POST['birth']);
	$prepare->bindValue(':gender'  , $_POST['gender']);

	$prepare->execute();
}

// Fonction pour retourner les erreurs de $_POST
function get_errors($data)
{
	$result = array();

	// Set variables
	$pseudo		      = $data['pseudo'];
	$mail 			  = $data['mail'];
	$mail_confirm 	  = $data['mail_confirm'];
	$password 		  = $data['password'];
	$password_confirm = $data['password_confirm'];
	$birth 			  = $data['birth'];
	$gender 		  = $data['gender'];


	// Test pseudo
	if(empty($pseudo))
		$result['pseudo'] = 'Un pseudo est obligatoire ! :)';
	else if(strlen($pseudo) <= 1)
		     $result['pseudo'] = 'Ce pseudo est trop court !';
		 else if(in_database($pseudo, 'pseudo'))
			  	  $result['pseudo'] = 'Ce pseudo est déjà utilisé';


	// Test Email
	if(empty($mail))
		$result['mail'] = 'Mail obligatoire pour la création de votre compte';
	else if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
			 $result['mail'] = $result['mail_confirm'] = 'Mail incorrect';
		 else if($mail != $mail_confirm)
			      $result['mail'] = $result['mail_confirm'] = 'Mail non identique';
			  else if(in_database($mail, 'mail'))
			  	       $result['mail'] = $result['mail_confirm'] = 'Ce mail est déjà utilisé';

	// Test password
	if(empty($password))
		$result['password'] = 'Mot de passe obligatoire';
	else if(strlen($password) < 6)
			 $result['password'] = $result['password_confirm'] = 'Votre mot de passe doit faire plus de 6 caractères !';
		else if(!preg_match_all("/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{5,255})/", $password))
				 $result['password'] = $result['password_confirm'] = 'Votre mot de passe n\'est pas assez complexe ! 1 chiffre et 1 majuscule obligatoire';
			 else if($password != $password_confirm)
				      $result['password'] = $result['password_confirm'] = 'Mot de passe non identique';

	// Test birth
	if(empty($birth))
		$result['birth'] = 'Votre date de naissance est obligatoire';

	// Test gender
	if(empty($gender))
		$result['gender'] = 'Veuillez choisir votre genre';
	else if(!in_array($gender, array('male', 'female')))
		     $result['gender'] = 'Vous êtes, apparemment, insexué. Félicitations.';


	// Test agreement
	if(!array_key_exists('agreement', $data))
		$result['agreement'] = 'Vous devez accepter les règles du site';

	return $result;
}

// Lancement vérifications du formulaire d'inscription
if(!empty($_POST) && isset($_POST['inscription']))
{
	if(empty($_POST['gender']))
		$_POST['gender'] = '';

	$errors = get_errors($_POST);

	// Succès (pas d'erreur)
	if(empty($errors))
	{
		send_data();

		// Remise à 0 formulaire
		$_POST['pseudo']		   = '';
		$_POST['mail'] 			   = '';
		$_POST['mail_confirm']     = '';
		$_POST['password'] 		   = '';
		$_POST['password_confirm'] = '';
		$_POST['birth'] 		   = '';
		$_POST['gender'] 		   = '';

		header('Location:login');
		exit;
	}
}
// si POST est vide
else
{
	$_POST['pseudo']		   = '';
	$_POST['mail'] 			   = '';
	$_POST['mail_confirm']     = '';
	$_POST['password'] 		   = '';
	$_POST['password_confirm'] = '';
	$_POST['birth']			   = '';
	$_POST['gender'] 		   = '';
}






/********** FONCTIONS QCM ***********/

// Fonction qui récupère les erreurs du QCM
function get_errors_qcm($data)
{
	$result = array();
	$game = array();

	// Test range
	if(!array_key_exists('scope', $data))
		$result['scope'] = 'Vous devez répondre à la question 1 !';

	// Test category
	if(!array_key_exists('category', $data))
		$result['category'] = 'Vous devez répondre à la question 2 !';

	// Test game
	if(!array_key_exists('diablo', $data) && !array_key_exists('starcraft', $data) && !array_key_exists('warcraft', $data))
		$result['game'] = 'Vous devez répondre à la question 3 !';


	// Test sex
	if(!array_key_exists('sex', $data))
		$result['sex'] = 'Vous devez répondre à la question 4 !';
	
	return $result;
}


// Lancement vérifications du QCM
if(!empty($_POST) && isset($_POST['qcm']))
{

	$errors = get_errors_qcm($_POST);

	// Succès (pas d'erreur)
	if(empty($errors))
	{
		$heroes = send_qcm();

		// Remise à 0 formulaire
		$_POST['scope']     = '';
		$_POST['category']  = '';
		$_POST['diablo']    = '';
		$_POST['starcraft'] = '';
		$_POST['warcraft']  = '';
		$_POST['sex']       = '';

		// header('Location:login');
		// exit;
	}
}
// si QCM est vide
else
{
	$_POST['scope']     = '';
	$_POST['category']  = '';
	$_POST['diablo']    = '';
	$_POST['starcraft'] = '';
	$_POST['warcraft']  = '';
	$_POST['sex']       = '';
}

// Récupération des héros sélectionnés et envoie des votes
function send_qcm()
{
	global $pdo;
	switch($_POST['sex'])
    {
        case 'same':
            $prepare = $pdo->prepare('SELECT * FROM heroes WHERE (game = :game1 OR game = :game2 OR game = :game3) AND scope = :scope AND category = :category AND sex = :sex');
            $prepare->bindValue(':sex', $_SESSION["gender"]);
            break;
        case 'different':
            $prepare = $pdo->prepare('SELECT * FROM heroes WHERE (game = :game1 OR game = :game2 OR game = :game3) AND scope = :scope AND category = :category AND sex != :sex');
            $prepare->bindValue(':sex', $_SESSION["gender"]);
            break;
        case 'dont-care':
            $prepare = $pdo->prepare('SELECT * FROM heroes WHERE (game = :game1 OR game = :game2 OR game = :game3) AND scope = :scope AND category = :category');
            break;
        default:
            $prepare = $pdo->prepare('SELECT * FROM heroes WHERE (game = :game1 OR game = :game2 OR game = :game3) AND scope = :scope AND category = :category');
    }
	$prepare->bindValue(':scope', $_POST['scope']);
	$prepare->bindValue(':category', $_POST['category']);
	if(array_key_exists('diablo', $_POST))
		$prepare->bindValue(':game1', $_POST['diablo']);
	else
		$prepare->bindValue(':game1', "");
	if(array_key_exists('starcraft', $_POST))
		$prepare->bindValue(':game2', $_POST['starcraft']);
	else
		$prepare->bindValue(':game2', "");
	if(array_key_exists('warcraft', $_POST))
		$prepare->bindValue(':game3', $_POST['warcraft']);
	else
		$prepare->bindValue(':game3', "");
	$prepare->execute();

	$heroes = $prepare->fetchAll();

	// On augemente le nombre de vote de chaque héros sélectionné de 1
	foreach ($heroes as $value) {
		$prepare = $pdo->prepare('UPDATE heroes SET vote = vote + 1 WHERE name = :name');
		$prepare->bindValue(':name', $value->name);
		$prepare->execute();
	}

	// On augmente le nombre de vote de l'utilisateur de 1
	$prepare = $pdo->prepare('UPDATE users SET vote = vote + 1 WHERE pseudo = :pseudo');
	$prepare->bindValue(':pseudo', $_SESSION['pseudo']);
	$prepare->execute();

	// Si aucun héros n'a été retourné
	if(!isset($heroes[0]))
		return 'vide';

	return $heroes;
}

/********** FONCTIONS LOGIN ***********/
$error = false;
// Verification login
if(!empty($_POST) && isset($_POST['login']))
{
	$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail || pseudo = :mail LIMIT 1');
	$prepare->bindValue(':mail', $_POST['mail_log']);
	$prepare->execute();

	$user = $prepare->fetch();

	if(!$user)
	{
		$error = true;
	}

	else
	{
		if($user->password == hash('sha256', PREFIX_SALT.$_POST['password_log'].SUFFIX_SALT))
		{
			// On ouvre la session
	        session_start();
	        // On enregistre les données de l'utilisateur en session
	        $_SESSION['pseudo']   = $user->pseudo;
	        $_SESSION['mail']     = $user->mail;
	        $_SESSION['password'] = $user->password;
	        $_SESSION['gender']   = $user->gender;
	        // On redirige vers la page de session
			header('Location:choose');
			exit;
		}
		else
		{
			$error = true;
		}
	}
}


/********** FONCTIONS DECONNEXION ***********/

// Gestion déconnexion
if(array_key_exists('disconnect', $_POST))
{
	$_SESSION = array();
	if (ini_get("session.use_cookies")) 
	{
    	$params = session_get_cookie_params();
    	setcookie(session_name(), '', time() - 42000,
	        $params["path"], $params["domain"],
	        $params["secure"], $params["httponly"]
    	);
	}
	session_destroy();
	header('Location:login');
    exit();
}