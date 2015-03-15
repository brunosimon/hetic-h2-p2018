<?php
require ('inc/config.php');

session_start();

//Set variables
$errors  = array();

//Function that returns every error
//if OK : log in DB 
//else : send errors to page
function check_register_form($data){
	$result = array();

	//Sanitize and set data
	$email        = filter_var(strtolower($data['email']), FILTER_SANITIZE_EMAIL);
	$email_bis    = filter_var(strtolower($data['email-bis']), FILTER_SANITIZE_EMAIL);
	$password     = $data['password'];
	$password_bis = $data['password-bis'];

	$result['success'] = true;

	//1.Testing captcha 

	if(file_get_contents("http://www.opencaptcha.com/validate.php?ans=".$_POST['captcha']."&img=".$_POST['captcha_data'])!='pass') {
		$result['success'] = false;
		$result['notice'] = "Mauvais captcha";
	} 


	//2.Testing email
		//Is email already in DB ?
		if (email_already_in_db($email)){

			$result['success'] = false;
			$result['notice']   = 'Cet email est déjà enregistré';
		}
		
		//Are $email and $email_bis the same ?
		if ( $email != $email_bis ) {
			$result['success'] = false;
			$result['notice']   = "L'email et le champ de vérificaiton diffèrent";
		}

		//Is email valid ?
		else {
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);
			if ( $email == false ) {
				$result['success'] = false;
				$result['notice']   = 'Erreur dans l\'adresse email';
			}
		}

	//Testing password
		//Are $password and $password_bis the same ?
		if ( $password != $password_bis ) {
			$result['success'] = false;
			$result['notice'] = 'Vous n\'avez pas entré le même mot de passe sur les deux champs';
		}
		//TODO : Is the password complex enough ?
		if(password_is_blacklisted($password)){
			$result['success'] = false;
			$result['notice'] = "Votre mot de passe fait partie des <a href=\"http://splashdata.com/splashid/worst-passwords/\">pires 25 mots de passe.</a>";
		}
		
		//TODO : Is the password blacklisted ?

	return $result;
}


function register(){

	// log new user in DB

	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	
	$conn = new PDO('mysql:host='.DB_HOST.';dbport='.DB_PORT.';dbname='.DB_NAME,DB_USER,DB_PASS);

	$prepare = $conn->prepare('INSERT INTO users (mail,password) VALUES (:mail,:password)');

	$prepare->bindValue(':mail',$email);
	$prepare->bindValue(':password',hash('sha256',$_POST['password'].SALT));

	$exec = $prepare->execute();

	//send email
	prepare_verification_mail($email);
			
}

function send_register_errors($errors){


	//log errors to $_SESSION var so it stays available trough pages	
	$_SESSION['errors'] = $errors['notice'];
	//redirect to index
	header("Location: ./public_html/index.php");
}

//takes in an email, returns a bool
function email_already_in_db($email){
	//open DB connexion
	$conn = new PDO('mysql:host='.DB_HOST.';dbport='.DB_PORT.';dbname='.DB_NAME,DB_USER,DB_PASS);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

	$stmt = $conn->prepare('SELECT * FROM users WHERE mail = :mail');
	$stmt->bindValue(':mail',$email);

	$query = $stmt->execute();
	$user  = $stmt->fetch();

	if (empty($user)){
		return false;
	}

	else{
		return true;
	}
}

//takes in teh password returns a bool
function password_is_blacklisted($password){
	$file = "blacklist.txt";
	$searchfor = $password;

	$contents = file_get_contents($file);
	// escape special characters in the query
	$pattern = preg_quote($searchfor, '/');
	// finalise the regular expression, matching the whole line
	$pattern = "/^.*$pattern.*\$/m";
	// search, and store all matching occurences in $matches
	if(preg_match_all($pattern, $contents, $matches)){
	   return true;
	}
	else{
	   return false;
	}
}

