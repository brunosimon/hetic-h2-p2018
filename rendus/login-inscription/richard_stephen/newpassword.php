<?php 
	require 'config.php';
	require 'password.php';

	$forgot_key = $_GET['key'];
	$id = $_GET['id'];

	$query = $pdo->query("SELECT * FROM member WHERE forgot_key = '$forgot_key'");
	$infos = $query->fetch();
	if(!empty($infos)){
		// Define session id, i'll use it into password.php
		$_SESSION['id'] = $infos->id_membre;
		//Display password change form
	?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Changement de mot de passe</title>
		<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/index.css">
	</head>
	<body>
		<div class="left">
			<h1>Ici vous pouvez changer votre mot de passe</h1>
			<!-- <img src="img/all_logo1.png" alt="test"> -->
			<canvas class="locker" width="400" height="500"></canvas>
		</div>
		<div class="right">
			<h2>Nouveau mot de passe</h2>
			<?php if(!empty($errors)){ ?>
		<div class="errors">
			<?php foreach($errors as $_error){ ?>
				<p>
					<?php echo $_error; ?>
				</p>
			<?php } ?>
		</div>
		<?php } ?>
		<?php if(!empty($success)){ ?>
			<div class="success">
				<?php foreach($success as $_success){ ?>
					<p>
						<?php echo $_success; ?>
					</p>
				<?php } ?>
			</div>
			<?php } ?>
			<form action="#" method="post">
				<div class="field <?= array_key_exists('password', $errors) ? 'error' : '' ?>">
					<label for="password">Password</label>
					<input type="password" name="password" id="password">
				</div>

				<div class="field <?= array_key_exists('confirm_password', $errors) ? 'error' : '' ?>">			
					<label for="confirm-password">Confirm password</label>
					<input type="password" name="confirm_password" id="confirm-password">
				</div>

				<div class="links">
					<div class="forgot link"><a href="">Mot de passe oublié ?</a></div>
					<div class="back link"><a href="index.php">Retour à l'accueil</a></div>
				</div>

				<input type="submit" value="VALIDER" id="submit">
			</form>

<?php
	}else{
		//Redirrect to index
		header('Location : index.php');
	}
?>

		</div>

		<script type="text/javascript" src="js/polyfill.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>