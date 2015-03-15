<?php
error_reporting(E_ALL);
ini_set('display_error', 1);

session_start();

// Connexion variables
define('DB_HOST','localhost');
define('DB_NAME','exercice-login-manad_youssra');
define('DB_USER','root');
define('DB_PASS','root'); // '' par défaut sur windows
define('SALT' , '546541fdvhfdTRGSDFT54v1547');
define ('SUFFIX_SALT', 'jhdvcljghdcnkjdhclu5465c7d4er54fERFZERFZEFze5f46zef');
define ('PREFIX_SALT', 'GFGRFG54685Fvf8f15ERF657fVERFljhf5847feàç');

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