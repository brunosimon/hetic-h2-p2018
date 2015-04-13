<?php

	require 'inc/config.php';

	//die('ok');  teste si connexion à la BDD
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Accueil</title>
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
							<a href="#">ACCUEIL</a>
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
						METEO DIRECT :
					</h1>
				</div>
				<div id="map">
					<a id='lcm2K13_337' href='http://france.lachainemeteo.com/meteo-france/pays/previsions-meteo-france-0.php'>Meteo France</a>
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
	<script src='http://services.lachainemeteo.com/meteodirect/generationjs/javascript?type_affichage=carte&w=600&h=600&idc=lcm2K13&entite=63&type_entite=4&echeance=0&rand=337'></script>
	<script src='http://services.lachainemeteo.com/meteodirect/generationjs/javascript?type_affichage=vignette&w=290&h=320&idc=lcm2K13&entite=3558&type_entite=1&echeance=0&rand=608'></script>
</body>
</html>