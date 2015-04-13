<?php

// Show errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connexion variables
define('DB_HOST','localhost');
define('DB_NAME','exercice-sondage-riviere_magali');
define('DB_USER','root');
define('DB_PASS','root'); // '' par défaut sur windows
define('PREFIX_SALT','ezF54BQT234T52ZDFCdfgz2é"&é');
define('SUFFIX_SALT','rgfz:p$;g^lzer,;zefzefqv(">');

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
    die('C\'est pas la bonne BDD... bon courage Monsieur !');
}