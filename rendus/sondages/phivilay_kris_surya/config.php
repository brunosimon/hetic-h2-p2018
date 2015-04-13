<?php
session_start();
if(isset($_GET['user'])){
    $_SESSION['user_id'] = $_GET['user'];
}

error_reporting(E_ALL);
ini_set('display_errors',1);

define('DB_HOST','localhost');
define('DB_NAME','exercice-sondage-phivilay_kris_surya');
define('DB_USER','root');
define('DB_PASS','root'); // '' par défaut sur windows

try
{
    // Try to connect to database
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    // Set fetch mode to object
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
catch (Exception $e)
{
    // Failed to connect
    die('Cound not connect');
}