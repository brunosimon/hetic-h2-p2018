<?php $title = 'Questionnaires'; ?>

<h1>Questionnaire</h1>

<!-- If not connected, display avertissement -->
<?php if(empty($_SESSION['pseudo'])) : ?>

<div class="notifications">
	<div class="notification">
		<h2>Authentification requise pour continuer</h2>
		<p>Afin de pouvoir valider le questionnaire, vous devez vous connecter.</p>
	</div>
</div>

<?php endif; ?>

<!-- Display the qcm -->
<form action="questionnaires" method="post">
	<!-- Question 1 -->
	<div class="qcm">
		<p>Lorsque vous êtiez enfant, vous rêviez d'être :</p>
		<p>
			<label>
				<input type="radio" name="question1" <?= $_POST['question1']=='triangle'?'checked':'' ?> id="question1" value="triangle">
				Une super star rebelle, comme Justin Bieber, mais sans sa coupe de cheveux
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question1" <?= $_POST['question1']=='diamond'?'checked':'' ?> id="question1" value="diamond">
				Mère Teresa! Sauver le monde, c'est ma raison de vivre
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question1" <?= $_POST['question1']=='star'?'checked':'' ?> id="question1" value="star">
				Une personne d'affaires, un peu comme Kim Kardashian, mais sans le duckface
			</label>
		</p>
	</div>
	<!-- Question 2 -->
	<div class="qcm">
		<p>Quelle est votre boisson préférée ?</p>
		<p>
			<label>
				<input type="radio" name="question2" <?= $_POST['question2']=='diamond'?'checked':'' ?> id="question2" value="diamond">
				Un soda sans sucre, sans bulles, ma ligne c'est tout ce qui compte
			</label>
		</p>		<p>
			<label>
				<input type="radio" name="question2" <?= $_POST['question2']=='circle'?'checked':'' ?> id="question2" value="circle">
				Une tisanne, après une dure journée j'ai besoin de me détendre
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question2" <?= $_POST['question2']=='square'?'checked':'' ?> id="question2" value="square">
				De l'alcool, sinon la fête n'est pas folle
			</label>
		</p>
	</div>
	<!-- Question 3 -->
	<div class="qcm">
		<p>Pour vous, un repas de famille, c'est surtout l'occasion de ...</p>
		<p>
			<label>
				<input type="radio" name="question3" <?= $_POST['question3']=='diamond'?'checked':'' ?> id="question3" value="diamond">
				Manger un repas délicieux fait avec amour, "Je peux me resservir ?"
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question3" <?= $_POST['question3']=='triangle'?'checked':'' ?> id="question3" value="triangle">
				Écouter mles potins, c'est toujours mieux que Les Anges de la Télé-réalité
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question3" <?= $_POST['question3']=='circle'?'checked':'' ?> id="question3" value="circle">
				Revoir tes cousins/cousines pour refaire les mêmes bêtises que quand vous aviez neuf ans
			</label>
		</p>
	</div>
	<!-- Question 4 -->
	<div class="qcm">
		<p>Quelle est votre destination préférée pour des vacances entre amis ?</p>		
		<p>
			<label>
				<input type="radio" name="question4" <?= $_POST['question4']=='star'?'checked':'' ?> id="question4" value="star">
				La France, pas la peine d'aller trop loin pour s'amuser
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question4" <?= $_POST['question4']=='triangle'?'checked':'' ?> id="question4" value="triangle">
				Le Japon, on va enfin pouvoir manger de vrais makis
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question4" <?= $_POST['question4']=='circle'?'checked':'' ?> id="question4" value="circle">
				Les USA, pour vivre comme les acteurs dans les séries - on va mettre nos empreintes comme des stars!
			</label>
		</p>
	</div>
	<!-- Question 5 -->
	<div class="qcm">
		<p>Est-ce que vous travaillez bien ?</p>
		<p>
			<label>
				<input type="radio" name="question5" <?= $_POST['question5']=='square'?'checked':'' ?> id="question5" value="square">
				Je n'arrête pas d'énerver mon boss, il va finir par me virer
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question5" <?= $_POST['question5']=='triangle'?'checked':'' ?> id="question5" value="triangle">
				Non, je ne fiche rien, mais mon boss m'admire tellement qu'il ne le voit même pas
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question5" <?= $_POST['question5']=='diamond'?'checked':'' ?> id="question5" value="diamond">
				Je travaille très dur, le salaire ça se mérite
			</label>
		</p>
	</div>
	<!-- Question 6 -->
	<div class="qcm">
		<p>Au restaurant, vous commandez...</p>
		<p>
			<label>
				<input type="radio" name="question6" <?= $_POST['question6']=='diamond'?'checked':'' ?> id="question6" value="diamond">
				Une soupe aux légumes, c'est bien de manger léger
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question6" <?= $_POST['question6']=='square'?'checked':'' ?> id="question6" value="square">
				Un bon gros steak, la viande c'est le Bien
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question6" <?= $_POST['question6']=='triangle'?'checked':'' ?> id="question6" value="triangle">
				Frites, Nutella.. Bah quoi ? C'est bon.
			</label>
		</p>
	</div>
	<!-- Question 7 -->
	<div class="qcm">
		<p>Que demanderiez vous si un génie vous proposait de réaliser un de vos vos voeux ?</p>
		<p>
			<label>
				<input type="radio" name="question7" <?= $_POST['question7']=='square'?'checked':'' ?> id="question7" value="square">
				Ne jamais avoir à travailler
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question7" <?= $_POST['question7']=='circle'?'checked':'' ?> id="question7" value="circle">
				Avoir des voeux illimités
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question7" <?= $_POST['question7']=='star'?'checked':'' ?> id="question7" value="star">
				Pouvoir voler comme un papillon
			</label>
		</p>
	</div>
	<!-- Question 8 -->
	<div class="qcm">
		<p>Quelle est votre série préférée ?</p>
		<p>
			<label>
				<input type="radio" name="question8" <?= $_POST['question8']=='star'?'checked':'' ?> id="question8" value="star">
				The Big Bang Theory
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question8" <?= $_POST['question8']=='circle'?'checked':'' ?> id="question8" value="circle">
				Breaking Bad
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question8" <?= $_POST['question8']=='triangle'?'checked':'' ?> id="question8" value="triangle">
				The Walking Dead
			</label>
		</p>
	</div>
	<!-- Question 9 -->
	<div class="qcm">
		<p>Si vous deviez participer à une émission de télé, ce serait ...</p>
		<p>
			<label>
				<input type="radio" name="question9" <?= $_POST['question9']=='circle'?'checked':'' ?> id="question9" value="circle">
				Top Chef
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question9" <?= $_POST['question9']=='triangle'?'checked':'' ?> id="question9" value="triangle">
				Secret Story
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question9" <?= $_POST['question9']=='star'?'checked':'' ?> id="question9" value="star">
				The Voice
			</label>
		</p>
	</div>
	<!-- Question 10 -->
	<div class="qcm">
		<p>Quel sport préférez vous ?</p>
		<p>
			<label>
				<input type="radio" name="question10" <?= $_POST['question10']=='triangle'?'checked':'' ?> id="question10" value="triangle">
				Les sports extrêmes
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question10" <?= $_POST['question10']=='circle'?'checked':'' ?> id="question10" value="circle">
				Le shopping
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question10" <?= $_POST['question10']=='square'?'checked':'' ?> id="question10" value="square">
				Aucun, moi j'aime dormir
			</label>
		</p>
	</div>
	<!-- Question 11 -->
	<div class="qcm">
		<p>Si vous deviez vous réincarner en objet, lequel serait-il ?</p>
		<p>
			<label>
				<input type="radio" name="question11" <?= $_POST['question11']=='star'?'checked':'' ?> id="question11" value="star">
				Une lampe, j'éclaire toujours les gens qui m'entourent
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question11" <?= $_POST['question11']=='square'?'checked':'' ?> id="question11" value="square">
				Une poêle, je serais au chaud et sentirais la bonne odeur d'huile chaude
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question11" <?= $_POST['question11']=='triangle'?'checked':'' ?> id="question11" value="triangle">
				Un rétroviseur de Harley Davidson, juste pour le fun
			</label>
		</p>
	</div>
	<!-- Question 12 -->
	<div class="qcm">
		<p>Face à un ordinateur, vous êtes plutôt ...</p>
		<p>
			<label>
				<input type="radio" name="question12" <?= $_POST['question12']=='star'?'checked':'' ?> id="question12" value="star">
				"Allons nous amuser à jouer avec les fichiers Win32"
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question12" <?= $_POST['question12']=='diamond'?'checked':'' ?> id="question12" value="diamond">
				"Oh non! Facebook est encore cassé. Bon, je rachète un nouveau PC"
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question12" <?= $_POST['question12']=='circle'?'checked':'' ?> id="question12" value="circle">
				"Allo David, je te dérange ?"
			</label>
		</p>
	</div>
	<!-- Question 13 -->
	<div class="qcm">
		<p>Vous avez un moment de libre dans la journée, que faites vous ?</p>
		<p>
			<label>
				<input type="radio" name="question13" <?= $_POST['question13']=='star'?'checked':'' ?> id="question13" value="star">
				Je lis un bouquin, grand-mère m'en avait offert un à Noel 
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question13" <?= $_POST['question13']=='circle'?'checked':'' ?> id="question13" value="circle">
				Je fais du rangement, c'était le bordel
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question13" <?= $_POST['question13']=='square'?'checked':'' ?> id="question13" value="square">
				Je dors
			</label>
		</p>
	</div>
	<!-- Question 14 -->
	<div class="qcm">
		<p>Vous décidez de faire une surprise à votre partenaire :</p>
		<p>
			<label>
				<input type="radio" name="question14" <?= $_POST['question14']=='triangle'?'checked':'' ?> id="question14" value="triangle">
				Vous l'emmenez dans son restaurant préféré, tant pis si vous y laissez un bras
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question14" <?= $_POST['question14']=='diamond'?'checked':'' ?> id="question14" value="diamond">
				Il/Elle adore vos petits plats, vous passez la journée en cuisine
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question14" <?= $_POST['question14']=='square'?'checked':'' ?> id="question14" value="square">
				Vous décongelez une pizza, l'important c'est juste de passer un moment en tête à tête
			</label>
		</p>
	</div>
	<!-- Question 15 -->
	<div class="qcm">
		<p>C'est bientôt son anniversaire, que faites vous ?</p>
		<p>
			<label>
				<input type="radio" name="question15" <?= $_POST['question15']=='star'?'checked':'' ?> id="question15" value="star">
				Allo belle maman ? J'ai besoin d'aide
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question15" <?= $_POST['question15']=='diamond'?'checked':'' ?> id="question15" value="diamond">
				Pas besoin de la belle-mère, vous connaissez votre moitié par coeur
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question15" <?= $_POST['question15']=='square'?'checked':'' ?> id="question15" value="square">
				Vous lui fabriquez quelque chose vous même, après tout, c'est le geste qui compte
			</label>
		</p>
	</div>
	<!-- Question 16-->
	<div class="qcm">
		<p>Vous vous réveillez un beau matin dans le corps d'une vedette, laquelle serait-elle ?</p>
		<p>
			<label>
				<input type="radio" name="question16" <?= $_POST['question16']=='triangle'?'checked':'' ?> id="question16" value="triangle">
				Robert Downey Junior
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question16" <?= $_POST['question16']=='diamond'?'checked':'' ?> id="question16" value="diamond">
				Jim Patterson
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question16" <?= $_POST['question16']=='circle'?'checked':'' ?> id="question16" value="circle">
				Vincent Cassel
			</label>
		</p>
	</div>
	<!-- Question 17 -->
	<div class="qcm">
		<p>Si vous aviez un pouvoir, lequel serait-ce ?</p>
		<p>
			<label>
				<input type="radio" name="question17" <?= $_POST['question17']=='star'?'checked':'' ?> id="question17" value="star">
				Lancer des boules de feu, j'ai toujours la haine contre mon professeur de sport de sixième
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question17" <?= $_POST['question17']=='circle'?'checked':'' ?> id="question17" value="circle">
				Voir et entendre à travers les murs, j'adore les potins
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question17" <?= $_POST['question17']=='square'?'checked':'' ?> id="question17" value="square">
				Pouvoir voler, j'arrive toujours en retard
			</label>
		</p>
	</div>
	<!-- Question 18 -->
	<div class="qcm">
		<p>Vous venez de rencontrer une personne, quelle est la première chose que vous faites ?</p>
		<p>
			<label>
				<input type="radio" name="question18" <?= $_POST['question18']=='triangle'?'checked':'' ?> id="question18" value="triangle">
				J'essaye d'avoir son numéro de téléphone, il (elle) est très mignon(ne)
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question18" <?= $_POST['question18']=='circle'?'checked':'' ?> id="question18" value="circle">
				Vous lui offrez un café, rien de mieux pour faire connaissance
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question18" <?= $_POST['question18']=='star'?'checked':'' ?> id="question18" value="star">
				Vous faites tout pour connaitre le signe astrologique de sa grande tante d'Australie, les signes sont importants pour la compatibilité
			</label>
		</p>
	</div>
	<!-- Question 19 -->
	<div class="qcm">
		<p>Pour vous, une bonne soirée, c'est ...</p>
		<p>
			<label>
				<input type="radio" name="question19" <?= $_POST['question19']=='diamond'?'checked':'' ?> id="question19" value="diamond">
				Pizza, coca, dodo
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question19" <?= $_POST['question19']=='star'?'checked':'' ?> id="question19" value="star">
				Resto, ciné, dodo
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question19" <?= $_POST['question19']=='square'?'checked':'' ?> id="question19" value="square">
				Ballade au jardin du Luxembourg, restaurant gastronomique, retour en taxi ... Et pourquoi pas ?!
			</label>
		</p>
	</div>
	<!-- Question 20 -->
	<div class="qcm">
		<p>Quelle est votre sauce préférée ?</p>
		<p>
			<label>
				<input type="radio" name="question20" <?= $_POST['question20']=='square'?'checked':'' ?> id="question20" value="square">
				Ketchup
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question20" <?= $_POST['question20']=='diamond'?'checked':'' ?> id="question20" value="diamond">
				Mayonnaise
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="question20" <?= $_POST['question20']=='star'?'checked':'' ?> id="question20" value="star">
				Samourai
			</label>
		</p>
	</div>
	<?php if(!empty($_SESSION['pseudo'])) : ?>
		<!-- Submit & Reset inputs -->
		<p><input type="submit" name="envoyer" value="Envoyer"></p>
		<p><input type="reset"></p>
	<?php endif; ?>
