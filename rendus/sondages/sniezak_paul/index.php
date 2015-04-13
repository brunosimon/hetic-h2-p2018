<?php
	// show errors
	error_reporting(E_ALL); 
	ini_set("display_errors", 1);

	session_start();
	
	require_once 'inc/config.php';

	/*Création d'un nouveau hub*/
	// Execute toutes les vérifications ssi l'user submit avec l'input
	if(isset($_POST['submit'])) {
		// Vérification de la longueur
		if(strlen($_POST['hub']) < 5)
			$errors[] = "Hub name is too short";
	}

	// Permet de valider le formulaire et d'envoyer les données ssi il n'y a pas d'erreurs
	if(!empty($_POST)) {
		if(!empty($errors)) {
			foreach($errors as $_errors)
				echo '<p class="error">'.$_errors.'</p>';
		} else {
			// Variable qui stocke la date et l'heure actuelle
			$datetime = date("Y-m-d H:i:s", time());

			$name = $_POST['hub'];

			// On effectue un premier envoie à la bbcode_destroy(bbcode_container)
			$prepare = $pdo->prepare('INSERT INTO hubs (name) VALUES (:name)');
			$prepare->bindValue(':name', $name);
			$prepare->execute();

			// Récupération puis shortening de l'id et le name afin d'obtenir le lien de l'hub
			$query = $pdo->prepare('SELECT hub_id FROM hubs WHERE name = :name');
			$query->bindValue(':name', $name);
			$query->execute();
			$id_fetched = $query->fetch(PDO::FETCH_ASSOC);
			// Transforme le tableau fetché en une string
			$id = implode($id_fetched);

			// Met à jour la row pour prendre en compte le short
			$short = $id.$name;
			$_SESSION['short'] = $short;
			$query = $pdo->prepare('UPDATE hubs SET short = :short WHERE name = :name');
			$query->bindValue(':name', $name);
			$query->bindValue(':short', $short);
			$query->execute();

			// On redirige vers le hub en lui même
			$_SESSION['hub'] = $_POST['hub'];
			header('Location:  http://localhost/p2018/rendus/sondages/sniezak_paul/player.php');
			exit;
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Pimp My Playlist - Accueil</title>
		<link rel="stylesheet" href="src/css/reset.css">
		<link rel="stylesheet" href="src/css/style-index.css">
	</head>

	<body>
		<h1>Accueil</h1>
		
		<section class="site-container">
			<section class="card">
				<h2>Créer un hub</h2>

				<form class="form" action="#" method="POST">
					<div class="form_wrapper wow fadeInDown" data-wow-delay="0.5s">
						<input class="form_input" id="hub" type="text" name="hub">
						<label class="form_label" for="hub">
							<span class="form_label-content">Hub</span>
						</label>
					</div>
					<div class="form_wrapper--submit">
			    	<div class="form_input-submit">
			        	<button type="submit" name="submit" class="btn btn-block">Submit</button>
			        </div>
			    </div>
				</form>

				<a href="connection.php">Se connecter à un hub déjà existant</a>
			</section>
		</section>
	</body>
</html>