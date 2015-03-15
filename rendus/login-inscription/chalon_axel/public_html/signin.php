<?php
require('inc/config.php');
session_start();

if (!empty($_POST))
{
    $req = $pdo->prepare('SELECT id, login, verified, UNIX_TIMESTAMP(last_visit) as last_visit FROM users WHERE (mail=:mail OR login=:login) AND password = :password');
    $req->bindValue('mail',$_POST['mailorlogin']);
    $req->bindValue('login',$_POST['mailorlogin']);
    $req->bindValue('password',hash('sha256',SALT.$_POST['password']));
    $req->execute();
    
    $user = $req->fetch();
    if ($user === false)
    {
        $error = 'Les informations de connexions sont incorrectes.';   
    }
    else if (!$user['verified'])
    {
        $error = 'Merci de vérifier votre compte via votre boîte mail.';   
    }
    else
    {
        $_SESSION['loggedIn'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_login'] = $user['login'];
        $_SESSION['last_visit'] = $user['last_visit'];
        
        $req = $pdo->prepare('UPDATE users SET last_visit = NOW() WHERE id=:id');
        $req->bindValue('id',$user['id']);
        $req->execute();
        
        header('Location: index.php');
        exit();
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
  <a href="index.php">Accueil</a><br/><br/>
   
    <?php if (isset($error)) echo $error; ?>
    
    <form action="signin.php" method="POST">
        <label for="mailorlogin">Nom d'utilisateur ou adresse mail</label>
        <input type="text" id="mailorlogin" name="mailorlogin" value="<?= isset($_GET['mail']) ? htmlentities($_GET['mail']) : ''?>"> <?= isset($errors['mailorlogin']) ? $errors['mailorlogin'] : '' ?><br/>
        
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password"><br/>
        
        <button type="submit">Me connecter</button>
    </form>

</body>
</html>