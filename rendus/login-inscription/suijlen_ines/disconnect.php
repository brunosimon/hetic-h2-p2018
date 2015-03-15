<?php

	session_start();
	require 'inc/config.php';
	
	header('Location: login.php');

	$prepare = $pdo->prepare('DELETE from users_session WHERE session_id = :session_id LIMIT 1');
	$prepare->bindValue(':session_id', session_id());
	$prepare->execute();

	session_destroy();