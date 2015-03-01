<?php

// Show errors
error_reporting(E_ALL); 
ini_set('display_errors',1);

// Connexion variables
define('DB_HOST','localhost');
define('DB_NAME','hetic_p2018_g2_first');
define('DB_USER','root');
define('DB_PASS','root'); // '' par défaut sur windows

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


$data = array(
	'login'    => 'ksdhfksdhf',
	'password' => 'monpass',
	'email'    => 'toto@tata.com',
	'age'      => 25,
);

$prepare = $pdo->prepare('INSERT INTO users (login,password,email,age) VALUES (:login,:password,:email,:age)');

$prepare->bindValue(':login',$data['login']);
$prepare->bindValue(':password',$data['password']);
$prepare->bindValue(':email',$data['email']);
$prepare->bindValue(':age',$data['age']);

$result = $prepare->execute();

echo '<pre>';
print_r($result);
echo '</pre>';








