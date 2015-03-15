<?php

// Connexion variables
define('DB_HOST','localhost');
define('DB_NAME','exercice-login-grivet_rodolphe');
define('DB_USER','root');
define('DB_PASS','root'); // '' par défaut sur windows
define('SALT'	,'SDPFOGJSEPÖGHNSDOB');

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

// UPDATE $exec = $pdo->exec("UPDATE users SET login = 'Cedrick' WHERE id = 2");
// DELETE $exec = $pdo->exec("DELETE FROM users WHERE age = 20");
// INSERT $exec = $pdo->exec('INSERT INTO users (login,password,email,age) VALUES ("Cedrick_bis","password","email@gmail.com",30)');
//$exec = $pdo->exec('INSERT INTO users (login,password,email,age) VALUES ("Cedrick_bis","password","email@gmail.com",30)');


//echo '<pre>';
//print_r($exec);
//echo '</pre>';