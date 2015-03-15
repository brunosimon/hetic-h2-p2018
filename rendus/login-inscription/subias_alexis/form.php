<?php 

error_reporting(E_ALL);
ini_set('display_error', 1);

function get_errors_login() // login error function
{
	$result = array();

	//testing mail
	$mail = $_POST['mail'];
	if (isset($mail) && (!filter_var($mail, FILTER_VALIDATE_EMAIL))) //mail verification "@", "." ...
	$result['mail'] = "Enter a valid Email";

	//testing password
	$password = $_POST['password'];
	if (isset($password) && (empty($password))) //empty password
	$result['password'] = "Missing password";
	else if	(strlen($password) < 4) //password length < 4 
	$result['password'] = "Password too short";
	else if (strlen($password) > 36) //password length > 36
	$result['password'] = "Password too long";
	if (!empty($password)){ //password not empty
		if(!preg_match('#[0-9]{1,}#', $password)) //figure checking
		$result['password'] = "A figure is necessary on your password";
		else if(!preg_match('#[A-Z]{1,}#', $password)) //uppercase chacking
		$result['password'] = "An uppercase is necessary on your password";
	}
	return $result;
}


function get_errors_signin() // registration error function
{
	$result = array();

	//testing first name
	$first_name = $_POST['first_name'];
	if (isset($first_name) && (empty($first_name))) //empty first name
	$result['first_name'] = "Missing first name";
	else if (!(ctype_alpha($first_name))) //first name with letter
	$result['first_name'] = "Only letter on your first name";

	//testing last name
	$last_name = $_POST['last_name'];
	if (isset($last_name) && (empty($last_name))) //empty last name
	$result['last_name'] = "Missing last name";
	else if (!(ctype_alpha($last_name))) //last name with letter
	$result['last_name'] = "Only letter on your last name";

	//testing mail
	$mail = $_POST['mail'];
	if (isset($mail) && (empty($mail))) //empty mail
	$result['mail'] = "Missing mail";
	else if((!filter_var($mail, FILTER_VALIDATE_EMAIL))) //mail verification "@", "." ...
	$result['mail'] = "Enter a valid Email";

	//testing born
	$born = $_POST['born'];
	if (isset($born) && (empty($born))) //empty born
	$result['born'] = "Missing born";

	//testing country
	$country = $_POST['country'];
	if (isset($country) && (empty($country))) //empty country
	$result['country'] = "Missing country";

	//testing pseudo
	$pseudo = $_POST['pseudo'];
	if (isset($pseudo) && (empty($pseudo))) //empty pseudo
	$result['pseudo'] = "Missing pseudo";
	else if (strlen($pseudo) <4) // pseudo length < 4
	$result['pseudo'] = "Pseudo too short";
	else if (strlen($pseudo) > 36) //pseudo length > 36
	$result['pseudo'] = "Pseudo too long";

	//testing password
	$password = $_POST['password'];
	if (isset($password) && (empty($password))) //empty password
	$result['password'] = "Missing password";
	else if	(strlen($password) < 4) //password length < 4
	$result['password'] = "Password too short";
	else if (strlen($password) > 36) //password length > 36
	$result['password'] = "Password too long";
	if (!empty($password)){ //password not empty
		if(!preg_match('#[0-9]{1,}#', $password)) //figure checking
		$result['password'] = "A figure is necessary on your password";
		else if(!preg_match('#[A-Z]{1,}#', $password)) //uppercase checking
		$result['password'] = "An uppercase is necessary on your password";
	}

	//testing password confirmation
	$password_confirm = $_POST['password_confirm'];
	if (isset($password_confirm) && (empty($password_confirm))) //empty password confirm
	$result['password_confirm'] = "Missing confirmation";
	else if ($_POST["password"]!=$_POST["password_confirm"]) //if password = password confirm
	$result['password_confirm'] = "Non-identical password";

	return $result;
}
	//Email checking function
function mailExists($pdo, $mail)
{
	$mailQuery = "SELECT * FROM users WHERE mail=:mail LIMIT 1";
	$stmt = $pdo->prepare($mailQuery);
	$stmt->execute(array(':mail' => $mail));
	return !!$stmt->fetch(PDO::FETCH_ASSOC);
}

//set variables
$errors = array();
$success = array();

//login page
if(isset($_POST['login']) && (!empty($_POST['login'])))
{
	$errors = get_errors_login();
	// checking mail
	if (!mailExists($pdo, $_POST['mail'])) {
		$errors['mail'] = "User nor found";
	}
	if(empty($errors))
	{
		$prepare = $pdo -> prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1'); //checking mail
		$prepare -> bindValue(':mail',$_POST['mail']);
		if ($prepare->execute())
		{
			$user = $prepare -> fetch(); //mail is not on the DB
				if (!empty($_POST['password'])) //checking if the password exist in the DB
				{
					if ($user->password == hash('sha256',SALT.$_POST ['password'])){ //checking password with hash
						$_SESSION['mail']=$_POST['mail'];
						?>
						<script>
							document.location.href="connexion.php"; //redirection if the connexion is a success
						</script>
						<?php 
					}
					else
						$errors['password'] = "Wrong password"; //error message if the password is not in the DB
				}
			}
		}
	}
//registration page
	if(isset($_POST['registration']) && (!empty($_POST['registration'])))
	{
		$errors = get_errors_signin();
	// checking mail
		if (mailExists($pdo, $_POST['mail'])) {
			$errors['mail'] = "Email already used";
		}
		if(empty($errors))
		{
			$prepare = $pdo->prepare('INSERT INTO users (first_name, last_name, mail, born, country, pseudo, password) VALUES (:first_name,:last_name,:mail,:born,:country,:pseudo,:password)');

			$prepare->bindValue(':first_name',$_POST['first_name']);
			$prepare->bindValue(':last_name',$_POST['last_name']);
			$prepare->bindValue(':mail',$_POST['mail']);
			$prepare->bindValue(':born',$_POST['born']);
			$prepare->bindValue(':country',$_POST['country']);
			$prepare->bindValue(':pseudo',$_POST['pseudo']);
			$prepare->bindValue(':password',hash('sha256', SALT.$_POST['password']));
			if ($prepare->execute()) //redirection
			{
				?>
				<script>
					document.location.href="login.php";
				</script>	
				<?php
			}
		}
	}

	// echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';