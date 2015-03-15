<?php
session_start();
if(isset($_SESSION['membre'])){
	header('Location: profile.php');
}

require 'inc/config.php';

$error = "";

if( isset($_POST["user"]) && isset($_POST["password"]) ) { 

    $prepare = $pdo->prepare('SELECT * FROM users WHERE mail=:user OR pseudo=:user LIMIT 1'); 
	$prepare->bindValue(':user', $_POST["user"]);
	$prepare->execute();

	$user = $prepare->fetch();

	// if(isset($_POST['remember'])){
	// 	setcookie('authcook', $user->id . '---' . sha1($user->pseudo . $user->password), time() + 3600 * 5, '/', '', false, true);
	// 	//definie l'expiration de la connexion à 5 heures + le chemin + le nom de domaine + pas de https donc false + http only
	// }
	if(!$user) {
		$error='Identifiants incorrects';
	}
	else {
		if($user->password == hash('sha256', SALT.$_POST["password"])) {
			session_start();
			$_SESSION['membre'] = $user->pseudo;
			header("Location: profile.php");
			die('ok');
		}
		else {
			$error='Identifiants incorrects (mot de passe incorrect)';
		}
	}
}
include 'partials/header.php';
?>
	<section class="global-page animated fadeInUp">
		<article class="page">
			<h1>Se connecter</h1>
			<div class="register">
				<form action="login.php" method="POST">
					<input type="text" name="user" class="material-input" placeholder="Email ou Pseudo">
					<br>
					<input type="password" name="password" class="material-input" placeholder="Mot de passe">
					<br>
					<!--<input type="checkbox" name="remember">Se souvenir de moi
					<br>-->
					<button type="submit" class="send" value="Send">
		               <i class="fa fa-paper-plane fa-2x"></i>
		            </button>
				</form>
			</div>
			<p class="notif-wrong"><?=$error?></p>

		</article>
	</section>

<?php include 'partials/footer.php'; ?>