<?php

	require 'inc/config.php';

	$q = !empty($_GET['q']) ? $_GET['q'] : '';

	if(empty($q))
	{
		die('Home');
	}
	else if(preg_match('/^contact\/?$/', $q))
	{
		die('Contact');
	}
	else if(preg_match('/^news\/?$/', $q))
	{
		die('News');
	}
	else if(preg_match('/^news\/\d+\/?$/', $q))
	{
		die('News single');
	}



