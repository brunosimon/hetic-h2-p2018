<?php
	session_start();

	require_once('inc/config.php');

	// Demande l'identifiant de l'user : si l'user existe déjà, on le reconnecte, sinon on l'add à la bdd
	if(!empty($_POST)) {
		$username_check = $pdo->prepare('SELECT username FROM users WHERE username = :username');
		$username_check->bindValue(':username', $_POST['username']);
		$username_check->execute();
		$username_fetch = $username_check->fetch(PDO::FETCH_ASSOC);

		if(!empty($username_fetch['username']))
			echo 'Rebonjour '.$username_fetch['username']. ' !';
		else {
			$prepare = $pdo->prepare('INSERT INTO users (username,hub) VALUES (:username,:hub)');
			$prepare->bindValue(':username', $_POST['username']);
			$prepare->bindValue(':hub', $_SESSION['hub']);
			$prepare->execute();
		}

		$_SESSION['username'] = $_POST['username'];
		header('Location:  http://localhost/p2018/rendus/sondages/sniezak_paul/user.php');
		exit;
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Identification</title>
		<link rel="stylesheet" href="src/css/reset.css">
		<link rel="stylesheet" href="src/css/style-index.css"> 
	</head>

	<body>
		<h1>Connexion</h1>
		
		<section class="site-container">
			<section class="card">
				<h2>Hub : <?= $_SESSION['hub'] ?> !</h2>

				<form class="form" action="#" method="POST">
					<div class="form_wrapper wow fadeInDown" data-wow-delay="0.5s">
						<input class="form_input" id="username" type="text" name="username">
						<label class="form_label" for="username">
							<span class="form_label-content">Identifiant</span>
						</label>
					</div>
					<div class="form_wrapper--submit">
			    	<div class="form_input-submit">
			        	<button type="submit" name="submit" class="btn btn-block">Rejoindre</button>
			        </div>
			    </div>
				</form>
			</section>
		</section>
	</body>
</html>