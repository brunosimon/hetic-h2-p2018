<?php
	session_start();
	if(isset($_SESSION['login'])){
		require 'inc/config.php';

			$note = $pdo->prepare('SELECT note_id,note FROM notes WHERE votant_id = :votant_id GROUP BY id');
		$note->bindValue(':votant_id',$_SESSION['login']);
		$note->execute();
		$notes = $note->fetchAll();

		$query = $pdo->query('SELECT note_id, note_nom, note_prenom,AVG(note) AS avg, MIN(note) AS min, MAX(note) AS max FROM notes GROUP BY note_id');
		$joueur = $query->fetchAll();
	
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';

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
	<title>Vote</title>
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
		<caption>Note</caption>
		<tbody>
			<tr>
				<th>Nom, Prénom</th>
				<th>Note</th>
			</tr>

			<tr>

				<?php foreach ($joueur as $_joueur): ?>
					<tr>
						<th>
							<? echo "$_joueur->note_nom, $_joueur->note_prenom"; ?>
						</th>
						<th>
							<form action="#" method="post">
								<input type="number" min="0" max="10" name"note<?=$_joueur->note_id?>">
							</form>
							
						</th>

					</tr>
			</tr>
	<?php endforeach; ?>
		</tbody>
	</table>
	<input type="submit" value="ok">

	<?
		for ($i=1; $i < 21 ; $i++) {

			if ($i != $_SESSION) {

				$prepare = $pdo->prepare('INSERT INTO notes(votant_id,votant_nom,votant_prenom,note_id,note_nom,note_prenom,note,rencontre) VALUES (:votant_id,:votant_nom,:votant_prenom,:note_id,:note_nom,:note_prenom,:note,:rencontre)');
				$prepare->bindValue(':votant_id',$_SESSION['login']);
				$prepare->bindValue(':votant_nom',$_SESSION['nom']);
				$prepare->bindValue(':votant_prenom',$_SESSION['prenom']);
				$prepare->bindValue(':note_id',$_joueur->note_id);
				$prepare->bindValue(':note_nom',$_joueur->note_nom);
				$prepare->bindValue(':note_prenom',$_joueur->note_prenom);
				$prepare->bindValue(':note',$_POST['note$i']);
				$prepare->bindValue(':rencontre',$_POST['rencontre']);
				$prepare->execute();
				$insert = $prepare->fetch();

			}

			

		}



		

	?>

	
</body>
</html>