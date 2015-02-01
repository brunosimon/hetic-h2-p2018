<?php

// Connexion variables
define('DB_HOST','localhost');
define('DB_NAME','hetic-p2018-first');
define('DB_USER','root');
define('DB_PASS','root');

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

$query = $pdo->query('SELECT * FROM users');

echo '<pre>';
print_r($query->fetch());
echo '</pre>';
