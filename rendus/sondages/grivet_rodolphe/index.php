<?php 

	require 'inc/config.php';
	include 'formulaire.php';

	//SESSION START
	session_start();

	if(!empty($_POST))
	{
			// Add cours
		
			$prepare = $pdo->prepare('INSERT INTO cours (cour,date,resumer) VALUES (:cour,:date,:resumer)');
			$prepare->bindValue(':cour',$_POST['cour']);
			$prepare->bindValue(':date',$_POST['date']);
			$prepare->bindValue(':resumer',$_POST['resumer']);


  			//Testing errors
			if(!empty($success))
			{
				$prepare->execute();
				header('Location: index.php');
  				exit();
			}
	}



	// get all in cours
	$query	= $pdo->query( 'SELECT * FROM `cours` ORDER BY date DESC LIMIT 6');
	$cour	= $query->fetchAll();



	// if vote sent
	if(!empty($_GET['vote']))
	{
		// TEST SI l'ip A deja voté ( marche pour tous les cours )
		if($_SERVER['REMOTE_ADDR'] == $_SESSION['ip'])
			echo "A déja voté";

		else{
				// update vote
				$prepare = $pdo->prepare('UPDATE cours SET note = note + 1 WHERE id = :id ');
				$prepare->bindValue(':id',$_GET['vote']);
				$prepare->execute();

				$prepare = $pdo->prepare('UPDATE cours SET nombre_vote = nombre_vote + 1 WHERE id = :id ');
				$prepare->bindValue(':id',$_GET['vote']);
				$prepare->execute();

				// Recupération de l'adresse ip
				$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

				header('Location: index.php');
		  		exit();
		  	}
	}


	if(!empty($_GET['vote2']))
	{


		// TEST SI l'ip A deja voté ( marche pour tous les cours )
		if($_SERVER['REMOTE_ADDR'] == $_SESSION['ip'])
				echo "A déja voté";

		else{
			// update vote
			$prepare = $pdo->prepare('UPDATE cours SET note = note - 1 WHERE id = :id ');
			$prepare->bindValue(':id',$_GET['vote2']);
			$prepare->execute();
			$prepare = $pdo->prepare('UPDATE cours SET nombre_vote = nombre_vote + 1 WHERE id = :id ');
			$prepare->bindValue(':id',$_GET['vote2']);
			$prepare->execute();

			// Recupération de l'adresse ip
			$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

			header('Location: index.php');
	  		exit();
	  	}
	}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sondage</title>
	<link rel="stylesheet" href="src/css/reset.css">
	<link rel="stylesheet" href="src/css/style.css">
</head>
<body>
	<div class="container">
		<header>
			<div class="tri">
			<a href="recherche.php">Recherche un cours</a>
		</div>
		</header>
		<h1 class="titre">Note tes cours, rapelle toi les plus pertinents.</h1>
		<form class="ajout_cour" action="#" method="POST">
			<input type="text" name="cour" id="name" class="name" placeholder="Nom du cours">
			<input type="date" name="date" id="date" class="date" placeholder="Date du cours">
			<br>
			<input type="text" name="resumer" id="resumer" class="resumer" placeholder='Resumer du cours'>
			<br>
			<input type="submit" value="send" class="submit">
		</form>
		<div class="get_errors">
			<?php if(!empty($errors))
			{
				?> <p>Votre cour n'as pas été ajouté veuillez corriger les erreurs suivantes :</p><br> <?php
				foreach ($errors as $_errors) {
					?><span>-</span>  <?php echo $_errors . "<br>";
				}
			} ?>
		</div>
	<div class="results">
		<?php  foreach ($cour as $_cour):   ?>
			<div class="result">
				<div class="sondage_cour">
					<p><span class="nom_result">Cours : </span><?php echo ($_cour->cour);?> </p>
				</div>
				<div class="sondage_date">
					<p><span class="nom_result">Date : </span><?php echo ($_cour->date);?> </p>
				</div>
				<div class="sondage_resumer">
					<p><span class="nom_result">Resumé du cours : </span><?php echo ($_cour->Resumer);?> </p>
				</div>
				<div class="sondage_note">
					<p><span class="nom_result">Pertinence : </span> <?php echo ($_cour->note) ?>
				</div>
				<div class="nb_vote">
					<p><span class="nom_result">Nombre de votant : </span><?php echo ($_cour->nombre_vote); ?> </p>
				</div>
				<div class="sondage_vote">
					<p>Ce cours t'as semblé pertinent ? vote </p><a href="?vote=<?php echo($_cour->id) ?>">positivement</a>
					<p>Ce cours ne t'as pas semblé pertinent ? vote </p><a href="?vote2=<?php echo($_cour->id) ?>">negativement</a></p>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
		<a class="next_page" href="page2.php">Page 2</a>
		<a href="revoter.php">Revoter ?</a>
	</div>
</body>
</html>
