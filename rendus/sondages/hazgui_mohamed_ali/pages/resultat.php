<?php 
	require '../inc/config.php';

	if(!empty($_POST['vote']))
	{
		$prepare = $pdo->prepare('UPDATE vote_personnages SET votes = votes + 1 WHERE id = :id');
		$prepare->bindValue(':id',$_POST['vote']);
		$prepare->execute();

		$prepare = $pdo->prepare('SELECT * FROM vote_personnages WHERE id = :id');
		$prepare->bindValue(':id', $_POST['vote']);
		$prepare->execute();
		$vote_choosen = $prepare->fetch();

		$query = $pdo->query('SELECT * FROM vote_personnages');
		$vote_totaux = $query ->fetchAll();

		// requete sql pour recupéré la somme de tout les votes
		$query = $pdo->query('SELECT SUM(votes) AS total FROM vote_personnages	');
		$vote_sum = $query->fetch()->total;

	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/reset.css">
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/font-awesome.css">
		<link href='http://fonts.googleapis.com/css?family=Quicksand:300' rel='stylesheet' type='text/css'>
		
		<title>Acceuil</title>
	</head>
	<body>
		<header class="header_resultat">
			<a href="../"><button class="back"><i class="fa fa-times fa-5x"></i></button></a>
			<h1>Wich Super Hero do you prefer?</h1>

		</header>
		<div class="choosen">	
			<p><?= $vote_choosen->name ?> thanks you for your vote </p>
		</div>
		<?php foreach($vote_totaux as $_vote_total) : ?>
			<div class="other">
				<!-- on affiche les votes et on calcule son pourcentage par rapport au total des votes -->
				<p><?= $_vote_total->name ?>: <span> <?= $_vote_total->votes ?> (<?= $_vote_total->votes*$vote_sum/100 ?> %) </span></p>
			</div>
		<?php endforeach ?>
	</body>
</html>