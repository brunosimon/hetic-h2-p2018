<?php

require 'controller.php';

if (!empty($_GET['ranked']) && !empty($_GET) && $_GET['ranked']) {
	$ranked = true;
	$students = getRank();
} else {
	$ranked = false;
	$students = readAll();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Vote for promo</title>
	<link rel="stylesheet" href="css/app.css">
</head>
<body>
	<header>
		<h1>TopPromo</h1>
		<ul>
			<li>Clique pour voter pour les personnes que tu as envie..</li>
			<?php if ($ranked): ?>
				<li><a href="index.php">Vote</a></li>
			<?php else: ?>
				<li><a href="index.php?ranked=true">Ranked</a></li>
			<?php endif; ?>
		</ul>
		<h5>made with <span>♥</span> in Montreuil</h5>
	</header>
	<div class="container">
		<?php foreach ($students as $student): ?><?php $data = readOpenGraph($student->facebook_id); ?><article class='<?= ($ranked) ? "ranked" : '' ?>' <?= (!$ranked) ? 'onclick="poll(this,'.$student->id.')"' : '' ?> style="background-image:url('http://graph.facebook.com/<?= $student->facebook_id ?>/picture?type=large')"><div class="over"></div><h2><?= $data->name ?></h2><span><?= $student->votes ?></span></article><?php endforeach ?>
	</div>

	<script src="app.js"></script>
</body>
</html>