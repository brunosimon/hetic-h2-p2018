<?php
	require('config.php');
	//ferme la session
	session_destroy();		
	// redirige vers le login
	header('Location: ../index.php');
?>