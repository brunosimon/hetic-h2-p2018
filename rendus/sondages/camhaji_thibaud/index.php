<?php

	require 'inc/config.php';

	session_start();


	try {
		$statement = $pdo->query('SELECT * FROM pays ORDER BY id');
		$countries = $statement->fetchAll();
		$allowed_votes = ['habiter_oui','habiter_non','vacances_oui','vacances_non','travailler_oui','travailler_non'];

		if(!empty($_GET['id'])){
			$id = $_GET['id'];
			if(!empty($_GET['vote'])) {
				$vote_col = $_GET['vote'];
				$current_country = $countries[$id-1];
				$flag_session = isset($_SESSION[$current_country->slug]) ? $_SESSION[$current_country->slug] : [];
				if (in_array($vote_col, $allowed_votes)){
					if (!isset($flag_session[substr($vote_col, 0, strlen($vote_col)-4)])) {
						$current_country->$vote_col ++;
						$pdo->query( 'UPDATE pays SET '.$vote_col.' = '.($current_country->$vote_col).' WHERE id = '.$current_country->id);
						$flag_session[substr($vote_col, 0, strlen($vote_col)-4)] = true;
						$_SESSION[$current_country->slug] = $flag_session;
					}
					else{
						$error="Vous avez deja voté !";
					}
				}
			}
		}
	} 
	catch (PDOException $e) {
		die('Could not connect to the database...');
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sondageurope</title>
	<link rel="stylesheet" type="text/css" media="screen,projection" href="styles/cssmap-europe.css"/>
	<link rel="stylesheet" type="text/css" media="screen,projection" href="styles/style.css"/>
	<link href='http://fonts.googleapis.com/css?family=Roboto:100,300italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400' rel='stylesheet' type='text/css'>
	<script  type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
 	<script type="text/javascript" src="http://cssmapsplugin.com/4/jquery.cssmap.js"></script>
 	<script type="text/javascript">
  		$(function($){
    		$('#map-europe').cssMap({'size' : 750,tooltips : "floating",cities : true,loadingText : 'En cours de chargement'});
   		});
	</script>
</head>
<body>
	<div class="container">
		<div id="map-europe">
			 <ul class="europe">
			 	<?php foreach ($countries as $country) : ?>
					<li class="eu<?= $country->id ?>"><a href="?id=<?= $country->id ?>"><?= $country->label ?></a></li>
		 		<?php endforeach; ?>
			 </ul>
		</div>
	</div>

	<div class="sondage">
		<div class="description">
			<h1>Sondage Europe</h1>
			<p>Ce sondage a pour but de récolter des informations concernant les pays européens selon trois critères : le travail, le loisir et la vie quotidienne. <br/>Pour voir le détail d'un pays, cliquez simplement dessus.</p>
			<?php if(isset($error)) : ?>
				<p class="error"><?= $error ?></p>
			<?php endif; ?>
		</div>
		<div class="paysSondage <?php echo(empty($id)?'hidden':'visible'); ?>">
			<h2><?=$countries[$id-1]->label?></h2>
			<ul>
				<li>J'aimerais y habiter</li>
				<li><a href="?id=<?=$id?>&vote=habiter_oui"><span><?=$countries[$id-1]->habiter_oui?></span> <img src="styles/smiley_yes.png"></a> <a href="?id=<?=$id?>&vote=habiter_non"><span><?=$countries[$id-1]->habiter_non?></span> <img src="styles/smiley_no.png"></a></li>
				<li>J'aimerais y aller en vacances</li>
				<li><a href="?id=<?=$id?>&vote=vacances_oui"><span><?=$countries[$id-1]->vacances_oui?></span> <img src="styles/smiley_yes.png"></a> <a href="?id=<?=$id?>&vote=vacances_non"><span><?=$countries[$id-1]->vacances_non?></span> <img src="styles/smiley_no.png"></a></li>
				<li>J'aimerais y travailler</li>
				<li><a href="?id=<?=$id?>&vote=travailler_oui"><span><?=$countries[$id-1]->travailler_oui?></span> <img src="styles/smiley_yes.png"></a> <a href="?id=<?=$id?>&vote=travailler_non"><span><?=$countries[$id-1]->travailler_non?></span> <img src="styles/smiley_no.png"></a></li>
			</ul>
		</div>
	</div>
</body>
</html>