</form>

<!-- End of qcm -->

<!-- Some displays for success or error message after validate qcm -->

<?php if(isset($_POST['envoyer']) && ($_POST['envoyer'] == "Envoyer")) : ?>

<div class="notifications">

<?php
		// if validate qcm and data save are OK, display the personality you got
		if(isset($success['save']) && ($success['save'] == true)) {
			$last_character = $pdo->prepare('SELECT * FROM results WHERE id_user = :id ORDER BY id DESC LIMIT 1');
			$last_character->bindValue(':id', $info->id);
			$last_character->execute();
			$character = $last_character->fetch();
?>
	<div class="notification">
		<div class="left">
			<div class="img" style="background-image:url('img/<?= $character->perso ?>.jpg');width:90px;"></div>
		</div>
		<div class="right">
			<h2>Questionnaire validé</h2>
			<p>Votre personnalité semble être celle de <?= ucwords($character->perso) ?></p>
		</div>
	</div>
<?php
		}
?>

</div>


<div class="notifications_qcm">
<?php
		// If cannot save on database
		if(isset($success['sent']) && ($success['sent'] == "Erreur")) {
?>
			<div class="notification">
				<h2>Une erreur est survenue</h2>
				<p>Impossible d'enregistrer vos réponses</p>
			</div>
<?php
		}
		// if missing plus 5 answers
		if($errors['nberr'] > 5) {
?>
			<div class="notification">
				<h2>Erreur</h2>
				<p>Il manque trop de réponses</p>
			</div>

<?php
		}
		else {
			// if errors < 5
			for($i = 1; $i <= 20; $i++) {
				// then display an error message for each missing answer
				if(array_key_exists('question'.$i, $errors)) {
?>
					<div class="notification">
						<h2>Erreur</h2>
						<p><?= $errors['question'.$i] ?></p>
					</div>
<?php
				}
			}
		}
endif;

?>

</div>