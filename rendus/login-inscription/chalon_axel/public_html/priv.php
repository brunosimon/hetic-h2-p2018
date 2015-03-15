<?php
require('inc/config.php');
session_start();

if (!isset($_SESSION['loggedIn']))
{
    header('Location: signin.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page privée</title>
</head>
<body>
    
    <a href="index.php">Accueil</a><br/><br/>
 
    Exemple de page privée.
</body>
</html>