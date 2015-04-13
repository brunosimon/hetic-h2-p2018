<?php 

require 'config.php';

if(!empty($_GET['vote']))
{
	$prepare = $pdo->prepare('UPDATE films SET votes = votes + 1 WHERE id = :id');
	$prepare->bindValue('id' , $_GET['vote']);
	$prepare->execute();
}

$query = $pdo->query('SELECT * FROM films' );
$films = $query->fetchALL();

$query = $pdo->query ('SELECT SUM(votes) total_votes FROM films');
$total_votes = $query->fetch()->total_votes;
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Films</title>
	<link rel="stylesheet" href="styles.css"> 
</head>
<body>

	<div class="titre">Le Meilleur des films James Bond</div>
	
		<div class="php">
			<?php foreach ($films as $_film): ?>
				<div class="film1"></br>
					<?= $_film->names ?>   <div class="nbvotes"> <?= $_film->votes ?> votes</div>
				</div>
		</div>
		
		<?php endforeach; ?>

		<div class="button">
				<a href="http://localhost:8888/james_bond/">Revenir au Sondage</a>
		</div>
</body>
</html>













