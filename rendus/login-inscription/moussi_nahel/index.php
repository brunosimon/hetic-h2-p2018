<?php 

//SESSION START 
session_start();

require_once 'inc/config.php';

//Si l'utilisateur à saissis des données
if(!empty($_POST)){

	//Declaration variable + Securise contre l'injection Mysql (1 = 1)
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	//Verifier si l'utilisateur existe
	$q=array('email'=>$email, 'password'=>$password);
	$sql= 'SELECT id,email,password FROM nm_devoir1 WHERE email = :email AND password = :password';
	$req = $pdo -> prepare($sql);
	$req->execute($q);
	$count = $req->rowCount($sql);
		//Si il existe ..				      
		if($count == 1 ){
			$sql= 'SELECT email,password FROM nm_devoir1 WHERE email = :email AND password = :password AND activer = 1 ';
			$req = $pdo -> prepare($sql);
			$req->execute($q);
			$actif = $req->rowCount($sql);
			//Verifier si l'utilisateur est actif
				if($actif == 1){
					//Et si il veux que je me souvienne de lui .. 
						if (isset($_POST['remember'])) {
							$timestamp_expire = time() + 365*24*3600;
							setcookie('email', $email, $timestamp_expire, '/');
							setcookie('password',$_POST['password'], $timestamp_expire, '/'); //Il faudrait cryptée le cookie, puis recuperer la valeur non cryptée dans le champs password
																							  // Apres plusieurs test (avec explode, sha1(), ou tableau.. Je n'ai pas reussit)

						}
						else{
							$timestamp_expire = time() - 10;
							setcookie('email', $email, $timestamp_expire, '/');
							setcookie('password',$_POST['password'], $timestamp_expire, '/');
						}
					//Creation de sa session
					$_SESSION['Auth'] = array(
						'email' => $email,
						'password' => $password
						);
					
				header('Location:private.php');
				exit;
				} 

				//L'utilisateur n'as pas activer son compte
			else{
				$error_actif = "Votre compte n'est pas actif, verifier vos E-mails pour activer votre compte";

				}
		}

	//Si l'utilisateur n'as pas de compte
	else{
		$erreur_unknow = "E-mail ou mot de passe incorrect";
	}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Connexion</title>
	<link rel="stylesheet" href="src/css/reset.css">
    <link rel="stylesheet" href="src/css/typo.css">
    <link rel="stylesheet" href="src/css/style.css">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
</head>
<body>

<div class="background"><div class="before"></div></div>
	<h1>La journée de la Femme.</h1>
		<form action="index.php" method="POST" class='formulaire'>

			<input type="text" name='email' placeholder='E-mail' value='<?php if(isset($_COOKIE['email'])) { echo($_COOKIE['email']); }?>' >
			<br>

			<input type="password" placeholder='Password' name="password" value='<?php if(isset($_COOKIE['password'])) { echo($_COOKIE['password']); }?>'>
			<br>


			
			<label class="checkbox" >
				<input type="checkbox" name='remember' checked> Se souvenir de moi
			</label>
			<br>

			<input type="submit"  class='submit' value='connexion'>

		</form>

	<a href="register.php" class='login'>Inscription</a>
	<a href="forgot.php" class='forgot'>?</a>


			<div class="error"> 
				<?php if(isset($erreur_unknow)) {echo $erreur_unknow;} ?>
			</div>

			<div class="error"> 
				<?php if(isset($error_actif)) {echo $error_actif;} ?>
			</div>
	
</body>
</html>