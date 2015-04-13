<?php

// Connexion variables
define('DB_HOST','localhost');
define('DB_NAME','exercice-sondage-tchoreloff_alexandra');
define('DB_USER','root');
define('DB_PASS','root'); // '' par défaut sur windows
define('SALT'   ,'zefzef8Y!çé"8A!');
define('AGE_MAX'    ,'1900-01-01');
define('AGE_MIN',date("Y-d-m"));

try
{
    // Try to connect to database
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME . ";charset=utf8",DB_USER,DB_PASS);

    // Set fetch mode to object
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
catch (Exception $e)
{
    // Failed to connect
    die('Could not connect');
}