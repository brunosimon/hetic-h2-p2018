<?php $title = 'Administration - '.$info->pseudo; ?>

<h1>Administration</h1>

<p>Bienvenue <?= $info->pseudo ?>, voici la liste des membres de votre site</p>

<h3>Liste des membres</h3>

<?php
// count number of members
$nbUsers =  $pdo->query('SELECT COUNT(*) FROM users where id > 1')->fetchColumn();

// if no members
if($nbUsers == 0) :

?>

<p>Malheureusement, personne ne s'est inscrit pour le moment.</p>

<?php

else :
	// if some members, display their informations
	$sql = 'SELECT * FROM users where id > 1';
	$query = $pdo->query($sql);
	$users = $query->fetchAll();

	foreach($users as $_user) :
?>

	<div class="informations">
		<h2><?= $_user->pseudo ?></h2>
		<hr />
		<p><span>ID</span>: <?= $_user->id ?></p>
		<!-- <p><span>Pseudo</span>: <?= $_user->pseudo ?></p> -->
		<p><span>Email</span>: <a href="mailto:<?= $_user->email ?>"><?= $_user->email ?></a></p>
		<p><span>Inscription</span>: <?= $_user->date_signin ?></p>
		<p>
			<?= (empty($_user->last_signup) || ($_user->last_signup == "0000-00-00 00:00:00"))?'Ce membre ne s\'est pas encore connecté depuis son inscription':'<span>Dernière connexion</span>: '.$_user->last_signup ?>
		</p>
<?php

// check if user participate to the qcm
$check = $pdo->prepare('SELECT COUNT(*) FROM results WHERE id_user = :id');
$check->bindValue(':id', $_user->id);
$check->execute();

if(!($check->fetchColumn())) :
?>

		<p>Ce membre n'a pas encore participé au questionnaire</p>

<?php
else :
	$last_character = $pdo->prepare('SELECT * FROM results WHERE id_user = :id ORDER BY id DESC LIMIT 1');
	$last_character->bindValue(':id', $_user->id);
	$last_character->execute();
	$character = $last_character->fetch();
?>
		
		<p><span>Dernier personnage obtenu</span>: <?= ucwords($character->perso) ?> <?= $character->perso=="ned"?'Flanders':'Simpson' ?></p>	

<?php
endif;
?>

	</div>

<?php
	endforeach;
endif;