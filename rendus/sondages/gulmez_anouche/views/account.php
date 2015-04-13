<?php $title = 'Account'; ?>

<h1>Modifier mes informations</h1>

<p>Attention : vous serez automatiquement déconnecté si vous changez votre mot de passe.</p>

<form action="account" method="post">
	<div class="elements">
		<p>
			<label for="password">Password</label>
			<input type="password" name="password" value="" placeholder="Password">
			<span><?= array_key_exists('password', $errors)?$errors['password']:'' ?></span>
		</p>
		<p>
			<label for="password_confirm">Confirm Password</label>
			<input type="password" name="password_confirm" value="" placeholder="Confirm Password">
			<span><?= array_key_exists('password_confirm', $errors)?$errors['password_confirm']:'' ?></span>
		</p>
	</div>
	<p><input type="submit" name="change" value="Change"></p>
</form>

<h2>Dernier résultat du questionnaire</h2>

<?php
// get user data from table results if some of them exist
$check = $pdo->prepare('SELECT COUNT(*) FROM results WHERE id_user = :id');
$check->bindValue(':id', $info->id);
$check->execute();

if(!($check->fetchColumn())) :
?>

	<p>Vous n'avez pas encore participé au questionnaire.</p>

<?php
else :
	// if data exist, got them
	$last_character = $pdo->prepare('SELECT * FROM results WHERE id_user = :id ORDER BY id DESC LIMIT 1');
	$last_character->bindValue(':id', $info->id);
	$last_character->execute();
	$character = $last_character->fetch();
?>

<div class="user_result">
	<img src="img/<?= $character->perso ?>.jpg" alt="<?= $character->perso ?>">
	<p><?= ucwords($character->perso) ?> <?= $character->perso=="ned"?'Flanders':'Simpson' ?></p>
	<p>Date d'obtention : <?= $character->date ?></p>
	<p>Heure d'obtention : <?= $character->hour ?></p>
</div>

<?php
endif;