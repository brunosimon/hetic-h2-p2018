<?php
	require 'api-allocine-helper.php';
	require 'utf8.php';
// die('ok');
	 ini_set('error_reporting',0);

/************************************************************************
					VARIABLES GLOBALES
************************************************************************/

	$helper = new AlloHelper();


/************************************************************************
					ETAPE 1 : trouver les coordonnées 
					liste de tous les films à proximité
************************************************************************/

	// Récupère les coordonnées du JS et cible les cinémas à proximité
	if(!empty($_POST['lat']) && !empty($_POST['long'])  && !empty($_POST['rad'])  && !empty($_POST['firstQuestion'])){
		$lat	= $_POST['lat'];
		$long	= $_POST['long'];
		$rad 	= $_POST['rad'];
		$firstQuestion = $_POST['firstQuestion'];
		$secondQuestion = $_POST['secondQuestion'];

			// Classe correspondant à un film
		class movie{
			var $title;
			var	$genre;
			var	$release;
		}


		try{
			
			//Creation liste grâce à la geolocalisation
			$cinema = $helper->showtimesByPosition($lat, $long, $rad);
			$listMovie = movieList($cinema);

			// Question 1 : Seuleument les films récents ou pas ?
			$listMovie = firstQuestion($firstQuestion, $listMovie);
			//Question 2 : quels sont tes genres preferes ?
			$listMovie = secondQuestion($secondQuestion, $listMovie);
			
			//On enlève toute les variables null du tableau
			$listMovie = deleteNull($listMovie);
			
			function utf8_encode_deep(&$input) {
				if (is_string($input)) {
					$input = utf8_encode($input);
				} 
				else if (is_array($input)) {
					foreach ($input as &$value) {
						utf8_encode_deep($value);
					}
		
					unset($value);
				}
				else if (is_object($input)) {
					$vars = array_keys(get_object_vars($input));
		
					foreach ($vars as $var) {
						utf8_encode_deep($input->$var);
					}
				}
			}

			utf8_encode_deep($listMovie);
			echo json_encode($listMovie);
			exit();
		}
		catch( ErrorException $error ){
        	// En cas d'erreur
        	echo "Erreur n°", $error->getCode(), ": ", $error->getMessage(), PHP_EOL;
    	}
	}

	// Permet de faire la liste de tous les films à proximité
	function movieList($cinema){
		$LIST_MOVIE;
		for( $i = 0; $i < $cinema->totalResults; $i++){
					
		
			for ( $j = 0; $j < count($cinema->theaterShowtimes[$i]->movieShowtimes); $j++){
				$filmNonLu = $cinema->theaterShowtimes[$i]->movieShowtimes[$j]->onShow->movie->title;
				
				if(!estdansListe($filmNonLu, $LIST_MOVIE)){
					$film = new movie();
					$film->title = $filmNonLu;

					$film->genre = $cinema->theaterShowtimes[$i]->movieShowtimes[$j]->onShow->movie->genre;

					if(!isset($cinema->theaterShowtimes[$i]->movieShowtimes[$j]->onShow->movie->release)){
						$film->release = 0;
					}
					else{
						$film->release = $cinema->theaterShowtimes[$i]->movieShowtimes[$j]->onShow->movie->release->releaseDate;			
					}
					
					$LIST_MOVIE[count($LIST_MOVIE)] = $film;
				}

			}
		}
		return $LIST_MOVIE;
	}

	// On vérifie si un film est déjà dans la liste, return true si dans la Liste
	function estdansListe($film, $LIST_MOVIE){

		if (count($LIST_MOVIE) == 0){
			return false;
		}
		for ($i = 0; $i < count($LIST_MOVIE); $i++){

			if ($film == $LIST_MOVIE[$i]->title){
				return true;
			}
		}

		return false;
	}

