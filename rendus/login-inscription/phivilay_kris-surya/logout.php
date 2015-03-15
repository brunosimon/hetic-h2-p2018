<?php

session_start();
unset($_SESSION['membre']);
session_destroy();
header('Location: login.php');

?>