<?php

require	'inc/config.php';

if(!empty($_GET['vote']))
{
	$prepare = $pdo->prepare('UPDATE candidates SET votes = votes + 1 WHERE id = :id');

	$prepare->bindValue('id',$_GET['vote']);
	$prepare->execute();
}

$query = $pdo->query('SELECT * FROM candidates');
$candidates = $query->fetchAll();

$query = $pdo->query('SELECT SUM(votes) total_votes FROM candidates');
$total_votes = $query->fetch()->total_votes;

$query = $pdo->query('SELECT name, votes FROM candidates ORDER BY votes desc LIMIT 1');
$total_result = $query->fetchAll();

// $test = $pdo->query('SELECT * FROM candidates WHERE id = 5');


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Choisis ton film</title>
		<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="styles/font-awesome.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="scripts/script.js"> </script>

</head>
<body onload="decompte();">

	<!-- <div id="go">
		<h1>Votez pour le film que vous souhaitez voir</h1>
		<p>Vous avez 30 secondes!</p>
		<a href="#" id="letsgo">Commencer</a>
	</div> -->

	<div id="content">
		<nav>
			<ul>
				<li><a href="#">films</a></li>
				<li><a href="#">vote</a></li>
				<li><a href="#">friends</a></li>
				<li><a href="#">contact</a></li>
				<li><a href="#" class="fa fa-search fa-2x"></a></li>
			</ul>
		</nav>
		
		<div class="perso">
			<img src="img/avatar.png" alt="Mon profil">
		</div>



		<div id="films">
			
			<p id="time"></p>


			<?php foreach ($candidates as $_candidate): ?>
				<span>
					<div>
						<img src="img/<?= $_candidate->image ?>.jpg" alt="Affiche de Film">
						<a href="?vote=<?= $_candidate->id ?>" class="test_ajax fa fa-check fa-3x"></a>
					</div>
			</span>
			<?php endforeach ?>

		</div>

			


	<?php foreach ($candidates as $_candidate): ?>
		<div class="results">
			<div class="img_result">
			<!-- IMAGE QUI A RECU LE PLUS DE VOTE EN 30SECONDES -->
				<img src="img/<?= $_candidate->image ?>.jpg" alt="Affiche du Film">
			</div>
			<h1 class="nom_result">
			<!-- NOM QUI A RECU LE PLUS DE VOTE EN 30SECONDES -->
				<?= $_candidate->name ?> (<?= $_candidate->votes ?>)
			</h1>
		</div>
	<?php endforeach; ?>

	<?php

	?>
	</div>







</body>
</html>