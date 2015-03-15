<?php	

	session_start();

	$_SESSION['captcha'] = rand(1000,9999); // créer un nombreà aléatoire entre 1000 et 9999. 
	$img = imagecreatetruecolor(70,30); // créer une image suportant la couleur et d'une taille de 70 px de large sur 30 pixel de hauteur
	$fill_color = imagecolorallocate($img,220,220,220); // définis une couleur pour une image en rvb "230" "230" "230"
	imagefilledrectangle($img,0,0,70,70,$fill_color); // créer un rectangle

	$text_color = imagecolorallocate($img,80,80,80); // stocker une couleur sur du noir. 
	$font = 'police.ttf'; // assignation du fichier pour la police
	imagettftext($img,23,0,5,30,$text_color,$font,$_SESSION['captcha']); // Ecrire un texte sur une image. 

	header("Content-Type:image/jpeg"); // afficher une image sur la page de notre navigateur
	imagejpeg($img); // Envoie l'image dans notre nav
	imagedestroy($img); // libère la mémoire de l'image de notre nav