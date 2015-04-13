<?php

	require 'inc/config.php';

	setcookie('mon_cookie', $_COOKIE['mon_cookie'] + 1 );

	$i = $_COOKIE['mon_cookie'];


// if votes sent
	if(!empty($_GET['votes']))
	{
		// update votes
		$_SESSION['votes'][$i] = $_GET['votes'];
		$prepare = $pdo->prepare( 'UPDATE cat_quiz_table SET votes = votes + 1 WHERE id = :id' );
		$prepare->bindValue(':id',$_GET['votes']);
		$prepare->execute();
	}


// Exit of questions

	if ($_COOKIE['mon_cookie'] >= 11)
	{
		header('Location: result.php'); 
		exit();
	}

// get all cat_quiz_table
	$query = $pdo->query( 'SELECT * FROM cat_quiz_table WHERE question_id = '.$i.'' );
	$cat_quiz_table = $query->fetchAll();


	$ratioA = round((($cat_quiz_table[0]->votes) / ($cat_quiz_table[0]->votes + $cat_quiz_table[1]->votes)) * 100);
	$ratioB = round((($cat_quiz_table[1]->votes) / ($cat_quiz_table[0]->votes + $cat_quiz_table[1]->votes)) * 100);




?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Des chats à HETIC</title>
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="container">
			<div class="text">- Attention recharger la page cause un dérèglement de la machine et provoque une fuite radioactive -</div>
			<div class="text"><?= $cat_quiz_table[0]->question ?></div>




			<?php foreach($cat_quiz_table as $_question): ?>
				<div class="responses">
					<div class="text"><?= $_question->response ?></div>
					<a href="?votes=<?=$_question->id ?>"><img class="gif" src="<?=$_question->url ?>" alt=""></a>
				</div>
			<?php endforeach; ?>




			
		<div class="text">Taux de réponses :<br><br>Réponse A : <?= $ratioA ?>% Réponse B : <?= $ratioB ?>%</div>
		</div>
	</body>
</html>