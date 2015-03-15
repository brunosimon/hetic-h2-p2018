<?php

	session_start ();
	// On récupère nos variables de session
	if (isset($_SESSION['mail']) && isset($_SESSION['password'])) { // isset test si la var est NULL(vide)
		// On teste pour voir si nos variables ont bien été enregistrées
		echo '<html>';
		echo '<head>';
		echo '<title>Page de notre section membre</title>';
		echo '</head>';

		echo '<body>';
		echo 'Votre login est '.$_SESSION['mail'].' et votre mot de passe est '.$_SESSION['password'].'.';
		echo '<br />';

		// On affiche un lien pour fermer notre session
		echo '<a href="./logout.php">Déconnection</a>';
	}
	else 
	{
		echo 'Les variables ne sont pas déclarées.';
	}

?>