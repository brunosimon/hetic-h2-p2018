<?php

//Variables du formulaire
$email = 'youssramanad@gmail.com';
$lastname = $_POST['lastname'];
$name = $_POST['name'];
$date = $_POST['date'];
$message = $_POST['message'];
 
// Mail
$object = 'Confirmation de votre réservation' ;
$content = '
<html>
<head>
   <title>Vous avez réservé sur notre site ...</title>
</head>
<body>
   <p>Bonjour Mr/Mmme '.$nom.'</p>
   <p>blablablabla</p>
</body>
</html>';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                         
//Envoi du mail
mail($mail, $object, $content, $headers);
?>