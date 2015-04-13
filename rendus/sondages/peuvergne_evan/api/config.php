<?php

	// JSON FORMAT
	header('Content-Type: application/json');
	
	// Show errors
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	// Connexion variables
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'exercice-sondage-peuvergne_evan');
	define('DB_USER', 'root');
	define('DB_PASS', 'root');


	try
	{
		// Try to connect to database
		$pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);

		// Set fetch mode to object
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
	}
	catch (Exception $e)
	{
		// Failed to connect
    	die('Cound not connect');
	}


	/*
		RENDER
	*/

	function render ($params)
	{

		$messages = array(
			201 => 'OK',
			201 => 'Created',
			404 => 'Not Found',
			403 => 'Unauthorized',
			405 => 'Method Not Allowed'
		);

		header("HTTP/1.0 " . $params['code'] . " " . $messages[$params['code']]);
		echo json_encode($params);
	
	}