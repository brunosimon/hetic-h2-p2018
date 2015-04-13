<?php
	require 'inc/config.php';
	//Est-ce qu'il y a des données qui sont envoyés ?
	$prepare = $pdo->prepare("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'bdd_quiz'");
	$prepare->execute();
	$name_quiz = $prepare->fetchAll();
	if(!empty($_GET['name']))
	{
		//This is for recover the name of the quiz
		$_SESSION["name_quiz"] = $_GET['name'];
		$_SESSION["num_question"] = 0;
		$_SESSION["nb_pts"] = 0;
		header ('location: question.php');
		exit();
	}

	?>
	<!DOCTYPE html>
	<html lang="fr-fr">
	<head>
		<meta charset="UTF-8">
		<title>Sélection du quiz</title>
		<link rel="stylesheet" href="css/selectquiz/style.css"/>
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
			<h2>Veuillez choisir votre quiz</h2>
				<div class="nameQuiz">
					<?php $cherche = Array('_','itg','apsph');
						$remplace = Array(' ','?',"'");
					foreach($name_quiz AS $one_name_quiz): ?>
						<a href="?name=<?= $one_name_quiz->TABLE_NAME ?>">
							<div class="button">
								<?=$one_name_quiz->TABLE_NAME = str_replace($cherche, $remplace, $one_name_quiz->TABLE_NAME);?>
							</div>
						 </a>
				
				<?php endforeach; ?>
				</div>
		</section>
		<footer>
		</footer>
	</body>
	</html>