/************************************************************************
					ETAPE 2 : LES QUESTIONS
************************************************************************/
	
	// Question 1 : Seuleument les films récents ou pas ?
	function firstQuestion($newMovie, $listMovie){
		if($newMovie == 'yes')
			$listMovie = deleteOldMovie($listMovie);
		return $listMovie;
	}

	// Supprime du tableau tous les films n'étant pas sortis en 2015 ou 2014
	function deleteOldMovie($LIST_MOVIE){
		for ($i = 0; $i < count($LIST_MOVIE); $i++) {
			// Utilisation des REGEX pour supprimer les films inférieurs à 2014
			if($LIST_MOVIE[$i]->release == 0 || !preg_match('/2015|2014/', $LIST_MOVIE[$i]->release)){
				unset($LIST_MOVIE[$i]);
			}
		}
		return $LIST_MOVIE;
	}


	//Question 2 : quels sont tes genres preferes ?
	function secondQuestion($genre, $listMovie){
		if(count($genre)!=0){
			$listMovie = deleteGenre($genre, $listMovie);
		}
		return $listMovie;
	}

	// On supprime les genres différents des genres selectionnés
	function deleteGenre($genre, $LIST_MOVIE){
		
		$max = count($genre);
		$idem = 0; // si le genre correspond

		for($i = 0; $i < count($LIST_MOVIE); $i++) {
			
			if(isset($LIST_MOVIE[$i])){
			
				for($j = 0; $j < count($LIST_MOVIE[$i]->genre); $j++) {
					
					for($l = 0; $l < $max; $l++){
						
						if($LIST_MOVIE[$i]->genre[$j]['$'] == $genre[$l]){
							$idem = 1;
							$l = $max;
						}
					}
				}
				if($idem == 0){
					unset($LIST_MOVIE[$i]);
				}
				$idem = 0;
			}
		}
		return $LIST_MOVIE;
	}

	//On supprime les éléments nuls du tableau
	function deleteNull($LIST_MOVIE){
		$finalList;

		for($i = 0; $i < count($LIST_MOVIE); $i++){
			if(isset($LIST_MOVIE[$i])){
				$finalList[count($finalList)] = $LIST_MOVIE[$i];
			}
		}
		return $finalList;
	}


/*************************************************************************
				BASE DE DONNEES
*************************************************************************/

if(!empty($_POST['movieSelected'])){


	 ini_set('error_reporting',1);

	$prepare = $pdo->prepare('SELECT title FROM movie WHERE title = :title');
	$prepare->bindValue(':title',$_POST['movieSelected']);
	$exec = $prepare->execute();

	if($prepare->fetch() === false){
			$prepare = $pdo->prepare('INSERT INTO movie (title,pictures,vote) VALUES (:title,:pictures,:vote)');
			$prepare->bindValue(':title',$_POST['movieSelected']);
			$prepare->bindValue(':pictures', 'empty');
			$prepare->bindValue(':vote', 1);
			$exec = $prepare->execute();
	}
	else{
		$prepare = $pdo->prepare('UPDATE movie SET vote = vote + 1 WHERE title = :title');
		$prepare->bindValue(':title',$_POST['movieSelected']);
		$exec = $prepare->execute();
	}

	$prepare = $pdo->prepare('SELECT vote FROM movie WHERE title = :title');
	$prepare->bindValue(':title', $_POST['movieSelected']);
	$prepare->execute();
	$vote = $prepare->fetch()->vote;

	//echo $_POST['movieSelected'].$prepare;
	if($vote == 1){
		$resultat ='<div class=textInfo>Quel courageux ! Tu es le premier à choisir'. $_POST['movieSelected']. '</div>';
	}
	else{
		$resultat = "<div class=textInfo>C'est un bon choix, ". $vote . " personnes on choisit " . $_POST['movieSelected'] . " avant toi !</div>";
		
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sondage</title>
	<link rel="stylesheet" href="src/css/style.css">
	<link rel="stylesheet" href="src/css/reset.css">
</head>
<body>
	<?php echo $resultat; 
		if(assert($resultat)){
			die();
		}
	?>
</body>
</html>
