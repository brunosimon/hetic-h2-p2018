<?php
	require 'inc/config.php';
	//Recover the name of the question which was created.
		$name_table = $_SESSION["name_quiz"];
		//Recover the number of the question that we want to create (+1 for the first question etc.)
		
	if(!empty($_POST))
    {
    	$name_table = str_replace(' ', '_', $name_table);
		$name_table = str_replace('?', 'itg', $name_table);
		$name_table = str_replace("'", 'apsph', $name_table);
    	$_SESSION["num_question"] = $_SESSION["num_question"]+1;
	    $question = $_POST['question'];
	    $question = str_replace(' ', '_', $question);
		$question = str_replace('?', 'itg', $question);
		$question = str_replace("'", 'apsph', $question);
		$answer1 = $_POST['answer1'];
		$answer1 = str_replace(' ', '_', $answer1);
		$answer1 = str_replace('?', 'itg', $answer1);
		$answer1 = str_replace("'", 'apsph', $answer1);
		$answer2 = $_POST['answer2'];
		$answer2 = str_replace(' ', '_', $answer2);
		$answer2 = str_replace('?', 'itg', $answer2);
		$answer2 = str_replace("'", 'apsph', $answer2);
		$answer3 = $_POST['answer3'];
		$answer3 = str_replace(' ', '_', $answer3);
		$answer3 = str_replace('?', 'itg', $answer3);
		$answer3 = str_replace("'", 'apsph', $answer3);
		$answer4 = $_POST['answer4'];
		$answer4 = str_replace(' ', '_', $answer4);
		$answer4 = str_replace('?', 'itg', $answer4);
		$answer4 = str_replace("'", 'apsph', $answer4);
		$type = $_POST['type'];
		$type = str_replace(' ', '_', $type);
		$type = str_replace('?', 'itg', $type);
		$type = str_replace("'", 'apsph', $type);
		$correct = $_POST['correct'];
		$correct = str_replace(' ', '_', $correct);
		$correct = str_replace('?', 'itg', $correct);
		$correct = str_replace("'", 'apsph', $correct);
		$link = $_POST['link_img'];
		$link = str_replace(' ', '_', $link);
		$link = str_replace('?', 'itg', $link);
		$link = str_replace("'", 'apsph', $link);
		
		if($type == 'mc')
		{
			if($correct === "answer1"){
				$prepare = $pdo->prepare("INSERT INTO ".$name_table."(num_question, name_question, num_answer, name_answer, correct, vote, link_img) VALUES ( :num_question, :name_question, 1, :name_answer, 1, 0, :link)");
				$prepare->bindValue(':num_question',$_SESSION['num_question']);
				$prepare->bindValue(':name_question',$question);
				$prepare->bindValue(':name_answer',$answer1);
				$prepare->bindValue(':link', $link);
				$prepare->execute();

				$prepare = $pdo->prepare("INSERT INTO ".$name_table."(num_question, name_question, num_answer, name_answer, correct, vote, link_img) VALUES ( :num_question, :name_question, 2, :name_answer, 0, 0, :link)");
				$prepare->bindValue(':num_question',$_SESSION['num_question']);
				$prepare->bindValue(':name_question',$question);
				$prepare->bindValue(':name_answer',$answer2);
				$prepare->bindValue(':link', $link);
				$prepare->execute();

				$prepare = $pdo->prepare("INSERT INTO ".$name_table."(num_question, name_question, num_answer, name_answer, correct, vote, link_img) VALUES ( :num_question, :name_question, 3, :name_answer, 0, 0, :link)");
				$prepare->bindValue(':num_question',$_SESSION['num_question']);
				$prepare->bindValue(':name_question',$question);
				$prepare->bindValue(':name_answer',$answer3);
				$prepare->bindValue(':link', $link);
				$prepare->execute();

				$prepare = $pdo->prepare("INSERT INTO ".$name_table."(num_question, name_question, num_answer, name_answer, correct, vote, link_img) VALUES ( :num_question, :name_question, 4, :name_answer, 0, 0, :link)");
				$prepare->bindValue(':num_question',$_SESSION['num_question']);
				$prepare->bindValue(':name_question',$question);
				$prepare->bindValue(':name_answer',$answer4);
				$prepare->bindValue(':link', $link);
				$prepare->execute();
			}
			if($correct === "answer2"){
				$prepare = $pdo->prepare("INSERT INTO ".$name_table."(num_question, name_question, num_answer, name_answer, correct, vote, link_img) VALUES ( :num_question, :name_question, 1, :name_answer, 0, 0, :link)");
				$prepare->bindValue(':num_question',$_SESSION['num_question']);
				$prepare->bindValue(':name_question',$question);
				$prepare->bindValue(':name_answer',$answer1);
				$prepare->bindValue(':link', $link);
				$prepare->execute();

				$prepare = $pdo->prepare("INSERT INTO ".$name_table."(num_question, name_question, num_answer, name_answer, correct, vote, link_img) VALUES ( :num_question, :name_question, 2, :name_answer, 1, 0, :link)");
				$prepare->bindValue(':num_question',$_SESSION['num_question']);
				$prepare->bindValue(':name_question',$question);
				$prepare->bindValue(':name_answer',$answer2);
				$prepare->bindValue(':link', $link);
				$prepare->execute();

				$prepare = $pdo->prepare("INSERT INTO ".$name_table."(num_question, name_question, num_answer, name_answer, correct, vote, link_img) VALUES ( :num_question, :name_question, 3, :name_answer, 0, 0, :link)");
				$prepare->bindValue(':num_question',$_SESSION['num_question']);
				$prepare->bindValue(':name_question',$question);
				$prepare->bindValue(':name_answer',$answer3);
				$prepare->bindValue(':link', $link);
				$prepare->execute();

				$prepare = $pdo->prepare("INSERT INTO ".$name_table."(num_question, name_question, num_answer, name_answer, correct, vote, link_img) VALUES ( :num_question, :name_question, 4, :name_answer, 0, 0, :link)");
				$prepare->bindValue(':num_question',$_SESSION['num_question']);
				$prepare->bindValue(':name_question',$question);
				$prepare->bindValue(':name_answer',$answer4);
				$prepare->bindValue(':link', $link);
				$prepare->execute();
			}
			if($correct === "answer3"){
				$prepare = $pdo->prepare("INSERT INTO ".$name_table."(num_question, name_question, num_answer, name_answer, correct, vote, link_img) VALUES ( :num_question, :name_question, 1, :name_answer, 0, 0, :link)");
				$prepare->bindValue(':num_question',$_SESSION['num_question']);
				$prepare->bindValue(':name_question',$question);
				$prepare->bindValue(':name_answer',$answer1);
				$prepare->bindValue(':link', $link);
				$prepare->execute();

				$prepare = $pdo->prepare("INSERT INTO ".$name_table."(num_question, name_question, num_answer, name_answer, correct, vote, link_img) VALUES ( :num_question, :name_question, 2, :name_answer, 0, 0, :link)");
				$prepare->bindValue(':num_question',$_SESSION['num_question']);
				$prepare->bindValue(':name_question',$question);
				$prepare->bindValue(':name_answer',$answer2);
				$prepare->bindValue(':link', $link);
				$prepare->execute();

				$prepare = $pdo->prepare("INSERT INTO ".$name_table."(num_question, name_question, num_answer, name_answer, correct, vote, link_img) VALUES ( :num_question, :name_question, 3, :name_answer, 3, 0, :link)");
				$prepare->bindValue(':num_question',$_SESSION['num_question']);
				$prepare->bindValue(':name_question',$question);
				$prepare->bindValue(':name_answer',$answer3);
				$prepare->bindValue(':link', $link);
				$prepare->execute();

				$prepare = $pdo->prepare("INSERT INTO ".$name_table."(num_question, name_question, num_answer, name_answer, correct, vote, link_img) VALUES ( :num_question, :name_question, 4, :name_answer, 0, 0, :link)");
				$prepare->bindValue(':num_question',$_SESSION['num_question']);
				$prepare->bindValue(':name_question',$question);
				$prepare->bindValue(':name_answer',$answer4);
				$prepare->bindValue(':link', $link);
				$prepare->execute();
			}
			if($correct === "answer4"){
				$prepare = $pdo->prepare("INSERT INTO ".$name_table."(num_question, name_question, num_answer, name_answer, correct, vote, link_img) VALUES ( :num_question, :name_question, 1, :name_answer, 0, 0, :link)");
				$prepare->bindValue(':num_question',$_SESSION['num_question']);
				$prepare->bindValue(':name_question',$question);
				$prepare->bindValue(':name_answer',$answer1);
				$prepare->bindValue(':link', $link);
				$prepare->execute();

				$prepare = $pdo->prepare("INSERT INTO ".$name_table."(num_question, name_question, num_answer, name_answer, correct, vote, link_img) VALUES ( :num_question, :name_question, 2, :name_answer, 0, 0, :link)");
				$prepare->bindValue(':num_question',$_SESSION['num_question']);
				$prepare->bindValue(':name_question',$question);
				$prepare->bindValue(':name_answer',$answer2);
				$prepare->bindValue(':link', $link);
				$prepare->execute();

				$prepare = $pdo->prepare("INSERT INTO ".$name_table."(num_question, name_question, num_answer, name_answer, correct, vote, link_img) VALUES ( :num_question, :name_question, 3, :name_answer, 0, 0, :link)");
				$prepare->bindValue(':num_question',$_SESSION['num_question']);
				$prepare->bindValue(':name_question',$question);
				$prepare->bindValue(':name_answer',$answer3);
				$prepare->bindValue(':link', $link);
				$prepare->execute();

				$prepare = $pdo->prepare("INSERT INTO ".$name_table."(num_question, name_question, num_answer, name_answer, correct, vote, link_img) VALUES ( :num_question, :name_question, 4, :name_answer, 1, 0, :link)");
				$prepare->bindValue(':num_question',$_SESSION['num_question']);
				$prepare->bindValue(':name_question',$question);
				$prepare->bindValue(':name_answer',$answer4);
				$prepare->bindValue(':link', $link);
				$prepare->execute();
			}
		}
		if($type == 'tf')
		{
			if($correct === "answer1"){
				$prepare = $pdo->prepare("INSERT INTO ".$name_table."(num_question, name_question, num_answer, name_answer, correct, vote, link_img) VALUES ( :num_question, :name_question, 1, :name_answer, 1, 0, :link)");
				$prepare->bindValue(':num_question',$_SESSION['num_question']);
				$prepare->bindValue(':name_question',$question);
				$prepare->bindValue(':name_answer',$answer1);
				$prepare->bindValue(':link', $link);
				$prepare->execute();

				$prepare = $pdo->prepare("INSERT INTO ".$name_table."(num_question, name_question, num_answer, name_answer, correct, vote, link_img) VALUES ( :num_question, :name_question, 2, :name_answer, 0, 0, :link)");
				$prepare->bindValue(':num_question',$_SESSION['num_question']);
				$prepare->bindValue(':name_question',$question);
				$prepare->bindValue(':name_answer',$answer2);
				$prepare->bindValue(':link', $link);
				$prepare->execute();
			}
			if($correct === "answer2"){
				$prepare = $pdo->prepare("INSERT INTO ".$name_table."(num_question, name_question, num_answer, name_answer, correct, vote, link_img) VALUES ( :num_question, :name_question, 1, :name_answer, 0, 0, :link)");
				$prepare->bindValue(':num_question',$_SESSION['num_question']);
				$prepare->bindValue(':name_question',$question);
				$prepare->bindValue(':name_answer',$answer1);
				$prepare->bindValue(':link', $link);
				$prepare->execute();

				$prepare = $pdo->prepare("INSERT INTO ".$name_table."(num_question, name_question, num_answer, name_answer, correct, vote, link_img) VALUES ( :num_question, :name_question, 2, :name_answer, 1, 0, :link)");
				$prepare->bindValue(':num_question',$_SESSION['num_question']);
				$prepare->bindValue(':name_question',$question);
				$prepare->bindValue(':name_answer',$answer2);
				$prepare->bindValue(':link', $link);
				$prepare->execute();
			}	
		}
	}
