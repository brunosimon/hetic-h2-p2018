<?php 
define('DB_HOST','localhost');
define('DB_NAME','exercice-sondage-bonnike_tom');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');

try{
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USERNAME,DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
} catch (Exception $e){die('Could not connect');}