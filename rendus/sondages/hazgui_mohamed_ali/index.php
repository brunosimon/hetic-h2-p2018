<?php 
	
	$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]images";

	require 'inc/config.php';

	// on appele et on stock en php toute les infos des superheros
	$query = $pdo->query('SELECT * FROM info_superheros');
	$super_heros = $query ->fetchAll();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Quicksand:300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/font-awesome.css">
		<script src="js/jquery-2.1.3.js"></script>
		<title>Acceuil</title>
	</head>
	<body>
		<header>
			<h1>Wich Super Hero do you prefer?</h1>
		</header>
		<div class="main_container">
			<?php foreach($super_heros as $super_hero) : ?>
				<div>
					<div class="vignette">
					<!-- on affiche l'image via la base de données -->
						<a href="#"><img src="<?= $url.'/'.$super_hero->image_mini ?>" alt=""></a>
						<p><?= $super_hero->name?></p>
					</div>
				
					<div class="info">
						<button class="back close"><i class="fa fa-times fa-5x"></i></button>
						<div class="img_container">
							<img src="<?= $url.'/'.$super_hero->image_maxi ?>" alt="">
						</div>
						<!-- on recupere toute les infos du personnage -->
						<p> Super Hero name : <?= $super_hero->name?></p>
						<p> Real name : <?= $super_hero->real_name?></p>
						<p> Creation : <?= $super_hero->creation?></p>
						<p> Weapons : <?= $super_hero->weapons?></p>
						<p> Short Story : <br><?= $super_hero->Story?></p>
						<form action="pages/resultat.php" method="POST">
							<input type="hidden" value="<?= $super_hero->id ?>" name="vote">
							<input type="submit" value="vote">
						</form>
					</div>
				</div>
			<?php endforeach ?>
		</div>

		<script>
			//recupère l'action du clique sur des images
			$('.vignette').on('click',function(){
				//securité pour eviter d'empiler les panneaux d'information
				$('.active').removeClass('open');
				//je recupere l'element le plus proche du bouton et lui applique une nouvelle class
				$(this).next().addClass('open active');
			});
			$('.close').on('click',function(){
				$(this).parent().removeClass('open');
			});

		</script>
	</body>
</html>