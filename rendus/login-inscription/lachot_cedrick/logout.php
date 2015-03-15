<?php
require 'Inc/config.php';

$_SESSION = array();
session_destroy();
header('Location: login.php');
?>