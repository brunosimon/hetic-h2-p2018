<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: login.php');
}
?>

<p>Vous etes connecté sur votre espace, <a href="deconnexion.php">se déconnecter</a></p>