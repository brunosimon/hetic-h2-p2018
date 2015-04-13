<?php

	require 'inc/config.php';

	// if vote sent
	if(!empty($_GET['vote']))
	{	
		$prepare = $pdo->prepare( 'UPDATE film SET votes = votes + 1 WHERE id = :id' );
		$prepare->bindValue(':id',$_GET['vote']);
		$prepare->execute();
	}

	$query = $pdo->query( 'SELECT * FROM film' );
	$film = $query->fetchAll();

	$query = $pdo->query( 'SELECT SUM(votes) AS total FROM film' );
	$total = $query->fetch()->total;


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Site_vote</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class = "bloc"></div>
	
<?php foreach($film as $_movie): ?>
		<div>
			<?= $_movie->name ?> (<?= $_movie->votes ?>) 
			<a href="?vote=<?= $_movie->id ?>">Voter</a>
		</div>
	<?php endforeach; ?>
	<div>
		Total : <?= $total ?>
	</div>
	<?php 
		$query = $pdo->query( 'SELECT name, MAX(votes) as max_votes FROM film');
		$max_votes = $query->fetch(); 
	?>
		<div>
		<br>
			<?= $max_votes->name; ?>
		</div>

</body>
</html>