<?php
require('inc/config.php');
session_start();

if (!empty($_POST))
{
    if (strlen($_POST['password']) < 7)
    {
        $error = 'Votre mot de passe doit faire au moins 7 caractères de long.';
    }
    else if (strlen($_POST['password']) > 30)
    {
        $error = 'Votre mot de passe doit faire moins de 31 caractères.';
    }
    else if (!preg_match('#[\.\\\+\*\?\[\^\]\$\(\)\{\}\=\!\<\>\|\:\-&é"\'`_çà@°$£µ%§~\#²]#i',$_POST['password']))
    {
        $error = 'Votre mot de passe doit contenir au moins un caractère spécial.';
    }
    else
    {
        $req = $pdo->prepare('UPDATE users INNER JOIN tokens_reset ON tokens_reset.user_id = users.id SET password = :password WHERE tokens_reset.token = :token');
        $req->bindValue('password',hash('sha256',SALT.$_POST['password']));
        $req->bindValue('token',$_GET['token']);
        $req->execute();
        
        $req = $pdo->prepare('DELETE FROM tokens_reset WHERE token = :token');
        $req->bindValue('token',$_GET['token']);
        $req->execute();

        $done = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Réinitialisation du mot de passe</title>
</head>
<body>
  <a href="index.php">Accueil</a><br/><br/>
   
    <?php
    if (isset($done))
    {
    ?>
        Le mot de passe a été modifié. <a href="signin.php">Cliquez ici pour vous connecter.</a>
    <?php
    }
    else
    {
    ?>
        <?php if (isset($error)) echo $error; ?>

        <form action="" method="POST">
            <label for="password">Nouveau mot de passe</label>
            <input type="password" name="password" id="password"> <br/>

            <button type="submit">Changer le mot de passe</button>
        </form>
    <?php
    }
    ?>
    
</body>
</html>