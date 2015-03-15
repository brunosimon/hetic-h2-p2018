<?php

// 	PAGE LOGIN 
// - Fonction « Rester connecté »
// - Fonction « Mot de passe oublié »
// - Vérification que le mail et le Mot de passe soit bon, sinon animation d’erreur.
// - Vérification que le compte ai été confirmé par mail, sinon animation d’erreur.
// - Si déjà connecté, redirection vers la page cachée.
// - Si plus de 10 connexions ont échoués, l’utilisateur ne peut pas se log pendant 3 heures.
	
	// If not too much attemps, we re-create a session.
	if (!empty($_SESSION['fails']) && $_SESSION['fails'] < 10) {
	session_start();
}
	// If there is no attempt yet, we create a new variable that counts attempts.
	if(empty($_SESSION['fails'])) {
		$_SESSION['fails'] = 0;
	}

	require 'inc/config.php';

	// If user clicked on disconnect, it will have a parameter in the URL, so we get it and then we destroy the session. That will disconnect him.
	if (isset($_GET["disconnect"])) {
		session_destroy();
		header("Location: login.php");
	}


	//Errors check
	if (!empty($_POST)) {

		$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');
		$prepare->bindValue(':mail',$_POST['mail']);

		$prepare->execute();
		$user = $prepare->fetch();

		//if mail not in db, there is an error
		if(!$user) {
			$notPass = true;
			$_SESSION['fails']++;
		}
		else {
			//if password match we connect user
			if(($user->password == hash('sha256', SALT.$_POST['password'])) && ($user->active == 1)) {
				$_SESSION['user'] = $_POST['mail'];
				// if he checked remember me we will create a variable in the session to say "remember me"
				if (isset($_POST['rememberme'])) {
					$_SESSION['remember'] = true;
				}
				header("Location: index.php");
				$_SESSION['fails'] = 0;
			}
			// else there is an error and attempt counter increase
			else {
				$notPass = true;
				$_SESSION['fails']++;
			}
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Connection to LiveSpace</title>
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php if (isset($_SESSION['user'])) {
 ?>
 <script>
 	 document.location.href="index.php";
 </script>
<?php

 } else {
   ?>
	<div class="connect_box" <?php if (isset($notPass)) { echo 'style="-webkit-animation: errorAnim 0.8s;"'; } ?> >
		<img src="src/img/logo.png" alt="">
		<h1>Connection to LiveSpace</h1>
		<?php if ($_SESSION['fails'] > 10) { 
			if (!isset($_SESSION['time'])) {
				session_cache_expire(1);
				$_SESSION['time'] = true;
			}
		?>
		<h2>You failed two many times. Try again in 3 hours.</h2>
		<?php } else {  ?>
		<form action="#" method="POST">
			<input type="text" name="mail" placeholder="Email">
			<br>
			<input type="password" name="password" placeholder="Password">
			<br>
			<input type="submit" value="">
			<br>
			<input type="checkbox" name="rememberme" id="rememberme"><label for="rememberme">Stay connected</label>
		</form>
		<?php } ?>
	<p>You don't have an account ? <a href="inscription.php">Create one now.</a></p>
	</div>
	<div class="fp"><span>About LiveSpace</span> | <span><a href="forgot_password.php" target="_blank">Forgot Password ?</a></span>  |  <span>Terms of Use</span></div>
	 <?php
 } ?>
</body>
</html>