<?php
$sujet = htmlspecialchars($_POST["subject"]);
$message = htmlspecialchars($_POST["content"]);
$message .= htmlspecialchars($_POST["name"]);
$destinataire = 'remi.wetteren@hetic.net';
$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"";
if(mail($destinataire,$sujet,$message,$headers))
{
        header('Location: ../Psycho/goodMail');
}
else
{
        header('Location: ../Psycho/erreurMail');
}
?>