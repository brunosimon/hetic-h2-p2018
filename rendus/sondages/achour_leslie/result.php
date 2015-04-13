<?php

	require 'inc/config.php';

	//If vote sent
	if(!empty($_GET['vote']))
	{
		$prepare = $pdo -> prepare('UPDATE disney SET votes = votes + 1 WHERE id = :id');
		$prepare -> bindValue(':id',$_GET['vote']);
		$prepare -> execute();
	}

	//Get all candidates
	$query = $pdo -> query( 'SELECT * FROM disney WHERE questions = 4' );
	$disney = $query -> fetchAll();

	//Get total
	$query = $pdo -> query('SELECT SUM(votes) AS total FROM disney');
	$total = $query ->fetch() ->total;

	//Get votes
	$query = $pdo -> query('SELECT * FROM disney ORDER BY votes DESC');
	$result = $query ->fetchAll();

?>

<!DOCTYPE html>
<html lang="eng">
<head>
	<meta charset="UTF-8">
	<title>Sondage</title>
	<link rel="stylesheet" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
</head>
<body>

	<div class="navigation">
		<img src="img/logo.png" alt="logo">
		<ul>
			<li><a href="index.php">Test</a></li>
			<li><a href="result.php">Consulter les résultats</a></li>
			<li><a href="readme.html">À propos</a></li>
		</ul>
	</div>

	<div class="content">
		<div class="result">
			<?php foreach($result as $_result): ?>		
				<div>
					<?= $_result ->reponses ?> : <?= $_result->votes ?> votes.
				</div>
			<?php endforeach; ?> 
		</div>
		
		<div class="total">
			Total : <?= $total ?>
		</div>
	</div>

	<div class="footer">
		Tout droit réservé par Leslie Achour, 2015.
	</div>

</body>
</html>





