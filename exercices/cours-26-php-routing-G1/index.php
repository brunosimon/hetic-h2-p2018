<?php

	require 'inc/config.php';

	$q = !empty($_GET['q']) ? $_GET['q'] : '';

	if(empty($q))
	{
		$view = 'home';
	}
	else if(preg_match('/^contact\/?$/', $q))
	{
		$view = 'contact';
	}
	else if(preg_match('/^news\/?$/', $q))
	{
		$view = 'news';
	}
	else if(preg_match('/^news\/\d+\/?$/', $q))
	{
		$view = 'news-single';
	}
	else
	{
		$view = 'not-found';
	}

	ob_start();
	include 'views/'.$view.'.php';
	$result = ob_get_clean();

	include 'partials/header.php';
	echo $result;
	include 'partials/footer.php';

