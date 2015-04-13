<?php
	require 'inc/config.php';
	//Est-ce qu'il y a des données qui sont envoyés ?
	$title_idQuiz = $_SESSION["name_quiz"];
	//Set ratio of good answers in percentage ! (Sounds great)
	$percent = (($_SESSION["nb_pts"] / $_SESSION["num_question"])*100);
	$prepare = $pdo2->prepare("SELECT * FROM users WHERE name_quiz = '$title_idQuiz' ORDER BY id DESC LIMIT 5");
	$prepare->execute();
	$score = $prepare->fetchAll();
	if(!empty($_POST))
	{
		$username = $_POST['name_player'];
		$prepare = $pdo2->prepare('INSERT INTO users (user, ratio, name_quiz) VALUES (:user, :ratio, :name_quiz)');
		$prepare->bindValue(':user', $username);
		$prepare->bindValue(':ratio', $percent);
		$prepare->bindValue(':name_quiz', $title_idQuiz);
		$prepare->execute();
		$test = $prepare->fetch();
		header ('location: accueil.php');
		exit();
	}
	
?>
<!DOCTYPE html>
<html lang="fr-fr">
<head>
	<meta charset="UTF-8">
	<title>Sélection du quiz</title>
	<link rel="stylesheet" href="css/end/style.css"/>
	<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
	<header>
		<h1 class="title">Hetiquiz</h1>
	</header>
	<section class="container">
		<h2>Fin du quiz</h2>
		<p>Voici le résultat de votre quizz</p>
		<p id="score"><?= $_SESSION["nb_pts"] ?> / <?= $_SESSION["num_question"]?></p>
		<p>Soit un score de <?= $percent?> % de bonne réponse.</p>
		<form action="#" method="post">
			<label>Quel est votre nom ?</label>
			<br>
			<input type="text" name="name_player" id="name" autocomplete"off">
			<input type="submit" class="button" value="Revenir à la page d'accueil">
		</form>
		<table>
			<thead>
				<tr>
					<th>Nom du joueur</th>
					<th>Le nom du quizz</th>
					<th>Score en %</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach($score as $one_score): ?>	
					<tr>
						<td><?= $one_score->user; ?></td>
						<td><?= $one_score->name_quiz; ?></td>
						<td><?= $one_score->ratio; ?> %</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>	
	</section>
	<footer>
	</footer>
</body>
</html>