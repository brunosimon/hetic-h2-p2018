<?php 
	require 'config.php';
	require 'forgot.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Home page</title>
		<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/index.css">
	</head>
	<body>
		<div class="left">
			<h1>Veuillez saisir votre e-mail pour récuperer votre mot de passe</h1>
			<!-- <img src="img/all_logo1.png" alt="test"> -->
			<canvas class="locker" width="400" height="500"></canvas>
		</div>
		<div class="right">
			<h2>Accès espace membre</h2>
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
				<div class="field <?= array_key_exists('email', $errors) ? 'error' : '' ?>">
					<label for="email">Mail</label>
					<input type="email" name="email" id="email" value="<?= $_POST['email']; ?>">					
				</div>
				
				<div class="links">
					<div class="back link"><a href="index.php">Se connecter</a></div>
					<div class="subscribe link"><a href="inscription.php">Pas encore inscrit ?</a></div>	
				</div>

				<input type="submit" value="CONNEXION" id="submit">
			</form>
		</div>
		
		<script type="text/javascript" src="js/polyfill.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>

