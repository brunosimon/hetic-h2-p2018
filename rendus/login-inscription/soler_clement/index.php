	<?php

	require 'inc/config.php';
	$error = '';
	$sucess = '';



	if(!empty($_POST))
	{

		if ($_POST['pseudo'] == '' && $_POST['mail'] == '' && $_POST['password'] == '' && $_POST['verifpassword'] == ''){
			$error='Oups, vous avez oubliez de remplir le formulaire';
		}
		else if ($_POST['pseudo'] == '' && $_POST['mail'] == ''){
			$error='Oups, veuillez renseignez votre pseudo et votre email';
		}
		else if ($_POST['pseudo'] == '' && $_POST['password'] == ''){
			$error='Oups, veuillez renseignez votre pseudo et votre mot de passe';
		}
		else if ($_POST['mail'] == '' && $_POST['password'] == ''){
			$error='Oups, veuillez renseignez votre email et votre mot de passe';
		}
		else if ($_POST['pseudo'] == ''){
			$error ='Oups, veuillez renseignez votre pseudo';
		}
		else if (strlen($_POST['pseudo']) < 4){
			$error = 'Votre pseudo doit comporter au minimum 4 caractères';
		}
		else if ($_POST['mail'] == ''){
			$error ='Oups, veuillez renseignez votre email';
		}
		else if(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$_POST['mail'])){
			$error = 'Veuillez renseignez un email valide';
		}
		else if ($_POST['password'] == ''){
			$error ='Oups, veuillez renseignez votre mot de passe';
		}
		else if (strlen($_POST['password']) < 4){
			$error ='Votre mot de passe doit comporter au minimum 4 caractères';
		}
		else if ($_POST['verifpassword'] == ''){
			$error ='Oups, veuillez confirmer votre mot de passe';
		}
		else if ($_POST['password'] != $_POST['verifpassword']){
			$error= 'Les mots de passe doivent correspondre';
		}
		else {
			$prepare = $pdo->prepare('INSERT INTO users (mail,pseudo,password) VALUES (:mail,:pseudo,:password)');
			$prepare->bindValue(':mail',$_POST['mail']);
			$prepare->bindValue(':pseudo',$_POST['pseudo']);
			$prepare->bindValue(':password',hash('sha256',SALT.$_POST['password']));
			$test = $prepare->execute();
			$sucess = 'Vous pouvez maintenant vous connecter';
		}
	}
	?>

	<?php include 'partials/header.php'; ?>

	<section class="global-page animated fadeInUp">
		<article class="page">
			<h1>Inscription</h1>
			<div class="register">
				<form action="#" method="POST">
					<input type="text" name="pseudo" class="material-input" placeholder="Pseudo" value="<?php if (isset($_POST['pseudo'])){echo $_POST['pseudo'];} ?>">
					<br>
					<input type="text" name="mail" class="material-input" placeholder="Email" value="<?php if (isset($_POST['mail'])){echo $_POST['mail'];} ?>">
					<br>
					<input type="password" name="password" class="material-input" placeholder="Mot de passe">
					<br>
					<input type="password" name="verifpassword" class="material-input" placeholder="Confirmer mot de passe">
					<br>
					<button type="submit" class="send">
		               <i class="fa fa-paper-plane fa-2x"></i>
		            </button>		           
				</form>
			</div>
			<p class="notif-wrong"><?=$error?></p>
			<p class="notif-good"><?=$sucess?></p>
		</article>
	</section>

	<?php include 'partials/footer.php'; ?>
