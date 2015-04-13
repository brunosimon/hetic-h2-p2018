<?php
	session_start();

	require_once 'inc/config.php';

	// Récupère le son qui a l'id le plus petit du bon hub (donc le plus récent)
	$prepare = $pdo->prepare('SELECT * FROM songs WHERE hub = :hub ORDER BY song_id ASC LIMIT 1');
	$prepare->bindValue(':hub', $_SESSION['hub']);
	$prepare->execute();
	$songs = $prepare->fetch(PDO::FETCH_ASSOC);

	// Le supprime directement
	$destroy = $pdo->prepare('DELETE FROM songs WHERE hub = :hub ORDER BY song_id ASC LIMIT 1');
	$destroy->bindValue(':hub', $_SESSION['hub']);
	$destroy->execute();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Player</title>
		<link rel="stylesheet" href="src/css/reset.css">
		<link rel="stylesheet" href="src/css/style-player.css">
	</head>

	<body>
		<p>Bienvenue sur le hub <?= $_SESSION['hub'] ?> </p>
		<p>L'identifiant du hub pour que vos proches se connectent : <?= $_SESSION['short'] ?></p>
		<?php if(!empty($songs)): ?>
			<div id="player">
				<iframe width='640' height='385' src='http://www.youtube.com/embed/<?= $songs['url'] ?>?rel=0&autohide=1&showinfo=0&autoplay=1' frameborder='0' type='text/html'></iframe>
			</div>
		<?php else: ?>
			<div class="error">Il n'y a pas encore de vidéo dans votre playlist.</div>
		<?php endif; ?>
	</body>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript">
		// Permet d
	    $(document).ready(function(){
	      pickProposition();
	    });

	    function pickProposition(){
	        $(document).load('inc/picking.php', function(){
	        	// Checking toutes les 3 minutes du fichier picking
	           setTimeout(pickProposition, 180000);
	        });
	    }
	</script>
</html>