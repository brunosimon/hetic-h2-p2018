<?php

	/**
	 * TODO
	 *
	 * [ ] files structure (partials/views/src)
	 * [ ] .htaccess url rewriting
	 * [ ] php url rewriting
	 * [ ] assets issue / url config
	 * [ ] title issue / ob_start
	 */

	require 'inc/config.php';

	// Routing
	$q = isset($_GET['q']) ? $_GET['q'] : '';

	if(empty($q))
	{
		$page = 'home';
	}
	else if(preg_match('/contact\/?$/', $q))
	{
		$page = 'contact';
	}
	else if(preg_match('/news\/?$/', $q))
	{
		$page = 'news';
	}
	else if(preg_match('/news\/[0-9]+\/?$/', $q))
	{
		$page = 'news-single';
	}

	// Save the page content inside $result
	ob_start();
	include 'views/'.$page.'.php';
	$result = ob_get_clean();

	// Show result between header and footer
	include 'partials/header.php';
	echo $result;
	include 'partials/footer.php';
	
