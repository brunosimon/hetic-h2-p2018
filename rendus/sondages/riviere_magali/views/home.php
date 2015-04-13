<?php 
$title = 'Accueuil';
// Récupération de tous les héros
$prepare = $pdo->prepare('SELECT * FROM heroes');
$prepare->execute();
$heroes = $prepare->fetchAll();
?>


<div class="img">

<?php foreach ($heroes as $value) { ?>
	<div>
		<a href="<?= $value->url ?>" target="_blank">
			<img src="src/img/<?= $value->name ?>.png" alt="<?= $value->name ?>" width="120px" height="120px" class="rotate">
		</a>
		<span class="name"><?= $value->name ?></span>
		<img class="icons category" src="src/img/icons/<?= $value->category ?>.png" alt="<?= $value->category ?>" width="22px" height="30px" boder="0px">
		<img class="icons game" src="src/img/icons/<?= $value->game ?>.png" alt="<?= $value->game ?>" width="25px" height="25px">
	</div>

<?php } ?>
</div>