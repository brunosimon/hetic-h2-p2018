<?php
	session_start();
  	unset($_SESSION['login']);
  	session_destroy();
  	header('Location: login.php');
?>
