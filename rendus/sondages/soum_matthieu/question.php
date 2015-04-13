<?php
	require 'inc/config.php';
	//This is for recover the name of the quiz + at which question we are.
	$_SESSION["num_question"] = $_SESSION["num_question"]+1;
	$number_question = $_SESSION["num_question"];
	$title_idQuiz = $_SESSION["name_quiz"];
	$title_idQuiz = str_replace(' ', '_', $title_idQuiz);
	$title_idQuiz = str_replace('?', 'itg', $title_idQuiz);
	$title_idQuiz = str_replace("'", 'apsph', $title_idQuiz);	
	$prepare = $pdo->prepare('SELECT * FROM '.$title_idQuiz.' WHERE num_question = '.$number_question.'');
	$prepare->execute();
	$question = $prepare->fetchAll();

	//Get the Max number question.
	$query = $pdo->query('SELECT MAX(num_question) AS total FROM '.$title_idQuiz.'');
	$total = $query->fetch()->total;
	$_SESSION["max_question"] = $total;

		if($_SESSION["num_question"]>$total)
		{
			$_SESSION["num_question"] = $_SESSION["num_question"]-1;
			header('Location: end.php');
		}

	//If vote sent
	if(!empty($_GET['vote']))
	{
		$prepare = $pdo->prepare('UPDATE '.$title_idQuiz.' SET vote = vote + 1 WHERE id = :id');
		$prepare->bindValue(':id',$_GET['vote']);
		$prepare->execute();
		$query = $pdo->query('SELECT correct FROM '.$title_idQuiz.' WHERE id = '.$_GET['vote'].'' );
		$correct = $query->fetch()->correct;
		$_SESSION["nb_pts"] = $_SESSION["nb_pts"] + $correct ;
		//Keep the value of good answers
	}
?>
<!DOCTYPE html>
<html lang="fr-fr">
<head>
	<meta charset="UTF-8">
	<title>Sélection du quiz</title>
	<link rel="stylesheet" href="css/selectquestion/style.css"/>
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
		<h2>Question <?=$number_question;?></h2>
		<form action="#" method="get">
			<label><?=
				$question[0]->name_question?></label>
			<br>
			<?php
				$cherche = Array('_','itg','apsph');
				$remplace = Array(' ','?',"'");
			foreach($question as $one_answer): ?>
			<a href="?vote=<?=$one_answer->id ?>"><div class="answer"><?= 
			$one_answer->name_answer = str_replace($cherche, $remplace, $one_answer->name_answer); ?></div></a>
			<?php endforeach; ?>
		</form>
	</section>
	<footer>
	</footer>
</body>
</html>