<?php

	require 'inc/config.php';

	// If vote sent
	if(!empty($_GET['vote']))
	{
		// Update vote
		$prepare = $pdo->prepare( 'UPDATE candidates SET votes = votes + 1 WHERE id = :id' );
		$prepare->bindValue(':id',$_GET['vote']);
		$prepare->execute();
	}

	// Get all candidates
	$query = $pdo->query( 'SELECT * FROM candidates' );
	$candidates = $query->fetchAll();

	// Get total
	$query = $pdo->query( 'SELECT SUM(votes) AS total FROM candidates' );
	$total = $query->fetch()->total;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sondage</title>
</head>
<body>
	<?php foreach($candidates as $_candidate): ?>
		<div>
			<?= $_candidate->name ?> (<?= $_candidate->votes ?>)
			<a href="?vote=<?= $_candidate->id ?>">Voter</a>
		</div>
	<?php endforeach; ?>
	<div>
		Total : <?= $total ?>
	</div>
</body>
</html>