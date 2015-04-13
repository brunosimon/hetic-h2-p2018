<?php

require 'inc/config.php';

$player1 = 0;
$player2 = 0;
$player3 = 0;
$player4 = 0;	

while ($player1==$player2 || $player1==$player3 || $player1==$player4 || $player2==$player3 || $player2==$player4 || $player3==$player4) {
	$player1 = rand(1, 75);
	$player2 = rand(1, 75);
	$player3 = rand(1, 75);
	$player4 = rand(1, 75);	
}

if(!empty($_GET['vote']))
{
	$prepare = $pdo->prepare('UPDATE candidates SET votes = votes + 1 WHERE id = :id');
	$prepare->bindValue('id', $_GET['vote']);
	$prepare->execute();

}

	$query = $pdo->query('SELECT * FROM candidates ORDER BY RAND() LIMIT 4');
	$candidates = $query->fetchAll();

	echo '<pre>';
	print_r($candidates);
	echo '</pre>';

//	$query = $pdo->query('SELECT SUM(votes) total_votes FROM candidates');
//	$total_votes = $query->fetch()->total_votes;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Qui est le meilleur ?</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="normalize.css">
</head>
<body>
	<div class="description">Votez pour votre joueur préféré !</div>
	<a class='buttonresults' href="results.php">Résultats</a>

	<?php foreach ($candidates as $_candidate): ?>
		<div class="results">
			<div class="info">
				<div class="name"><?= $_candidate->name ?></div>
				<a  class='button' href="?vote=<?= $_candidate->id ?>">Voter</a>
			</div>
			<img src="<?= $_candidate->url ?>" alt="playerphoto">
		</div>
	<?php endforeach; ?>

<!--	<div>Total <?=$total_votes ?></div>  -->

</body>
</html>