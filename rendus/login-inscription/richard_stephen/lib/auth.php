<?php

// Prevent acces to the given page without login.
// Must add "Connected();" to all the page you want to protect.

function Connected () {
	if (!isset($_SESSION['pseudo']) && !isset($_SESSION['id'])) {
		header ('Location: index.php');
		exit();
	}else{
		// echo '<a href="logout.php">Déconnexion</a>';
		$_SESSION['connected'] = true;
	}
}

