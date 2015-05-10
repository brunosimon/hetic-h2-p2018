<?php

	require 'inc/config.php';


	if(!empty($_GET['vote']))
	{
		//update vote
		$prepare = $pdo->prepare('UPDATE candidates SET votes = votes + 1 WHERE id =:id');
		$prepare->bindValue(':id',$_GET['vote']);
		$prepare->execute();
	};
	// get all candidates
	$query = $pdo->query('SELECT * FROM candidates');
	$candidates = $query->fetchAll();

	// get total
	$query = $pdo->query('SELECT SUM(votes) AS total FROM candidates');
	$total = $query->fetch()->total;

	// get top
	$reponse = $pdo->query('SELECT * FROM candidates ORDER BY votes LIMIT 0,3 ');
	$top= $reponse->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Old+Standard+TT:400,400italic,700' rel='stylesheet' type='text/css'>
	<title>Sondage</title>
</head>
<body>
	<div class="menu">
		<img class="logo" src="img/pixar.png">
	</div>
	<div class="list">
	<?php foreach($candidates as $_candidate): ?>
		<div class="shortfilms">

			
			<div class="container_information">
				<div class="container_opacity"></div>
				<div class="information">
					<?php echo $_candidate->name ?> 
					<br></br>
					<?php echo $_candidate->year ?> 
				</div>
				<br></br>
				<div>
					<a class="like" href="?vote=<?= $_candidate->id ?>">Like</a>
					<div class="number_like"><?= $_candidate->votes ?></div>
				</div>
			</div>
			<img class="poster" src="img/filmposter/<?php  echo  $_candidate->image  ?>">
			<div class="gradient"></div>
				
		</div>

	<?php endforeach; ?>
	<div class="box">
		<div class="results">
			<div class="results_title">Likes in total</div>
			<div class="results_score"> <?= $total ?></div>
		</div>

		<div class="contain_podium">
			<div class="toppissime">TOP 3</div>
			<?php foreach($top as $_to): ?>

			<div class="podium">
				<?php echo $_to->name ?>
			</div>
			<?php endforeach; ?>
		</div>

		<div>
			
		</div>

	</div>
</div>

	
</body>
</html>