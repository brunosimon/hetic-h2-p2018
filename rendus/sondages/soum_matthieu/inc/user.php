<?php
	//Show errors
	error_reporting(E_ALL);
ini_set('displays_errors', 1);

define('DB_HOST','localhost');
define('DB_NAME','bdd_quiz_users');
define('DB_USER','root');
define('DB_PASS',true);

try
{
    // Try to connect to database
    $pdo2 = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);

    // Set fetch mode to object
    $pdo2->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
catch (Exception $e)
{
    // Failed to connect
    die('Cound not connect');
}
$pdo->query("SET NAMES UTF8"); // Accepter les accents