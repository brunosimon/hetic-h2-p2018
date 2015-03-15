<?php 
	require 'config.php';
	require 'subscribe.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Inscription</title>
		<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/index.css">
	</head>
	<body>
		<div class="left">
			<h1>Bienvenue, ici vous pouvez vous inscire !</h1>
			<!-- <img src="img/all_logo1.png" alt="test"> -->
			<canvas class="locker" width="400" height="500"></canvas>
		</div>
		<div class="right">
			<h2>Inscription</h2>

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
			<?php if(!empty($exists)){ ?>
			<div class="exists">
				<?php foreach($exists as $_exist){ ?>
				<p>
					<?php echo $_exist; ?>
				</p>
				<?php } ?>
			</div>
			<?php } ?>

			<form action="#" method="post">
				<div class="field <?= array_key_exists('pseudo', $errors) ? 'error' : '' ?>">
					<label for="pseudo">Pseudo</label>
					<input type="text" name="pseudo" id="pseudo" value="<?= $_POST['pseudo']; ?>">
				</div>

				<div class="field <?= array_key_exists('email', $errors) ? 'error' : '' ?>">
					<label for="email">Mail</label>
					<input type="email" name="email" id="email" value="<?= $_POST['email']; ?>">
				</div>

				<div class="field <?= array_key_exists('age', $errors) ? 'error' : '' ?>">
					<label for="age">Age</label>
					<input type="number" name="age" id="age" value="<?= $_POST['age']; ?>">
				</div>

				<div class="field <?= array_key_exists('phone', $errors) ? 'error' : '' ?>">
					<label for="phone">Phone number</label>
					<input type="tel" name="phone" id="phone" value="<?= $_POST['phone']; ?>">			
				</div>

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
				

				<input type="submit" id="submit">
			</form>
		</div>

		<script type="text/javascript" src="js/polyfill.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>

