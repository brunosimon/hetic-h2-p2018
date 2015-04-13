<?php

	require 'inc/config.php';

	//die('ok');  teste si connexion à la BDD
	session_start();
	// If vote sent
	if(!empty($_GET['vote']))
	{
		$prepare = $pdo->prepare('UPDATE question1 SET votes = votes+1 WHERE id = :id');
		$prepare->bindValue(':id',$_GET['vote']);
		$prepare->execute();
	}

	// Print different message and image for each vote
	switch($_SESSION['vote'])
    {
        case 1:
			$img = "<img src='img/chat_oui.jpg'";
            $result = "Reponse : C'est bien ! Tu es une personne optimiste !";
            break;
        case 2:
			$img = "<img src='img/chat_soleil.jpg'";
            $result = "Reponse : Sérieusement ? Tu es déjà sorti de chez toi ?";;
            break;
        case 3:
			$img = "<img src='img/chat_mouille.jpg'";
            $result = "Reponse : Bof n'est pas une reponse ...";
            break;
        case 4:
			$img = "<img src='img/chat_lol.jpg'";
            $result = "Reponse : T'es un petit rigolo toi.";
            break;
        case 5:
			$img = "<img src='img/chat_mouille.jpg'";
            $result = "Reponse : Pleuvoir ? Toi tu vas nous porter a poisse ...";
            break;
        case 6:
			$img = "<img src='img/chat_non.jpg'";
			$result = "Reponse : Non ? Au moins c'est clair.";
			break;
    }

	//Select question
	$query = $pdo->query('SELECT enonce FROM enonces_questions WHERE id = 1');
	$enonce = $query->fetch();

	// Update vote
	$query = $pdo->query('SELECT * FROM question1');
	$propositions = $query->fetchAll();

	// Get total
	$query =$pdo->query('SELECT SUM(votes) AS total FROM question1');
	$total = $query->fetch()->total;




?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sondage</title>
	<link rel="stylesheet" href="style/reset.css">
	<link rel="stylesheet" href="style/style.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,600,400' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="content">
		<header>
			<div id="header">
				<div class="logo">
					<div class="sun"></div>
					<span>METEO HETIC</span>
				</div>
				<nav>
					<ul>
						<li>
							<a href="index.php">ACCUEIL</a>
							</li>
						<li>
							<a href="#">FRANCE</a>
						</li>
						<li>
							<a href="sondage.php">SONDAGE</a>
						</li>
					</ul>
				</nav>
			</div>
		</header>
		<section>
			<article>
				<div class="lab-article">
					<h1>
						SONDAGE :
					</h1>
				</div>
				<div id="sondage">
					<h2>
						<?= $enonce->enonce ?>
					</h2>
					<?php foreach($propositions as $_proposition): ?>
						<!-- html -->
						<div class="choice-sondage">
							<?= $_proposition->propositions ?> (<?= $_proposition->votes?>)
							<!-- html -->
							<span class="percent"><?= round(($_proposition->votes/$total)*100). '%' ?><!-- print percentage -->
							</span>
						</div>
					<?php endforeach; ?>
					<!-- html -->
					<div id="total">
						Total: <?= $total ?>
					</div>
					<!-- html -->
					<h3 class="result">
						<?= $result ?>
					</h3>
					<div class="image">
						<?= $img ?>
					</div>
				</div>
			</article>
			<aside>
				<div class="lab-aside">
					<h1>
						METEO MONTREUIL :
					</h1>
				</div>
				<div id="montreuil">
					<a id='lcm2K13_608' href='http://france.lachainemeteo.com/meteo-france/ville/previsions-meteo-montreuil-3558-0.php'>Meteo Montreuil</a>
				</div>
			</aside>
		</section>
	</div>
		<footer>
			<div id="bloc">
			</div>
			<div id="f-logo">
				<div class="logo">
					<div class="sun"></div>
					<span>METEO HETIC</span>
				</div>
			</div>
		</footer>
	<script src='http://services.lachainemeteo.com/meteodirect/generationjs/javascript?type_affichage=vignette&w=290&h=320&idc=lcm2K13&entite=3558&type_entite=1&echeance=0&rand=608'></script>
</body>
</html>