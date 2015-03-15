<?php
session_start ();

// On détruit les variables de notre session
session_unset ();

session_destroy ();

// On redirige le visiteur vers la page d'accueil
header ('location: login.php');
?>