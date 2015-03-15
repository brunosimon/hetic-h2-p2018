<?php
session_start();
unset($_SESSION);
session_unset();
session_destroy();
header('Location: index.php');