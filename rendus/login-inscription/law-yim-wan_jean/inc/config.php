<?php

//Peut être remplacé par E_WARNING, E_PARSE, E_NOTICE, E_ERROR
error_reporting(E_ALL); 
ini_set("display_errors", 1);

// Connexion variables
define('DB_HOST','localhost');
define('DB_NAME','exercice-login-law-yim-wan_jean');
define('DB_USER','root');
define('DB_PASS','root'); // '' par défaut sur windows
define('SALT'   ,'UGHKLJGDYFUG(§ÈÇ!675UFJVK6R87TOYI');

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
