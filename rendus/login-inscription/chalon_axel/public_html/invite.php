<?php
require('inc/config.php');
session_start();

if (!isset($_SESSION['loggedIn'])) die(); // on ne peut inviter des personnes que si on est loggué

mail($_POST['mail'],$_SESSION['user_login'] . '  vous invite sur mon super site','Bonjour '. $_POST['mail'] .",\n\n".$_SESSION['user_login'] . ' vous a invité à rejoindre mon super site. Cliquez ici pour vous inscrire : '.SERVER.'/signup.php?referrer_id='.$_SESSION['user_id']."&mail=".urlencode($_POST['mail'])."\n\nÀ très bientôt sur notre site !",'From: Mon super site <inscription@monsupersite.com>'); // envoi du mail avec le lien à parainnage

$_SESSION['invited'] = true; // permet d'afficher le message "Le mail a été envoyé"

header('Location: index.php');
exit();