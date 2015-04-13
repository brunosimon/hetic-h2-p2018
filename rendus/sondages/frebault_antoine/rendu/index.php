<?php
	
	require 'inc/config.php';

	//Command to insert into the database

		$prepare = $pdo->prepare('INSERT INTO compteur(mail,gardien,defenseur,milieu,attaque) VALUES (:mail,:gardien,:defenseur,:milieu,:attaque)');
		$prepare->bindValue(':mail',$_POST['mail']);
		$prepare->bindValue(':gardien',$_POST['gardien']);
		$prepare->bindValue(':defenseur',$_POST['defenseur']);
		$prepare->bindValue(':milieu',$_POST['milieu']);
		$prepare->bindValue(':attaque',$_POST['attaque']);
		$prepare->execute();
		$exec = $prepare->fetchAll();


		// Command to access to the database
		
		$query = $pdo->query('SELECT * FROM joueur WHERE poste = "Gardien"');
		$gardien = $query->fetchAll();
		$query = $pdo->query('SELECT * FROM joueur WHERE poste = "Defenseur"');
		$defenseur = $query->fetchAll();
		$query = $pdo->query('SELECT * FROM joueur WHERE poste = "Milieu"');
		$milieu = $query->fetchAll();
		$query = $pdo->query('SELECT * FROM joueur WHERE poste = "Attaquant"');
		$attaquant = $query->fetchAll();

		echo '<pre>';
		print_r($_POST);
		echo '</pre>';


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
	<form action="#" method="post">
		<input type="text" name="mail">
			<label>: Mail</label>
			<br>
			<br>
		<select name="gardien">
			<?php foreach ($gardien as $_gardien): ?>
				<option value="<?=$_gardien->id?>"><?=$_gardien->nom?><?echo", "; ?><?=$_gardien->prenom?></option>
			<?php endforeach; ?>
			</select>
			<select name="defenseur">
			<?php foreach ($defenseur as $_defenseur): ?>
				<option value="<?=$_defenseur->id?>"><?=$_defenseur->nom?><?echo", "; ?><?=$_defenseur->prenom?></option>
			<?php endforeach; ?>
			</select>
			<select name="milieu">
			<?php foreach ($milieu as $_milieu): ?>
				<option value="<?=$_milieu->id?>"><?=$_milieu->nom?><?echo", "; ?><?=$_milieu->prenom?></option>
			<?php endforeach; ?>
			</select>
			<select name="attaque">
			<?php foreach ($attaquant as $_attaque): ?>
				<option value="<?=$_attaque->id?>"><?=$_attaque->nom?><?echo", "; ?><?=$_attaque->prenom?></option>
			<?php endforeach; ?>
			</select>
			

		<br>
		<br>
		<input type="submit" value="ok">
	</form>
</body>
</html>