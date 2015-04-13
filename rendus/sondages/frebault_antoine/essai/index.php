<?php
	session_start();
	if(isset($_SESSION['login'])){
		require 'inc/config.php';


		$query = $pdo->query('SELECT * FROM matchs');
		$matchs = $query->fetchAll();

	} 
	else  
	{ 
		echo "Vous n'êtes pas enregistrer";
		header("location: login.php");
		die;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="src/css/reset.css">
	<link rel="stylesheet" href="src/css/style.css">
	<title>Calendrier</title>
</head>
<body>
	
	<ul id="nav"><!--
	--><li><a href="index.php">Calendrier</a></li><!--
	--><li><a href="effectif.php">Effectif</a></li><!--
	--><li><a href="contact.html">Contact</a></li><!--
	--><li><a href="deconnexion.php">Deconnexion</a></li>
	</ul>
	<div class="logo"><img src="src/img/logo.jpg" alt="logo"></div>




	<table>
		<caption>Journées des matchs</caption>
		<tbody>
			<tr>
				<th>Journée n°</th>
				<th>Date</th>
				<th>Score</th>
				<th>Votez</th>
			</tr>

			<tr>

				<?php foreach ($matchs as $_match): ?>
					<tr>
						<th>
							<? echo "$_match->id"; ?>
						</th>
						<th>
							<? echo "$_match->date"; ?>
						</th>
						<th>
							<? if($_match->resultat != 0){
								echo "$_match->pour - $_match->contre";
							} 
								 ?>
						</th>
						<th>
									<a href="note.php?match=<?= $_match->id?>?id=<?=$_SESSION['login'] ?>"> Voter </a>
			
						</th>

					</tr>

					
				<?php endforeach; ?>


			</tr>

		</tbody>
	</table>
</body>
</html>