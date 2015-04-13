<?php
	session_start();

	require_once 'inc/config.php';

	// Permet de séléctionner toutes les propositions
	$prepare = $pdo->prepare('SELECT * FROM propositions WHERE hub = :hub');
	$prepare->bindValue(':hub', $_SESSION['hub']);
	$prepare->execute();
	$propositions = $prepare->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Voting</title>
		<link rel="stylesheet" href="src/css/reset.css">
		<link rel="stylesheet" href="src/css/style-player.css">
	</head>

	<body>
		<h2>Votez pour une vidéo :</h2>

		<?php foreach($propositions as $_proposition): ?>
			<div class="proposition">
				<iframe width='640' height='385' src='http://www.youtube.com/embed/<?= $_proposition->url ?>?rel=0&autohide=1&showinfo=0' frameborder='0' type='text/html'></iframe>
				<div>
					<a href="?vote=<?= $_proposition->url?>">Votez</a>
				</div>
			</div>
		<?php endforeach; ?>
	</body>
</html>

<?php
	// Permet de voter sur une vidéo en précis, et si l'utilisateur a déjà voté, on lui indique une erreur
	if(!empty($_GET['vote'])) {
		$vote_check = $pdo->prepare('SELECT vote FROM users WHERE username = :username');
		$vote_check->bindValue(':username', $_SESSION['username']);
		$vote_check->execute();
		$vote_fetch = $vote_check->fetch(PDO::FETCH_ASSOC);

		if(!empty($vote_fetch['vote']))
			echo 'Vous avez déjà voté';
		else {
			$prepare = $pdo->prepare('UPDATE users SET vote = vote + 1 WHERE username = :username');
			$prepare->bindValue(':username', $_SESSION['username']);
			$prepare->execute();

			$prepare = $pdo->prepare('UPDATE propositions SET vote = vote + 1 WHERE url = :url');
			$prepare->bindValue(':url', $_GET['vote']);
			$prepare->execute();
		}
	}
 ?>