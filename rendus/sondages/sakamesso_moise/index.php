<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'config.php';
require 'actions.php' //details du php
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HeticStats</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="js/script.js" type="text/javascript"></script>
</head>
<body>
	<section class="wrapper">
		<h1>HeticStats</h1>
		<p>Idée : Les préférences des héticiens – chaque héticien(ne) est amené(e) à remplir un questionnaire afin d'afficher les statistiques générales de tous les participants.</p>
		
		<!-- page action : gender -->
		<h2>1- What is your gender?</h2>
		<div class="divs">
			<?php foreach ($gender as $_gender): ?>
			 	<span>
			 		Are you a <?= $_gender->sex ?>  ?
					<a href="?action=<?= $_gender->id ?>">One click</a><br/>
			 	</span>
			<?php endforeach; ?>
		</div>

		<div class="divs div_end">
			<p><a href="results.php">Show Results</a><br/></p>
		</div>
	</section>
</body>
</html>
