<?php
// $_SESSION['pseudo'] = $user->pseudo;

//Show errors
    error_reporting(E_ALL); 
    ini_set("display_errors", 1);

    // Connexion variables
define('DB_HOST','localhost');
define('DB_NAME','exercice-login-benichou_jeanne');
define('DB_USER','root');
define('DB_PASS','root'); // '' par défaut sur windows
define('SALT'   ,'kjq*Z%LMD+/Jgfdstgr/JKBKJB'); //rajoute chaine de caractère pour le pass : SECURITE OBLIGATOIRE

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