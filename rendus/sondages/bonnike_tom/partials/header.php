<?php 
	$randomPollQuery = $pdo->prepare('SELECT url FROM sondages WHERE private = 0');
	$randomPollQuery->execute();
	$randomPollResult = $randomPollQuery->fetchAll();
	$randomNumber = rand(0, count($randomPollResult)-1);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<?php
		if ($title != 'MyPoll - Results'){
			echo '<link rel="stylesheet" type="text/css" href="styles.css">';
		}
		
		else {
			echo '<link rel="stylesheet" type="text/css" href="../styles.css">';
		}
	?>
</head>
<body>
<div class="container">
	<header class="header">
		<ul class="menu">
			<li <?= ($title == 'MyPoll - Créez votre propre sondage en quelques clics, sans inscription!') ? 'class="active"' : '' ?>><a href="<?= $title == 'MyPoll - Results' ? '../' : './'?>">Home</a></li>
			<li><a href="<?= $randomPollResult[$randomNumber]->url ?>">Sondage aléatoire</a></li>
		</ul>
	</header>
	<div class="content">