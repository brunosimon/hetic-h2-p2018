<?php 

	require 'inc/config.php';



	// get all in cours
	$query	= $pdo->query( 'SELECT * FROM `cours` ORDER BY ID DESC LIMIT 6 OFFSET 6');
	$cour	= $query->fetchAll();





	// if vote sent
	if(!empty($_GET['vote']))
	{
		// update vote
		$prepare = $pdo->prepare('UPDATE cours SET note = note + 1 WHERE id = :id ');
		$prepare->bindValue(':id',$_GET['vote']);
		$prepare->execute();
		$prepare = $pdo->prepare('UPDATE cours SET nombre_vote = nombre_vote + 1 WHERE id = :id ');
		$prepare->bindValue(':id',$_GET['vote']);
		$prepare->execute();
		header('Location: index.php');
  		exit();
	}
	if(!empty($_GET['vote2']))
	{
		// update vote
		$prepare = $pdo->prepare('UPDATE cours SET note = note - 1 WHERE id = :id ');
		$prepare->bindValue(':id',$_GET['vote2']);
		$prepare->execute();
		$prepare = $pdo->prepare('UPDATE cours SET nombre_vote = nombre_vote + 1 WHERE id = :id ');
		$prepare->bindValue(':id',$_GET['vote2']);
		$prepare->execute();
		header('Location: index.php');
  		exit();
	}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sondage</title>
	<link rel="stylesheet" href="src/css/reset.css">
	<link rel="stylesheet" href="src/css/style.css">
</head>
<body>
	<div class="container">
		<header></header>
	<div class="results">
		<?php  foreach ($cour as $_cour):   ?>
			<div class="result">
				<div class="sondage_cour">
					<p><span class="nom_result">Cours : </span><?php echo ($_cour->cour);?> </p>
				</div>
				<div class="sondage_date">
					<p><span class="nom_result">Date : </span><?php echo ($_cour->date);?> </p>
				</div>
				<div class="sondage_resumer">
					<p><span class="nom_result">Resumé du cours : </span><?php echo ($_cour->Resumer);?> </p>
				</div>
				<div class="sondage_note">
					<p><span class="nom_result">Pertinence : </span> <?php echo ($_cour->note) ?>
				</div>
				<div class="nb_vote">
					<p><span class="nom_result">Nombre de votant : </span><?php echo ($_cour->nombre_vote); ?> </p>
				</div>
				<div class="sondage_vote">
					<p>Ce cours t'as semblé pertinent ? vote </p><a href="?vote=<?php echo($_cour->id) ?>">positivement</a>
					<p>Ce cours ne t'as pas semblé pertinent ? vote </p><a href="?vote2=<?php echo($_cour->id) ?>">negativement</a></p>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	</div>
</body>
</html>