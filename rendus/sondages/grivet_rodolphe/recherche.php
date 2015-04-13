<?php 
session_start();
session_destroy();
require	'inc/config.php';

//set variable
$vide = 0;

$query = $pdo->query(' SELECT * FROM cours WHERE cour = "anglais"');
$select_cour = $query->fetchAll();


//form research
if(!empty($_POST))
{
	$prepare = $pdo->prepare('SELECT * FROM cours WHERE cour LIKE :recherche');
	$prepare->bindValue(':recherche','%'.$_POST['recherche'].'%');
	$prepare->execute();
	$result = $prepare->fetchAll();

	if(empty($result))
		$vide = 1;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Recherche</title>
	<link rel="stylesheet" href="src/css/reset.css">
	<link rel="stylesheet" href="src/css/style.css">
</head>
<body>
	<div class="container">
	<header>
		<h2><a href="index.php">HOME</a></h2>
	</header>
		<h1 class="titre">Outil de recherche</h1>
		<form class="recherche_form" action="#" method="POST">
			<input type="text" name="recherche" id="recherche" class="recherche" placeholder="Recherche">
			<br>
			<input type="submit" value="recherche" class="submit">
		</form>
		<div class="results">
			<?php  
			if(!empty($_POST))
			{
				foreach ($result as $_selected):   ?>
				<div class="result">
					<div class="sondage_cour">
						<p><span class="nom_result">Cours : </span><?php echo ($_selected->cour);?> </p>
					</div>
					<div class="sondage_date">
						<p><span class="nom_result">Date : </span><?php echo ($_selected->date);?> </p>
					</div>
					<div class="sondage_resumer">
						<p><span class="nom_result">Resumé du cours : </span><?php echo ($_selected->Resumer);?> </p>
					</div>
					<div class="sondage_note">
							<p><span class="nom_result">Pertinence : </span> <?php echo ($_selected->note) ?> </p>
					</div>
					<div class="nb_vote">
						<p><span class="nom_result">Nombre de votant : </span><?php echo ($_selected->nombre_vote); ?> </p>
					</div>
					<div class="sondage_vote">
						<p>Ce cours t'as semblé pertinent ? vote </p><a href="?vote=<?php echo($_selected->id) ?>">positivement</a>
						<p>Ce cours ne t'as pas semblé pertinent ? vote </p><a href="?vote2=<?php echo($_selected->id) ?>">negativement</a>
					</div>
				</div>
				<?php endforeach; } ?>
		</div>
		<?php  
		if($vide == 1)
			{	 ?>
				<div class="found">
					 <p class="not_found">Ce cours n'existe pas</p>
				</div>
				<?php
			} ?>
	</div>
</body>
</html>