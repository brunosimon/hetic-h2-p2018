<?php
	session_start();
	if(isset($_SESSION['login'])){
		require 'inc/config.php';

		$query = $pdo->query('SELECT note_nom, note_prenom,AVG(note) AS avg, MIN(note) AS min, MAX(note) AS max FROM notes GROUP BY note_id');
		$joueur = $query->fetchAll();

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
	<link rel="stylesheet" href="src/css/style.css">
	<title>Effectif</title>
</head>
<body>
	<div class="logo"><a href="src/img/logo.jpg"></a></div>
	
	<ul id="nav"><!--
	--><li><a href="index.php">Calendrier</a></li><!--
	--><li><a href="effectif.php">Effectif</a></li><!--
	--><li><a href="contact.html">Contact</a></li><!--
	--><li><a href="deconnexion.php">Deconnexion</a></li>
	</ul>

<table>
		<caption>Effectif</caption>
		<tbody>
			<tr>
				<th>Nom, Prénom</th>
				<th>Moyenne</th>
				<th>Min</th>
				<th>Max</th>
			</tr>

			<tr>

				<?php foreach ($joueur as $_joueur): ?>
					<tr>
						<th>
							<? echo "$_joueur->note_nom, $_joueur->note_prenom"; ?>
						</th>
						<th>
							<? echo "$_joueur->avg"; ?>
							
						</th>

						<th>
							<? echo "$_joueur->min";?>
						</th>
						<th>
							<? echo "$_joueur->max"; ?>
						</th>

					</tr>
			</tr>
<?php endforeach; ?>
		</tbody>
	</table>


</body>
</html>