<?php
	require 'inc/config.php';
	include 'src/php/form.php';
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
	
	<div class="content">
		<form action="#" class="listMovie">
			
			<div class="titleSite">Prêt à aller voir un film ?</div>
			
			<div class="question first-question">
				<div class="textInfo">Pour commencer quel est ton rayon d'action ?</div>
				<input type="number" class="radius" value=8>km
			</div>
			
			<div class=" question second-question">
				<div class="textInfo">Veux-tu voir uniquement des films récent ?</div>
				<label>Oui
					<input type="radio" name="newMovie" value="yes" checked>
				</label>
				<label for="no">Non
					<input type="radio" name="newMovie" value="no" id="no">
				</label>
			</div>

			<div class="question third-question">
				<div class="textInfo">Quels sont tes deux genres favoris ?</div>
					<label>
						Action
						<input type="checkbox" class="genre" name="whatGenre" value="Action">
					</label>
					<label>
						Animation
						<input type="checkBox" class="genre" name="whatGenre" value="Animation">
					</label>
					<label>
						Arts Martiaux
						<input type="checkBox" class="genre" name="whatGenre" value="Arts Martiaux">
					</label>
					<label>
						Aventure
						<input type="checkBox" class="genre" name="whatGenre" value="Aventure">
					</label>
					<label>
						Biopic
						<input type="checkBox" class="genre" name="whatGenre" value="Biopic">
					</label>
					<label>
						Bollywood
						<input type="checkBox" class="genre" name="whatGenre" value="Bollywood">
					</label>
					<label>
						Classique
						<input type="checkBox" class="genre" name="whatGenre" value="Classique">
					</label>
					<label>
						Comédie
						<input type="checkBox" class="genre" name="whatGenre" value="Comédie">
					</label>
					<label>
						Comédie dramatique
						<input type="checkBox" class="genre" name="whatGenre" value="Comédie dramatique">
					</label>
					<label>
						Comédie musical
						<input type="checkBox" class="genre" name="whatGenre" value="Comédie musical">
					</label>
					<label>
						Concert
						<input type="checkBox" class="genre" name="whatGenre" value="Concert">
					</label>
					<label>
						Dessin animé
						<input type="checkBox" class="genre" name="whatGenre" value="Dessin animé">	
					</label>
					<label>
						Documentaire
						<input type="checkBox" class="genre" name="whatGenre" value="Documentaire">
					</label>
					<label>
						Drama
						<input type="checkBox" class="genre" name="whatGenre" value="Drama">
					</label>
					<label>
						Drame
						<input type="checkBox" class="genre" name="whatGenre" value="Drame">
					</label>
					<label>
						Epouvante-horreur
						<input type="checkBox" class="genre" name="whatGenre" value="Epouvante-horreur">
					</label>
					<label>
						Erotique
						<input type="checkBox" class="genre" name="whatGenre" value="Erotique">	
					</label>
					<label>
						Espionnage
						<input type="checkBox" class="genre" name="whatGenre" value="Espionnage">
					</label>
					<label>
						Expérimental
						<input type="checkBox" class="genre" name="whatGenre" value="Expérimental">
					</label>
					<label>
						Famille
						<input type="checkBox" class="genre" name="whatGenre" value="Famille">
					</label>
					<label>
						Fantastique
						<input type="checkBox" class="genre" name="whatGenre" value="Fantastique">	
					</label>
					<label>
						Guerre
						<input type="checkBox" class="genre" name="whatGenre" value="Guerre">
					</label>
					<label>
						Historique
						<input type="checkBox" class="genre" name="whatGenre" value="Historique">
					</label>
					<label>
						Judiciaire
						<input type="checkBox" class="genre" name="whatGenre" value="Judiciaire">	
					</label>
					<label>
						Musical
						<input type="checkBox" class="genre" name="whatGenre" value="Musical">
					</label>
					<label>
						Opera
						<input type="checkBox" class="genre" name="whatGenre" value="Opera">
					</label>
					<label>
						Péplum
						<input type="checkBox" class="genre" name="whatGenre" value="Péplum">
					</label>
					<label>
						Policier
						<input type="checkBox" class="genre" name="whatGenre" value="Policier">
					</label>
					<label>
						Romance
						<input type="checkBox" class="genre" name="whatGenre" value="Romance">
					</label>
					<label>
						Science fiction
						<input type="checkBox" class="genre" name="whatGenre" value="Science fiction">
					</label>
					<label>
						Thriller
						<input type="checkBox" class="genre" name="whatGenre" value="Thriller">
					</label>
					<label>
						Western
						<input type="checkBox" class="genre" name="whatGenre" value="Western">
					</label>
			</div>
			
			<div class="submit">
				<input class ="validateChoice" type="submit">
			</div>

		</form>

		<div class='wait'></div>


	<form class="finalMovie" action="#" method="post">
	</form>

	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="src/js/script.js"></script>
</body>
</html>
