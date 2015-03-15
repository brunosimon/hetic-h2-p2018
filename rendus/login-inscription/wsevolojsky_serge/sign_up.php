<?php 
	
	require 'inc/config.php';
	require 'inc/test_error.php';
	// require 'inc/mail_confirm.php';

	// 	//Show errors
	// error_reporting(E_ALL);
	// ini_set('display_error', 1);

	if(!empty($_POST)){

		// on verifie s'il n'y a aucune erreur puis on inscris dans la base de donnée.
		if($success){

			define('PREFIXE',$_POST['pseudo']);
			define('SUFFIXE',$_POST['mail']);

			$prepare = $pdo->prepare('INSERT INTO users (name,lastname,mail,pseudo,password) VALUES (:name,:lastname,:mail,:pseudo,:password)');

			$prepare->bindValue(':name',$_POST['name']);
			$prepare->bindValue(':lastname',$_POST['lastname']);
			$prepare->bindValue(':mail',$_POST['mail']);
			$prepare->bindValue(':pseudo',$_POST['pseudo']);
			$prepare->bindValue(':password',hash('sha512',sha1(PREFIXE).$_POST['password'].sha1(SUFFIXE)));

			$prepare->execute();

			$_SESSION['name']      = 'burno';
			$_SESSION['connected'] = true;

			setcookie('user_id', $user->password,time() + 3600);

			header('Location:public/acceuil.php');
			// mail($to,'subject : nouvelle demande',$message,$headers);
			exit();
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400' rel='stylesheet' type='text/css'>
		
		
		<title>Acceuil</title>
	</head>
	<body>
		<div class="register-wrap">
			<form action="#" method="post">
				<input type="text" name="name" placeholder="Name (bet. 2 and 15 char)" value="<?= $_POST['name']?>">
				<!-- affiche l'erreur au dessus du champs de saisis -->
				<?php if(array_key_exists('name', $errors)) {?> 
					<p class="error">
						<?php echo $errors['name']; ?> 
					</p>
				<?php } ?>
				<input type="text" name="lastname" placeholder="Lastname (bet. 8 and 20 char)" value="<?= $_POST['lastname']?>">
				<?php if(array_key_exists('lastname', $errors)) {?> 
					<p class="error">
						<?php echo $errors['lastname']; ?> 
					</p>
				<?php } ?>
				<input type="email" name="mail" placeholder="Mail" value="<?= $_POST['mail']?>" required>
				<input type="email" name="re_mail" placeholder="Confirm mail" value="<?= $_POST['re_mail']?>" required>
				<?php if(array_key_exists('mail', $errors)) {?> 
					<p class="error">
						<?php echo $errors['mail']; ?> 
					</p>
				<?php } ?>
				<input type="text" name="pseudo" placeholder="Pseudo" value="<?= $_POST['pseudo']?>">
				<?php if(array_key_exists('pseudo', $errors)) {?> 
					<p class="error">
						<?php echo $errors['pseudo']; ?> 
					</p>
				<?php } ?>
				<input type="password" name="password" placeholder="Password (bet. 8 and 15 char), 1upper, 1 nmbr" value="<?= $_POST['password']?>">
				<input type="password" name="re_password" placeholder="Confirm password" value="<?= $_POST['re_password']?>">
				<?php if(array_key_exists('password', $errors)) {?> 
					<p class="error">
						<?php echo $errors['password']; ?> 
					</p>
				<?php } ?>
			
				<input type="submit" value="valider">
			</form>
			<p class="text">Already registered ?</p>
			<a href="index.php"><button>Sign in</button></a>
		</div>
	</body>
</html>