<?php
	session_start();
	if(isset($_SESSION['login'])){
		require 'inc/config.php';

		$query = $pdo->query('SELECT * FROM matchs');
		$matchs = $query->fetchAll();

		$count = $pdo->prepare('SELECT COUNT(note) FROM notes WHERE votant_id = :votant_id');
		$count->bindValue(':votant_id',$_SESSION['login']);
		$count->execute();
		$result = $count->fetchAll();

		$note = $pdo->prepare('SELECT note_id,note FROM notes WHERE votant_id = :votant_id GROUP BY id');
		$note->bindValue(':votant_id',$_SESSION['login']);
		$note->execute();
		$notes = $note->fetchAll();

		$query = $pdo->query('SELECT note_nom, note_prenom,AVG(note) AS avg, MIN(note) AS min, MAX(note) AS max FROM notes GROUP BY note_id');
		$joueur = $query->fetchAll();

		echo '<pre>';
		print_r($notes);
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
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="src/css/reset.css">
	<link rel="stylesheet" href="src/css/style.css">
	<title>Effectif</title>
</head>
<body>

		<?if($_GET['id'] != $_SESSION['id']){
			echo "Vous avez fait une manipulation interdite";
			header("location: deconnexion.php");
		}?>
	
	
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
							<? echo "$notes->note_id"; ?>
							
						</th>

					</tr>
			</tr>
<?php endforeach; ?>
		</tbody>
	</table>
	


</body>
</html>