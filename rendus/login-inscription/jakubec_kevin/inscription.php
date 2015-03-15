<?php

	require 'inc/config.php';
	//die('ok');  teste si connexion à la BDD







	if(!empty($_POST)){ // test si des données sont renvoyées
		/*echo '<pre>';
		print_r($_POST);
		echo '</pre>';*/


		$prepare = $pdo->prepare('INSERT INTO users (pseudo, mail, password) VALUES (:pseudo, :mail, :password)');

		$prepare->bindValue(':pseudo',$_POST['pseudo']);
		$prepare->bindValue(':mail',$_POST['mail']);
		$prepare->bindValue(':password',hash('sha256',SALT.$_POST['password'])); // hash le mdp



		if(isset($_POST['pseudo'])){
			$pseudo = htmlentities($_POST['pseudo']);

			// On insère la variable pseudo qui correspond à la saisie de l'utilisateur dans la requête SQL
			$sql = $pdo->prepare('SELECT pseudo FROM users WHERE pseudo = \''.$pseudo.'\';');
			$sql->execute(array('.$pseudo.' => $_POST['pseudo']));

			// recherche de résultat
			$res = $sql->fetch();

			if ($res){
				// S'il y a un résultat, c'est à dire qu'il existe déjà un pseudo, alors "Ce pseudo est déjà utilisé"
				echo "Ce pseudo est deja utilise !";
				return false;
			}
		}

		else if(isset($_POST['mail'])){
			$mail = htmlentities($_POST['mail']);

			// On insère la variable pseudo qui correspond à la saisie de l'utilisateur dans la requête SQL
			$sql = $pdo->prepare('SELECT mail FROM users WHERE mail = \''.$mail.'\';');
			$sql->execute(array('.$mail.' => $_POST['mail']));

			// recherche de résultat
			$res = $sql->fetch();

			if ($res){
				// S'il y a un résultat, c'est à dire qu'il existe déjà un pseudo, alors "Ce pseudo est déjà utilisé"
				echo "<br>Ce mail est deja utilise !";
				return false;
			}
		}

		if(empty($_POST['pseudo'])){
			echo 'Pseudo manquant';
			return false;
		}

		if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
			echo "<br>L'adresse email n'est pas valide";
			//header('Location:inscription.php');
			return false;
		}

		if(empty($_POST['password'])){
			echo 'Password manquant';
			return false;
		}

		else if(empty($_POST['confirm_password'])){
			echo '<br>Confirm password manquant';
			return false;
		}

		else if($_POST['password'] != $_POST['confirm_password']){
			echo '<br>Les passwords sont differents';
			return false;
		}
		else{
		$prepare->execute();
		header('Location:login.php');
		}
	}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
	<link rel="stylesheet" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="formulaire">
		<h1>INSCRIPTION</h1>
		<?php if(!empty($errors)){ ?>
        <div class="errors">
            <?php foreach ($errors as $_error) { ?>
                <p>
                    <?php echo $_error ?>
                </p>
            <?php } ?>
        </div>
     <?php   }?>
		<form action="#" method="POST">
			<input type="text" name="pseudo" >
			<label>Pseudo</label>
			<br>
			<input type="text" name="mail">
			<label>Mail</label>
			<br>
			<input type="password" name="password">
			<label>Password</label>
			<br>
			<input type="password" name="confirm_password">
			<label>Confirm password</label>
			<br>
			<input type="submit" id="submit" value="VALIDER">
		</form>
	</div>
</body>
</html>