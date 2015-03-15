<?php

function get_errors_change_pwd() {
	$result = array();

	//testing password
	if(isset($_POST['password']) && empty($_POST['password']))
		$result['password'] = 'Le champ est vide';
	else if(strlen($_POST['password']) <= 4)
		$result['password'] = 'Votre mot de passe doit faire plus de 4 caractères';
	else if(ctype_alnum($_POST['password']))
		$result['password'] = 'Votre mot de passe doit contenir au moins un caractère spécial';
	else if(count(explode(' ', $_POST['password'])) > 1)
		$result['password'] = 'Votre mot de passe ne peut contenir d\'espaces';
	else if(!preg_match('#[0-9]{1,}#', $_POST['password']))
		$result['password'] = 'Votre mot de passe doit contenir au moins un chiffre';
	 else if(!preg_match('#[A-Z]{1,}#', $_POST['password']))
		$result['password'] = 'Votre mot de passe doit contenir au moins une majuscule';

	//testing password_confirm
	if(isset($_POST['password_confirm']) && empty($_POST['password_confirm']))
		$result['password_confirm'] = 'Le champ est vide';
	else if(strlen($_POST['password_confirm']) <= 4)
		$result['password_confirm'] = 'Votre mot de passe doit faire plus de 4 caractères';
	else if($_POST['password_confirm'] != $_POST['password'])
		$result['password_confirm'] = 'Les deux mots de passe ne sont pas identiques';

	return $result;
}

function get_errors_signup() {
	$result = array();

	//testing pseudo
	if(isset($_POST['pseudo']) && empty($_POST['pseudo']))
		$result['pseudo'] = 'Le champ est vide';
	else if(strlen($_POST['pseudo']) <= 2)
		$result['pseudo'] = 'Votre pseudo doit faire plus de deux caractères';
	else if($_POST['pseudo'] != preg_replace('#[^A-Za-z0-9]+#', '_', $_POST['pseudo']))
		$result['pseudo'] = 'Votre pseudo ne peut pas comporter de caractères spéciaux. Essayez : '.preg_replace('#[^A-Za-z0-9]+#', '_', $_POST['pseudo']);

	//testing password
	if(isset($_POST['password']) && empty($_POST['password']))
		$result['password'] = 'Le champ est vide';

	return $result;
}

function get_errors_signin() {
	$result = array();

	//testing pseudo
	if(isset($_POST['pseudo']) && empty($_POST['pseudo']))
		$result['pseudo'] = 'Le champ est vide';
	else if(strlen($_POST['pseudo']) <= 2)
		$result['pseudo'] = 'Votre pseudo doit faire plus de deux caractères';
	else if($_POST['pseudo'] != preg_replace('#[^A-Za-z0-9]+#', '_', $_POST['pseudo']))
		$result['pseudo'] = 'Votre pseudo ne peut pas comporter de caractères spéciaux. Essayez : '.preg_replace('#[^A-Za-z0-9]+#', '_', $_POST['pseudo']);
	else if(($_POST['pseudo'] == $_POST['first_name']) || ($_POST['pseudo'] == $_POST['last_name']))
		$result['pseudo'] = 'Votre pseudo ne peut pas être identique à votre nom';

	//testing password
	if(isset($_POST['password']) && empty($_POST['password']))
		$result['password'] = 'Le champ est vide';
	else if(strlen($_POST['password']) <= 4)
		$result['password'] = 'Votre mot de passe doit faire plus de 4 caractères';
	else if(ctype_alnum($_POST['password']))
		$result['password'] = 'Votre mot de passe doit contenir au moins un caractère spécial';
	else if(count(explode(' ', $_POST['password'])) > 1)
		$result['password'] = 'Votre mot de passe ne peut contenir d\'espaces';
	else if(!preg_match('#[0-9]{1,}#', $_POST['password']))
		$result['password'] = 'Votre mot de passe doit contenir au moins un chiffre';
	 else if(!preg_match('#[A-Z]{1,}#', $_POST['password']))
		$result['password'] = 'Votre mot de passe doit contenir au moins une majuscule';

	//testing password_confirm
	if(isset($_POST['password_confirm']) && empty($_POST['password_confirm']))
		$result['password_confirm'] = 'Le champ est vide';
	else if(strlen($_POST['password_confirm']) <= 4)
		$result['password_confirm'] = 'Votre mot de passe doit faire plus de 4 caractères';
	else if($_POST['password_confirm'] != $_POST['password'])
		$result['password_confirm'] = 'Les deux mots de passe ne sont pas identiques';

	//testing email
	if(isset($_POST['email']) && empty($_POST['email']))
		$result['email'] = 'Le champ est vide';
	else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		$result['email'] = 'Votre email est invalide';

	//testing first_name
	if(isset($_POST['first_name']) && empty($_POST['first_name']))
		$result['first_name'] = 'Le champ est vide';
	else if($_POST['first_name'] != ucwords($_POST['first_name']))
		$result['first_name'] = 'Votre prénom doit être écrit comme ceci : '.ucwords($_POST['first_name']);

	//testing last_name
	if(isset($_POST['last_name']) && empty($_POST['last_name']))
		$result['last_name'] = 'Le champ est vide';
	else if($_POST['last_name'] != ucwords($_POST['last_name']))
		$result['last_name'] = 'Votre nom de famille doit être écrit comme ceci : '.ucwords($_POST['last_name']);

	//testing country
	if(isset($_POST['country']) && empty($_POST['country']))
		$result['country'] = 'Le champ est vide';

	return $result;
}

