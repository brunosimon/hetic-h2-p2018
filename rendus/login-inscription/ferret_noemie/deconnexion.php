<?php 
session_start();

// Suppression des variables de session et de la session
// 

unset($_SESSION);

session_destroy();


header('Location: login.php');
die();