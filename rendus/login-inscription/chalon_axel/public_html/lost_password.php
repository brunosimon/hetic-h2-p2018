<?php
require('inc/config.php');
session_start();

if (!empty($_POST))
{
    $req = $pdo->prepare('SELECT * FROM users WHERE mail=:mail OR login=:login');
    $req->bindValue('login',$_POST['mailorlogin']);
    $req->bindValue('mail',$_POST['mailorlogin']);
    $req->execute();
    
    if (($user = $req->fetch()) === false)
    {
        $error = 'Compte introuvable';   
    }
    else
    {
        $box = 'abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $token='';
        for ($i=1; $i<=15; $i++)
        {
            $token.=$box[rand(0,strlen($box)-1)];
        }

        $req = $pdo->prepare('INSERT INTO tokens_reset(token, user_id) VALUES(:token,:user_id)');
        $req->bindValue('token',$token);
        $req->bindValue('user_id',$user['id']);
        $req->execute();

        mail($user['mail'],'Retrouvez votre mot de passe','Bonjour '. $user['login'] .",\n\nPour réinitialiser votre mot de passe, merci de visiter le lien suivant : ".SERVER.'/reset_password.php?token='.$token."\n\nÀ très bientôt sur notre site !",'From: Mon super site <inscription@monsupersite.com>');

        $sent = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mot de passe oublié</title>
</head>
<body>
    <a href="index.php">Accueil</a><br/><br/>
    
    <?php
    if (isset($sent))
    {
    ?>
        Un mail vous a été envoyé.
    <?php
    }
    ?>
    
    <?php if (isset($error)) echo $error; ?>
    <form action="" method="POST">
        <label for="mailorlogin">Nom d'utilisateur ou adresse mail</label>
        <input type="text" id="mailorlogin" name="mailorlogin">
        
        <button type="submit">Récupérer mon mot de passe</button>
    </form>
</body>
</html>