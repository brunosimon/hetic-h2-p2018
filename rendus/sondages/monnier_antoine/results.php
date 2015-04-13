<?php

require 'inc/config.php';

	$query = $pdo->query('SELECT * FROM candidates ORDER BY votes DESC LIMIT 0,20');
	$candidates = $query->fetchAll();

	$query = $pdo->query('SELECT SUM(votes) total_votes FROM candidates');
	$total_votes = $query->fetch()->total_votes;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Résultats</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="normalize.css">
</head>
<body>

	<div class="title">
		Résultats
	</div>
	<?php foreach ($candidates as $_candidate): ?>
		<div class="winners">
			<?= $_candidate->name ?>
			<div class="score">
				 <?= $_candidate->votes ?>
			</div>
		</div>
	<?php endforeach; ?>

	<div>Total <?=$total_votes ?></div>  (<?= $_candidate->votes ?>)  

	<a class='buttonvote' href="index.php">Voter</a>
</body>
</html>