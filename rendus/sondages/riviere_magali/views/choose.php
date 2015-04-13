<?php
$title = 'QCM';


// Redirection si non connecté
if(empty($_SESSION['pseudo'])) 
{
  header('Location:login');
  exit();
}

function put_error($type)
{
	global $errors;
	return array_key_exists($type, $errors) ? '<span class="alert">' . $errors[$type] . '</span>' : '';
}


// garde valeur si correcte pour checkbox / radio
function maintain_qcm($name, $value)
{
	if(isset($_POST[$name]))
	{
		if($_POST[$name] == $value)
			return true;
		else
			return false;
	}
}
?>

<div class="qcm-container">
	<form action="#" method="post">
		<!-- QCM 1 -->
		<fieldset class="qcm">
			<legend>Au coeur de la bataille, vous...   </legend>
			<p>
					<label>
						<input type="radio" name="scope" value="close" <?= maintain_qcm('scope', 'close') ? 'checked' : '' ?>>
						Foncez dans le tas, les batailles se gagnent en hachant menu ses ennemis !
					</label>
			</p>
			<p>
					<label>
						<input type="radio" name="scope" value="distance" <?= maintain_qcm('scope', 'distance') ? 'checked' : '' ?>>
						Restez loin de la mélée, choisissant et abattant votre cible avec soin. Précis, mortel et efficace.
					</label>
			</p>
			<?php echo put_error('scope'); ?>
		</fieldset>

		<!-- QCM 2 -->
		<fieldset class="qcm">
			<legend>Vous êtes plutôt   </legend>
			<p>
					<label>
						<input type="radio" name="category" value="support" <?= maintain_qcm('category', 'support') ? 'checked' : '' ?>>
						Généreux et altruiste, la victoire ne s'obtient que si toute l'équipe est sur ses pieds et prête à se battre.
					</label>
			</p>
			<p>
					<label>
						<input type="radio" name="category" value="assassin" <?= maintain_qcm('category', 'assassin') ? 'checked' : '' ?>>
						Energique et plein de hargne, la victoire sera plus facile à obtenir en marchant parmis les corps sans vie de vos adversaires.
					</label>
			</p>
			<p>
					<label>
						<input type="radio" name="category" value="warrior" <?= maintain_qcm('category', 'warrior') ? 'checked' : '' ?>>
						Solide comme un roc, personne ne parviendra à vous abattre. Et si personne ne peut vous tuer, comment ne pas sortir victorieux ?
					</label>
			</p>
			<p>
					<label>
						<input type="radio" name="category" value="specialist" <?= maintain_qcm('category', 'specialist') ? 'checked' : '' ?>>
						Patient et réfléchi, la victoire peut s'obtenir de différentes manières. Il suffit juste de choisir la bonne...
					</label>
			</p>
			<?php echo put_error('category'); ?>
		</fieldset>
		
		<!-- QCM 3 -->
		<fieldset class="qcm">
			<legend>Vos univers Blizzard préférés (réponses multiples possibles)   </legend>
			<p>
					<label>
						<input type="checkbox" name="diablo" value="Diablo" <?= maintain_qcm('diablo', 'Diablo') ? 'checked' : '' ?>>
						Diablo
					</label>
			</p>
			<p>
					<label>
						<input type="checkbox" name="starcraft" value="Starcraft" <?= maintain_qcm('starcraft', 'Starcraft') ? 'checked' : '' ?>>
						Starcraft
					</label>
			</p>
			<p>
					<label>
						<input type="checkbox" name="warcraft" value="Warcraft" <?= maintain_qcm('warcraft', 'Warcraft') ? 'checked' : '' ?>>
						Warcraft
					</label>
			</p>
			<?php echo put_error('game'); ?>
		</fieldset>

		<!-- QCM 4 -->
		<fieldset class="qcm">
			<legend>Et au niveau de l'égalité des sexes ?</legend>
			<p>
					<label>
						<input type="radio" name="sex" value="same" <?= maintain_qcm('sex', 'same') ? 'checked' : '' ?>>
						Je veux que mon personnage soit du même genre que moi.
					</label>
			</p>
			<p>
					<label>
						<input type="radio" name="sex" value="different" <?= maintain_qcm('sex', 'different') ? 'checked' : '' ?>>
						Je ne veux pas que mon personnage soit du même genre que moi.
					</label>
			</p>
			<p>
					<label>
						<input type="radio" name="sex" value="dont-care" <?= maintain_qcm('sex', 'dont-care') ? 'checked' : '' ?>>
						Peu m'importe, du moment qu'il roxx.
					</label>
			</p>
			<?php echo put_error('sex'); ?>
		</fieldset>
		<input type="submit" name="qcm" value="Envoyez !">

	</form>
</div>


<!--  AFFICHAGE RESULTATS -->
<?php if(isset($heroes[0]) && $heroes != 'vide') { ?>

<div class="results-container">

<?php foreach ($heroes as $value) { ?>

	<p>
		<a href="<?= $value->url ?>" target="_blank">
			<img class="img-qcm left" style="background-image:url('src/img/<?= $value->name ?>.png');" alt="<?= $value->name ?>">
		</a>
		Ce Héros semble vous correspondre : <a class="name-a" href="<?= $value->url ?>" target="_blank"><?= $value->name ?></a>
	</p>

<?php } ?>

</div>

<?php 
	}
	else if(isset($heroes[0]) && $heroes == 'vide') { 
?>

<div class="results-container">
	<p>
		<img class="img-qcm left" style="background-image:url('src/img/unknow.png');">
		Malheureusement, aucun Héros ne semble correspondre à vos critères... relancez un test en élargissant vos critères : le Nexus vous attend !!
	</p>
</div>

<?php } ?>