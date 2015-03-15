<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Connexion variables
define('DB_HOST','localhost');
define('DB_NAME','exercice-login-lapi_romain');
define('DB_USER','root');
define('DB_PASS','root'); // '' par défaut sur windows
define('SALT','8kjhkbWHK>KM+MZ$D');
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

$exec = $pdo->exec( 'INSERT INTO users (id, login, email, password, age)  VALUES (NULL, "login", "email", "pass", "12")àç‡æ	•@* )' );

echo '<pre>';
print_r($exec);
echo '</pre>';