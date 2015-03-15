<?php
if(!empty($_COOKIE['user_id']))
{

}
session_start();
//Montrer errors
error_reporting(E_ALL);
ini_set('display_errors',1);

// Connexion variables
define('DB_HOST','localhost');
define('DB_NAME','exercice-login-lachot_cedrick');
define('DB_USER','root');
define('DB_PASS','root'); // '' par défaut sur windows
define('SALT'   ,'7$9fds398ùJZYBà');

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
