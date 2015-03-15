<?php

session_start();

if ($_SESSION['username']) 
{

echo "Bienvenue ".$_SESSION['username'] . " ! <br/><br/> <a href='logout.php'> Se deconnecter </a>"; 

}
else header ('Location: login.php');

?>