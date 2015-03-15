<?php

define('DB_HOST','localhost');
define('DB_NAME','exercice-login-batchevitch');
define('DB_USER','root');
define('DB_PASS','root'); // '' par défaut sur windows

$salt_string = "";

// Let's create secure a random SALT and hash it
for ($i = 0; $i < 45; $i++) {
	$salt_string .= chr(rand(0,250));
}

$salt_string = hash('sha256', $salt_string);

define('SALT', $salt_string);
define('COOKIE_SALT', hash('sha256', $salt_string));

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
	die('Could not connect');
}