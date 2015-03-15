<?php 
	session_start(); 
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,600,700,400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>MyAudioReact - Login</title>
</head>
<body>
	<div class="header">
		<div class="wrapper">
			<h1 class="logo">MyAudioReact</h1>
			<div class="form_login">
				<h2 class="title_login">Log in</h2>
				<form class="fields_login" name="inscription" action="login.php" method="POST">
					<input required id="mail" type="text" name="mail" placeholder="mail">
					<input required id="password" type="password" name="password" placeholder="password">
					<input id="connect" type="submit" value="Login" class="submit">
				</form>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="wrapper">
			<div class="form_inscription">
				<h2 class="title_inscription">Join us</h2>
				<form name="inscription" action="inscription.php" method="POST">
					<input class="fields_inscription" required id="name" type="text" name="name" placeholder="Name">
					<input class="fields_inscription" required id="age" type="number" name="age" placeholder="Age">
					<input class="fields_inscription" required id="email" type="text" name="mail" placeholder="Mail">
					<input class="fields_inscription" required id="password" type="password" name="password" placeholder="Password">
					<input class="fields_inscription" required id="password_check" type="password" name="password_check" placeholder="Password">
					<input class="fields_inscription submit" id="inscription" required type="submit" value="Sign Up">
				</form>
			</div>
			<div class="about">
				<h2 class="title_about">About MyAudioReact</h2>
				<h3 class="post_title_about">Who we are, what we do and why we're here.</h3>
				<p class="article_about">MyAudioReact is an active community and resource for training. We want to make audio react effects more accessible and effective by creating a sweet database that show you way more than you never expected. We also work to develop tools to streamline your creative workflow and to help remove tedious and repetitive tasks so you can spend time making great work.</p>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<?php if(array_key_exists('errors', $_SESSION)): ?>
		<div class="alert">
			<?= implode('<br>', $_SESSION['errors']); ?>
		</div>
	<?php unset($_SESSION['errors']); endif;?>

	<?php if(array_key_exists('thanks', $_SESSION)): ?>
		<div class="alert_green">
			<?= $_SESSION['thanks'] ?>
		</div>
	<?php unset($_SESSION['thanks']); endif;?>
</body>
</html>