<?php

	require 'inc/config.php';
	require 'inc/fonctions.php';
	
	if(!empty($_GET['vote']))
	{
		updateVote($_GET['vote']);
	}

	if (!empty($_GET['pages'])) {
		
		$shows = getShows($_GET['pages']);

	} else {
		$shows = getShows();		
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TVShows</title>
	<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="styles/reset.css">
</head>
<body>
	<div id="header">
		<h1 id="title">WHAT TVSHOWS ARE YOU WATCHING ?</h1>
	</div>
	<div id="container">
		<?php foreach ($shows as $show): 
			$shows = getShow($show->imdb_id); ?>
		<div class="serie">
			<h2 class="show_name"> <?= $shows->title ?> <h2>
			<br> <br> 
			<img src="<?= $shows->images->poster ?>" width="120px" alt="tvshow poster">
			<br> <br> 
			<h3 class="people"><?= $show->vote ?> people are watching that TVshow. </h3>
			<br>
			<a href="?vote=<?= $show->id ?>" class="voting">I do too !</a>
		</div>
		<?php endForeach; ?>
	</div>
	<div id="footer">
		<a class="pages" href="index.php">1 - </a> 
		<a class="pages" href="index.php?pages=1">2 - </a>
		<a class="pages" href="index.php?pages=2">3 - </a>
		<a class="pages" href="index.php?pages=3">4 - </a>
		<a class="pages" href="results.php">Results</a>
	</div>
		

</body>
</html>
<?php

curl_close($ch);