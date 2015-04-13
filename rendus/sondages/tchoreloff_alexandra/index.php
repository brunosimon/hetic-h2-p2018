<?php

	//Errors display
	error_reporting(E_ALL); 
	ini_set("display_errors", 1);

	require 'inc/config.php';

	//If vote sent
	if(!empty($_GET['vote']) && !empty($_GET['id']))
	{
		$prepare = $pdo->prepare ('UPDATE movies SET ' . $_GET['vote'] . ' = ' . $_GET['vote'] . ' + 1 WHERE id = :id');
		$prepare->bindvalue(':id',$_GET['id']);
		$prepare->execute();

		header('Location:index.php');	
		exit;	
	}
	
	// Get all movies objects
	$query = $pdo->query('SELECT id, name, excellent, pas_mal, nul, picture, (excellent+pas_mal+nul) AS total FROM movies');
	$movies = $query->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Sondage</title>
	<link rel="stylesheet" type="text/css" href="src/css/style.css">
</head>
<body>

	<h1> Quel est votre Disney favoris ?</h1>

	<div class="movies"> 
		<?php foreach($movies as $_movie): ?>
			<?php 
				//Percentages calculating system
				$excellent = $_movie->total > 0 ? round($_movie->excellent / $_movie->total * 100) : 0;
				$pas_mal = $_movie->total > 0 ? round($_movie->pas_mal / $_movie->total * 100) : 0;
				$nul = $_movie->total > 0 ? round($_movie->nul / $_movie->total * 100) : 0;
			?>
			<div class="movie-wrapper">
				<div class="poster">
					<img src="<?= $_movie->picture ?>"/>
				</div>
				<h2>
					<?= $_movie->name ?>
				</h2>
				<!-- Creating the response graph -->
				<div class="vote">
					<div class="excellent bar"><div style="width:<?= $excellent ?>%;"> <?= $excellent ?>% </div></div>
					<a href="index.php?id=<?=$_movie->id ?>&vote=excellent"> Excellent </a> 
				</div>
				<div class="vote">
					<div class="pas_mal bar"><div style="width:<?= $pas_mal ?>%;"> <?= $pas_mal ?>% </div></div>
					<a href="index.php?id=<?=$_movie->id ?>&vote=pas_mal"> Pas mal </a>
				</div><div class="vote">
					<div class="nul bar"><div style="width:<?= $nul ?>%;"> <?= $nul ?>% </div></div>
					<a href="index.php?id=<?=$_movie->id ?>&vote=nul"> Nul </a>
				</div>
				<p>Nombre de vote pour ce film : <?= $_movie->total ?></p>
			</div>
		<?php endforeach;?>
	</div> 

</body>
</html>
	