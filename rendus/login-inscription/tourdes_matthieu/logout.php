<?php

require 'inc/config.php';

$_SESSION = [];
session_destroy();
header('Location: index.php');
