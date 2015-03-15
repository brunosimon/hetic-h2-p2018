<?php
 	
 	require 'inc/config.php';

 	$mail = $_GET['mail'];
 	$hash = $_GET['hash'];

 	$pre = $pdo->prepare("SELECT key,activate FROM users WHERE mail = :mail ");  // "LIKE" permet d'effectuer une recherche sur un mot clé particulié = on séléctionne la clé et l'activation où le mail correspond au mail de l'url
	// LIKE est la meme chose que "=";
	if($pre->execute(array(':mail' => $mail)) && $data = $pdo->fetch())
 	{
	  	$keydb = $data['hash'];	// Récupération de la clé dans le tableau que la fonction fetch() à ressorti. 
	    $activate = $data['activate']; // $activate contiennt 0. 
    }

	
	if ($activate == 1) // savoir si le compte est déjà actif 
	{
		echo "Votre compte est déjà actif";
	}
	else 
	{
		if($hash == $hashdb) // Si la clés correspondent on active le compte et on incrémente activate de 1. 
		{
			echo "votre compte est activé";

			$pre = $pdo->prepare("UPDATE users SET activate = 1 WHERE mail = :mail "); // meme methode que la premiere avec le like, mais cete fois on ajoute 1 à la collone validate de la DB 
          	$pre->bindParam(':mail', $_POST['mail']); // Bind param car nous n'appellons pas de VALUES dans SQL 
          	$pre->execute();
		}
		else
		{
			echo "erreur, votre compte est invalidable";
		}
	}