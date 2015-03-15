<?php 

//SESSION START 
session_start();

$_SESSION = array();
session_destroy();
header('Location:index.php')

?>