?>
	<!DOCTYPE html>
	<html lang="fr-fr">
	<head>
		<meta charset="UTF-8">
		<title>Template PHP - 1</title>
		<link rel="stylesheet" href="css/createquestion/style.css"/>
		<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
		<script>
		function showSection (div_click, div_vanish)
		{
			document.getElementById(div_click).style.display = 'block';
			document.getElementById(div_vanish).style.display ='none';
		}
		</script>
	</head>
	<body>
		<header>
			<h1 class="title">Hetiquiz</h1>
		</header>
		<div class="container">
			<h2>Créer votre quiz</h2>
			<h2>Titre du quiz : <?= $_SESSION["name_quiz"] ?></h2>
			<h3>Question n°<?= $_SESSION["num_question"]+1 ?></h3>
			<div class="button">
				<button class="mc" onclick="showSection('mc', 'tf')">Choix multiple</button>
				<button class="tf" onclick="showSection('tf', 'mc')">Vrai ou Faux</button>
			</div>
			<section id="mc">
				<form action="#" method="post">
					<div class="special_titre">
						<label for="title">Titre de la question</label>
						<input type="text" name="question" class="question_name" autocomplete="off">
					</div>
					<div class="special_rep">
						<label for="reponse">Mettez les réponses au choix</label>
						<ul>
							<li><input type="text" name="answer1" class="answer" autocomplete="off"><input type="radio" name="correct" value="answer1"></li>
							<li><input type="text" name="answer2" class="answer"autocomplete="off"><input type="radio" name="correct" value="answer2"></li>
							<li><input type="text" name="answer3" class="answer"autocomplete="off"><input type="radio" name="correct" value="answer3"></li>
							<li><input type="text" name="answer4" class="answer"autocomplete="off"><input type="radio" name="correct" value="answer4"></li>
						</ul>
					</div>
					<div class="submit">
						<label for="link_img">Mettez le lien de l'image que vous souhaitez (bug en ce moment, mettez juste un caractère)</label>
						<input type="text" name="link_img" id="link" autocomplete="off">
						<input type="hidden" name="type" value="tf">
						<input type="submit" name="submit" class="button_submit" value="Je valide ma question">
					</div>
				</form>
			</section>
			<section id="tf">
				<form action="#" method="post">
					<div class="special_titre">
						<label for="title">Titre de la question</label>
						<input type="text" name="question" class="question_name" autocomplete="off">
					</div>
					<div class="special_rep">
						<label for="reponse">Mettez les réponses au choix</label>
						<ul>
							<li><input type="text" name="answer1" class="answer" value="Vrai" autocomplete="off"><input type="radio" name="correct" value="answer1"></li>
							<li><input type="text" name="answer2" class="answer" value="Faux" autocomplete="off"><input type="radio" name="correct" value="answer2"></li>
						</ul>
					</div>
					<div class="submit">
					<label for="link_img">Mettez le lien de l'image que vous souhaitez (bug en ce moment, mettez juste un caractère)</label>
						<input type="text" name="link_img" id="link" autocomplete="off">
						<input type="hidden" name="type" value="tf">
						<input type="submit" name="submit" class="button_submit" value="Je valide ma question">
					</div>
				</form>
			</section>
			<button id="validation" src="accueil.php" class="button_submit">Je valide le quiz</button>
		</div>
		<footer>
		</footer>
	</body>
	</html>