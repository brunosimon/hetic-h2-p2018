<?php

require 'inc/config.php';

if(!empty($_SESSION)){
	$prepare = $pdo->prepare('DELETE FROM users WHERE mail = :mail LIMIT 1');
	$prepare->bindValue(':mail',$_SESSION['mail']);

	$prepare->execute();
	$user = $prepare->fetch();

	session_start();
	$_SESSION['thanks'] = 'Account deleted !';
	header('Location: index.php');
}


