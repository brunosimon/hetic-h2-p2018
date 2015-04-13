<?php
	session_start();

	require_once 'inc/config.php';

	// Selectionne la proposition du hub qui a le plus de vote
	$prepare = $pdo->prepare('SELECT MAX(vote) AS selected FROM propositions WHERE hub = :hub');
	$prepare->bindValue(':hub', $_SESSION['hub']);
	$prepare->execute();

	// Déplace la proposition séléctionné dans le tableau song
	$query = $pdo->query('INSERT INTO songs (selected, url, hub) VALUES (:url, :hub)');
	$query->bindValue(':hub', $_SESSION['hub']);
	$query->bindValue(':url', $selected->url);
	$query->execute();

	// Supprime toutes les propositions sur un hub en précis afin de réinitialiser les propositions et votes
	$prepare = $pdo->prepare('DELETE * FROM propositions WHERE hub = :hub');
	$prepare->bindValue(':hub', $_SESSION['hub']);
	$prepare->execute();