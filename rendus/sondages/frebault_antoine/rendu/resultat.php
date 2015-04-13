<?php
	
	require 'inc/config.php';



	$votes= [
		"gardien"=>[],
		"defenseur"=>[],
		"milieu"=>[],
		"attaque"=>[]
	];


	$prepare = $pdo->query('SELECT gardien, defenseur, milieu, attaque FROM compteur');
	$compteur = $prepare->fetchAll();

	
	foreach ($compteur as $vote) {

		$votes["gardien"][$vote->gardien]++;
		$votes["defenseur"][$vote->defenseur]++;
		$votes["milieu"][$vote->milieu]++;
		$votes["attaque"][$vote->attaque]++;
	}


	$gardien = max($votes["gardien"]);
	$id_gardien = array_search($gardien, $votes["gardien"]);
	$defenseur = max($votes["defenseur"]);
	$id_defenseur = array_search($defenseur, $votes["defenseur"]);
	$milieu = max($votes["milieu"]);
	$id_milieu = array_search($milieu, $votes["milieu"]);
	$attaque = max($votes["attaque"]);
	$id_attaque = array_search($attaque, $votes["attaque"]);

	// Select the player

	$query = $pdo->prepare('SELECT * FROM joueur WHERE id = :gardien or id = :defenseur or id= :milieu or id = :attaque');
	$query->bindValue(':gardien', $id_gardien);
	$query->bindValue(':defenseur', $id_defenseur);
	$query->bindValue(':milieu', $id_milieu);
	$query->bindValue(':attaque', $id_attaque);
	$query->execute();
	$joueur = $query->fetchAll(); 

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
	--><li><a href="index.php">Vote</a></li><!--
	--><li><a href="resultat.php">Résultat</a></li>
	</ul>
	<table>
		<caption>Meilleur à leur poste</caption>
		<tbody>
			<tr>
				<th>Nom, Prénom</th>
				<th>Poste</th>
			</tr>

			<tr>

				<?php foreach ($joueur as $_joueur): ?>
					<tr>
						<th>
							<? echo "$_joueur->nom, $_joueur->prenom"; ?>
						</th>
						<th>
							<? echo "$_joueur->poste"; ?>
							
						</th>

					</tr>
			</tr>
<?php endforeach; ?>
		</tbody>
	</table>

</body>
</html>