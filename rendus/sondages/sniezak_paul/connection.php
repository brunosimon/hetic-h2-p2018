<?php
	session_start();

	require_once('inc/config.php');

	if(!empty($_POST)) {
		// Vérifie si le hub existe et ssi oui, permet la connexion à celui-ci
		$prepare = $pdo->prepare('SELECT * FROM hubs WHERE short = :short');
		$prepare->bindValue(':short', $_POST['hub']);
		$prepare->execute();
		$hub_fetch = $prepare->fetch(PDO::FETCH_ASSOC);

		if(empty($hub_fetch)) {
			echo 'Ce hub n\'existe pas !';
		} else {
			$_SESSION['hub'] = $hub_fetch['name'];
			header('Location:  http://localhost/p2018/rendus/sondages/sniezak_paul/username.php');
			exit;
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Connexion</title>
		<link rel="stylesheet" href="src/css/reset.css">
		<link rel="stylesheet" href="src/css/style-index.css">
	</head>

	<body>
		<h1>Connexion</h1>
		
		<section class="site-container">
			<section class="card">
				<h2>Rejoindre un hub</h2>

				<form class="form" action="#" method="POST">
					<div class="form_wrapper wow fadeInDown" data-wow-delay="0.5s">
						<input class="form_input" id="hub" type="text" name="hub">
						<label class="form_label" for="hub">
							<span class="form_label-content">Hub</span>
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