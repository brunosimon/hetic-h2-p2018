<?php

//Show Errors
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connexion variables
define('DB_HOST','localhost');
define('DB_PORT',8889);
define('DB_NAME','exercice-login-caron_morgan');
define('DB_USER','root');
define('DB_PASS','root');
define('SALT','gktovgiàç=tixea)$crf;ikéàçatjg;eàx');

try
{
	// Try to connect to database
	$conn = new PDO('mysql:host='.DB_HOST.';dbport='.DB_PORT.';dbname='.DB_NAME,DB_USER,DB_PASS);
	// Set fetch mode to object
	$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
			
}
catch (PDOException $e)
{
	// Failed to connect
	die('Could not connect : '.$e>getMessage());
}
