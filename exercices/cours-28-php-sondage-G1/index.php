<?php

	require 'inc/config.php';

	// If vote sent
	if(!empty($_GET['vote']))
	{
		// Update vote for the right candidate
		$prepare = $pdo->prepare('UPDATE candidates SET votes = votes + 1 WHERE id = :id');
		$prepare->bindValue('id',$_GET['vote']);
		$prepare->execute();
	}

	// Get all candidates
	$query = $pdo->query('SELECT * FROM candidates');
	$candidates = $query->fetchAll();

	// Get votes count
	$query = $pdo->query('SELECT SUM(votes) total_votes FROM candidates');
	$total_votes = $query->fetch()->total_votes;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Candidates</title>
</head>
<body>
	<?php foreach($candidates as $_candidate): ?>
		<div>
			<?= $_candidate->name ?> (<?= $_candidate->votes ?>)
			<a href="?vote=<?= $_candidate->id ?>">Voter</a>
		</div>
	<?php endforeach; ?>

	<div>Total <?= $total_votes ?></div>
</body>
</html>