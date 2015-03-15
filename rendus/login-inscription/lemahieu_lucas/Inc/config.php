<?php

// Show errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connexion variables
define('DB_HOST'	   ,'localhost');
define('DB_NAME'	   ,'exercice-login-lemahieu_lucas');
define('DB_USER'	   ,'root');
define('DB_PASS'	   ,'root'); // '' par défaut sur windows
define('PREFIX_SALT'   ,'qo^ngRE£G?0RE>9JF/0I304GI304>');
define('SUFFIX_SALT'   ,'rgzrf^!^!ef888efzefz651zefqq>');

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