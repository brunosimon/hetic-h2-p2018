<?php
	require 'inc/config.php';

	if(!empty($_GET['votes']))
	{
		$prepare = $pdo->prepare( 'UPDATE quizz_table SET votes = votes + 1 WHERE id = :id' );
		$prepare->bindValue(':id',$_GET['votes']);
		$prepare->execute();
		header('Location: question2.php'); 
		exit;
	}

	$query = $pdo->query( 'SELECT * FROM quizz_table WHERE question = 1' );
	$quizz_table = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Quizz Super-Héros</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="container">
			<?php foreach($quizz_table as $_quizz): ?>
				<div class="responses">
					<div class="text"><?= $_quizz->name ?></div>
					<a href="?votes=<?=$_quizz->id ?>"><img class="img" src="<?=$_quizz->img ?>" alt=""></a>
				</div>
			<?php endforeach; ?>
		</div>
	</body>
</html>

