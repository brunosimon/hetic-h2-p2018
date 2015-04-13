<?php
	require 'inc/config.php';
	//Est-ce qu'il y a des données qui sont envoyés ?
	
	if(!empty($_POST))
	{
		$name_table = $_POST['name_quiz'];
		$_SESSION["name_quiz"] = $name_table;
		$_SESSION["num_question"] = 0;
		$name_table = str_replace(' ', '_', $name_table);
		$name_table = str_replace('?', 'itg', $name_table);
		$name_table = str_replace("'", 'apsph', $name_table);
		$prepare = $pdo->prepare("CREATE TABLE ".$name_table." (
			id int(11) NOT NULL AUTO_INCREMENT,
			num_question int(11) NOT NULL,
			name_question varchar(255) NOT NULL,
			num_answer int(11) NOT NULL,
			name_answer varchar(255) NOT NULL,
			correct tinyint(1) NOT NULL,
			vote int(11) NOT NULL,
			link_img varchar(255) NOT NULL,
			PRIMARY KEY (`id`) )");
		$prepare->execute();
		header ('location: question_init.php');
		exit();
	}
	?>
	<!DOCTYPE html>
	<html lang="fr-fr">
	<head>
		<meta charset="UTF-8">
		<title>Template PHP - 1</title>
		<link rel="stylesheet" href="css/createquiz/style.css"/>
		<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<header>
			<h1 class="title">Hetiquiz</h1>
			<ul class="menu">
				<li>Acceuil</li>
				<li>Réalisation</li>
				<li>Contact</li>
			</ul>
		</header>
		<section class="container">
		<h2>Créer son quiz</h2>
			<form action="#" method="post">
				<h3>Choisissez un nom pour votre quiz</h3>
				<input type="text" name="name_quiz" id="text">
				<br>
				<input type="submit" value="GO" id="submit">
			</form>
		</section>
		<footer>
		</footer>
	</body>
	</html>