// if email exists in database
function emailExists($pdo, $email) {
    $emailQuery = 'SELECT * FROM users WHERE email = :email';
    $stmt = $pdo->prepare($emailQuery);
    $stmt->execute(array(':email' => $email));
    return !!$stmt->fetch(PDO::FETCH_ASSOC);
}

// if email pseudo in database
function pseudoExists($pdo, $pseudo) {
    $pseudoQuery = 'SELECT * FROM users WHERE pseudo = :pseudo';
    $stmt = $pdo->prepare($pseudoQuery);
    $stmt->execute(array(':pseudo' => $pseudo));
    return !!$stmt->fetch(PDO::FETCH_ASSOC);
}

// Set variables
$errors = array();
$success = array();


// If user try to change his password
if(isset($_POST['change']) && ($_POST['change'] == "Modifier")) {
	$errors = get_errors_change_pwd();

	$prepare = $pdo -> prepare('SELECT * FROM users WHERE pseudo LIKE BINARY :pseudo');
	$prepare -> bindValue(':pseudo',$_SESSION['pseudo']);
	$prepare -> execute();

	$user = $prepare -> fetch();

	if($user -> password == hash('sha256', SALT.$_POST['password']))
		$errors['password'] = 'Vous avez déjà ce mot de passe';

	if(empty($errors)) {
		$prepare = $pdo -> prepare('UPDATE users SET password = :password WHERE pseudo LIKE BINARY :pseudo');
		$prepare -> bindValue(':password', hash('sha256', SALT.$_POST['password']));
		$prepare -> bindValue(':pseudo',$_SESSION['pseudo']);
		if($prepare -> execute()) {
?>
			<script>
			document.location.href="logout.php";
			</script>
<?php
		}
		else {
			$errors['autre'] = 'Une erreur est survenue. Impossible de modifier votre mot de passe pour le moment';
		}
	}
}

// If user try to signup
if(isset($_POST['signup']) && ($_POST['signup'] == "Sign Up")) {
	$errors = get_errors_signup();

	if(empty($errors)) {
		$prepare = $pdo -> prepare('SELECT * FROM users WHERE pseudo LIKE BINARY :pseudo LIMIT 1');
		$prepare -> bindValue(':pseudo',$_POST['pseudo']);
		if($prepare -> execute()) {
			$user = $prepare -> fetch();

			if(!$user)
				$errors['pseudo'] = 'Pseudo introuvable';
			else {
				if($user -> password == hash('sha256', SALT.$_POST['password'])) {
					if(!isset($_SESSION)) session_start();
					$_SESSION['pseudo'] = $_POST['pseudo'];
					// update last_signup
					$last_signup = $pdo -> prepare('UPDATE users SET last_signup = "'.date('Y-m-d H:i:s').'" WHERE pseudo = "'.$_SESSION['pseudo'].'"');
					$last_signup -> execute();
	?>
					<script>
					document.location.href="index.php";
					</script>
	<?php
				}
				else
					$errors['password'] = 'Votre mot de passe est incorrect';
			}
		}
		else {
			$errors['autre'] = 'Une erreur est survenue lors de la connexion. Merci de réessayer ultérieurement.';
		}
	}
}

// If user try to signin
if(isset($_POST['signin']) && ($_POST['signin'] == "Sign In")) {
	$errors = get_errors_signin();
	if(emailExists($pdo, $_POST['email']))
		$errors['email'] = 'Cet email est déjà utilisé';
	if(pseudoExists($pdo, $_POST['pseudo']))
		$errors['pseudo'] = 'Ce pseudo est déjà pris';

	if(empty($errors)) {
		// save in database and display validation message ...
		$prepare = $pdo -> prepare('INSERT INTO users (pseudo,password,first_name,last_name,email,country,date_signin) VALUES (:pseudo,:password,:first_name,:last_name,:email,:country,:date_signin)');
		$prepare -> bindValue(':pseudo',$_POST['pseudo']);
		$prepare -> bindValue(':password', hash('sha256', SALT.$_POST['password']));
		$prepare -> bindValue(':first_name',$_POST['first_name']);
		$prepare -> bindValue(':last_name',$_POST['last_name']);
		$prepare -> bindValue(':email',$_POST['email']);
		$prepare -> bindValue(':country',$_POST['country']);
		$prepare -> bindValue(':date_signin', date('Y-m-d H:i:s'));

		if($prepare -> execute()) {
			
			$success[] = true;

			$_POST['pseudo'] = '';
			$_POST['password'] = '';
			$_POST['password_confirm'] = '';
			$_POST['first_name'] = '';
			$_POST['last_name'] = '';
			$_POST['email'] = '';
			$_POST['country'] = '';
		}
		else {
			$errors['validate'] = true;
		}
	}
}
else {
	$_POST['pseudo'] = '';
	$_POST['password'] = '';
	$_POST['password_confirm'] = '';
	$_POST['first_name'] = '';
	$_POST['last_name'] = '';
	$_POST['email'] = '';
	$_POST['country'] = '';
}