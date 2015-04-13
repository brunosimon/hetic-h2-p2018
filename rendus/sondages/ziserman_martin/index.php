<?php
	require 'inc/config.php';
	//if vote sent
	if(!empty($_GET['vote']))
	{
		//update vote
		$prepare = $pdo->prepare( 'UPDATE candidates SET votes = votes + 1 WHERE id = :id' );
		$prepare->bindValue( ':id',$_GET['vote'] );
		$prepare->execute();
	}
	//if inscription
	if(!empty($_POST[ 'nom' ])){
		// If name already exist, error, else insert into database
		$prepare = $pdo->prepare( 'SELECT * FROM candidates WHERE name = :name' );
		$prepare->bindValue(':name',trim($_POST['nom']));
		$prepare->execute();
		$user = $prepare->fetch();
		if(!empty($user)){
			$error .= "Vous êtes déjà inscrit<br/>";
		} else {
			$prepare = $pdo->prepare( 'INSERT INTO candidates (name, votes) VALUES (:name, 0)' );
			$prepare->bindValue(':name',trim($_POST['nom']));
			$prepare->execute();
		}			
	}

	// get all candidates
	$query 		= $pdo->query( 'SELECT * FROM candidates' );
	$candidates = $query->fetchall();

	//Get total
	$query = $pdo->query( 'SELECT SUM(votes) AS total FROM candidates' );
	$total = $query->fetch()->total;

?>
<!DOCTYPE html>
<html lang="en">
<head>

	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="reset.css">
	<meta charset="UTF-8">
	<title>Sondage</title>
</head>
<body>
	<div class="container">
		<div class="vote">
			<p><?= $error ?></p>
			<!-- Insciption -->
			<h1>Inscription</h1>
			<form action="#" method="post">
				<input type="text" name="nom">
				<label>Nom</label>
				<br>
				<input type="submit">
			</form>
			<?php foreach($candidates as $_candidate): ?>
				<div>
					<?= $_candidate->name ?>
					<a href="?vote=<?= $_candidate->id ?>">votez</a>
					<p> <?=number_format(($_candidate->votes * 100) / $total)?> %</p>
					<div class=<?= $_candidate->name  ?> style="width:<?= ($_candidate->votes * 253) / $total ?>px; height:20px; background-color:#E74C3C"></div>
				</div>
			<?php endforeach; ?>	
			<div>
				Total : <?= $total ?>
			</div>
	</div>
</body>
</html>