<?php
	require 'inc/config.php';

	$q = isset($_GET['q']) ? $_GET['q'] : '';
	$prepare = $pdo->prepare('SELECT `url` FROM sondages where url = :url');
	$prepare->bindValue(':url',$q);

	if (empty($q)){
		$view = 'home';
	}

	else {
		$prepare->execute();
		if ($prepare->fetch()){ // Si l'url entrée correspond à un sondage
			$view = 'poll'; // On l'affiche
		}
		else if (preg_match('/^[a-z0-9]+\/results\/?$/', $q)){ // Si l'url entrée correspond à un sondage et à /result derrière
			$view = 'result'; // On affiche les résultats de ce sondage /^news\/\d+\/?$/',
		}
		else { // Sinon, le sondage n'existe pas
			$view = '404'; // On affiche alors la page 404
		}
	}

	ob_start();
	include 'views/'.$view.'.php';
	$result = ob_get_clean();
	include 'partials/header.php';
	echo $result;
	include 'partials/footer.php';
?>