/*  #######################
		Mail part :
			1. prepares a token and registers it in DB
			2. sends it to the user
			3. wait for the answer
 */

//creates a 'unique' token and inserts it in DB
function prepare_verification_mail($email){

	$hash = md5(time().SALT);

	//log token in DB
	$conn = new PDO('mysql:host='.DB_HOST.';dbport='.DB_PORT.';dbname='.DB_NAME,DB_USER,DB_PASS);

	$prepare = $conn->prepare('INSERT INTO pending_users (user,token) VALUES (:user,:token)');

	$prepare->bindValue(':user',$email);
	$prepare->bindValue(':token',$hash);

	$exec = $prepare->execute();

	//pass token to email
	send_verification_mail($hash, $email);
	
}

function send_verification_mail($token, $mail_dest){

	// Plusieurs destinataires
	$to = $mail_dest;

	// Sujet
	$subject = 'Veuillez confirmer votre inscription à het.ic';

	// message
	$message = '
	<html>
		<head>
			<title>Veuillez confirmer votre inscription à het.ic</title>
		</head>
		<body>
			<h1>Merci de votre inscription '.$to.' !</h1>
			<p>Merci de cliquer sur ce lien pour valider :</p>
			<form action="../mail_verifier.php" method="GET">
				<input type="hidden" name="token" value=" '.$token.' ">
				<input type="hidden" name="email" value="'.$to.'">
				<input type="submit" name="send" id="send" value="Envoyer">
			</form>
		</body>
	</html>
	';

	// Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	// En-têtes additionnels
	$headers .= 'From: Morgan Caron <morgan.caron@hetic.net>' . "\r\n";

	// Envoi
	mail($to, $subject, $message, $headers);

	$msg = array();
	$msg['notice'] = "Veuillez consulter votre boite mail et activer votre compte";
	send_register_errors($msg);

}

//checks if the token supplied by user is correct. 
//If Yes : activates account
//Else, echo an error message. TODO : fonction de renvoie de mail.
function verify_mail_answer(){
	//get token from DB to compare to the one in $_GET
	$conn = new PDO('mysql:host='.DB_HOST.';dbport='.DB_PORT.';dbname='.DB_NAME,DB_USER,DB_PASS);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

	$stmt = $conn->prepare('SELECT * FROM pending_users WHERE user = :user');
	$stmt->bindValue(':user',$_GET['email']);

	$query = $stmt->execute();
	$user  = $stmt->fetch();

	//no answer ? 
	if (empty($user)){
		echo '<pre>';
		print_r($_GET);
		echo '</pre>';
				
		echo "Houston we've got a problem : problème de base de donnée.";
	}

	// if token is OK,  delete the line and activate the account !
	else if ( $user->token == $_GET['token'] ) {

		$stmt = $conn->prepare('DELETE FROM pending_users WHERE user = :user');
		$stmt->bindValue(':user',$_GET['email']);

		$query = $stmt->execute();

		activate_account();
	}

	else {
		echo "Votre token est invalide. Veuillez vous réinscrire ou contacter l'administration.";
	}
}

//Updates DB to activate account, updating the correct row
function activate_account(){

	$conn = new PDO('mysql:host='.DB_HOST.';dbport='.DB_PORT.';dbname='.DB_NAME,DB_USER,DB_PASS);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

	$stmt = $conn->prepare('UPDATE users SET active = 1 WHERE mail = :mail');
	$stmt->bindValue(':mail',$_GET['email']);

	$query = $stmt->execute();

	header("Location: ./public_html/index.php");
}

//if POST method, then it is about a user registering
if($_POST){
	$errors = check_register_form($_POST);

	$email  = filter_var(strtolower($_POST['email']), FILTER_SANITIZE_EMAIL);

	$errors['success'] == true ? register() : send_register_errors($errors);
}

//if GET method, it is a request for activation from a mail
if ($_GET){
	verify_mail_answer();
}