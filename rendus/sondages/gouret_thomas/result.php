<?php
	require 'inc/config.php';

	$query = $pdo->query( 'SELECT * FROM quizz_table ORDER BY votes DESC' );
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
					<img class="img" src="<?=$_quizz->img ?>" alt="">
					<div class="text"><?= $_quizz->name ?><br/><br/><?= $_quizz->votes?></div>
				</div>
			<?php endforeach; ?>
		</div>
	</body>
</html>
