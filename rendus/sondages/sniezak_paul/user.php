<?php
	session_start();

	require_once 'inc/config.php';

	// Permet d'envoyer une proposition à la bdd
	if(!empty($_GET)) {
		$prepare = $pdo->prepare('INSERT INTO propositions (url,hub) VALUES (:url,:hub)');
		$prepare->bindValue(':url', $_GET['src']);
		$prepare->bindValue(':hub', $_SESSION['hub']);
		$prepare->execute();

		header('Location:  http://localhost/p2018/rendus/sondages/sniezak_paul/voting.php');
		exit;
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Propositions</title>
		<link rel="stylesheet" href="src/css/reset.css">
		<link rel="stylesheet" href="src/css/style-index.css"> 
	</head>

	<body>
		<h1>Propositions</h1>
		
		<section class="site-container">
			<section class="card">
				<h2>Bienvenue : <?= $_SESSION['username'] ?> !</h2>

				<form class="form" action="#" method="GET">
					<div class="form_wrapper wow fadeInDown" data-wow-delay="0.5s">
						<input class="form_input" id="username" type="text" name="search">
						<label class="form_label" for="username">
							<span class="form_label-content">Recherche</span>
						</label>
					</div>
					<div class="form_wrapper--submit">
				    	<div class="form_input-submit">
				        	<button type="submit" name="submit" class="btn btn-block">Proposer</button>
				        </div>
			    	</div>
			    	<div id="result" style="text-align: center;"></div>
				</form>
			</section>
		</section>

		

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="src/js/user.js"></script>
	</body>
</html>