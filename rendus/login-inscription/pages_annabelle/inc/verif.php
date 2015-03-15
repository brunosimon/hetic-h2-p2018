<?php
session_start();

//captcha image definition
$largeur  = 120;
$hauteur  = 40;
$longueur = 5;
$liste = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$code    = '';
$counter = 0;

$image = @imagecreate($largeur, $hauteur) or die("Can't set captcha")
;

for( $i=0; $i<10; $i++ ) {
   imageline($image,
   mt_rand(0,$largeur), mt_rand(0,$hauteur),
   mt_rand(0,$largeur), mt_rand(0,$hauteur),
   imagecolorallocate($image, mt_rand(200,255),mt_rand(200,255),mt_rand(200,255)
));
 }

//characters definition
for( $i=0, $x=0; $i<$longueur; $i++ ){
   $character = substr($liste, rand(0, strlen($liste)-1), 1);
   $x += 10 + mt_rand(0,10);
   imagechar($image, mt_rand(3,5), $x, mt_rand(5,20), $character,
   imagecolorallocate($image, mt_rand(0,155), mt_rand(0,155), mt_rand(0,155)));
   $code .= strtolower($character);
 }
   
  header('Content-Type: image/jpeg');
  imagejpeg($image);
  imagedestroy($image);


  $_SESSION['verif'] = $code;
?>