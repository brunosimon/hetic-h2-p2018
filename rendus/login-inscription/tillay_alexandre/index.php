<?php
	session_start();
	if(isset($_SESSION["login"])) {
		header('Location: membres');
	}
	else {
		header('Location: connexion');
	}
?>