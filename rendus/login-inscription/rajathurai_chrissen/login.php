<?php
require 'inc/config.php';

if(!empty($_POST))
{
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';

    $error = FALSE;
    $error_message = array();

    $prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail');
    $prepare->bindValue(':mail',$_POST['mail']);

    $prepare->execute();

    $user = $prepare->fetch();

    if (!$user) 
    {
        $error = TRUE;
        $error_message['login'] = "Incorrect e-mail.";
    }

    else
    {
        if ($user->password == hash('sha256',SALT.$_POST['password'])) 
        {
            //Creation de session si mdp correct
            // echo 'Mot de passe correct';
            $id = $user->id;
            $first_name = $user->prenom;
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['first_name'] = $first_name;
            // echo 'Vous êtes connecté !';
            header('Location:user-page.php'); //Redirection vers la page privée
        }
        else
        {
            $error_message['password'] = "Incorrect password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Login</h1>
    <form action="#" method="POST">
        <input type="text" placeholder="E-mail" name="mail">
        <br>
        <input type="password" placeholder="Password" name="password">
        <br>
        <div class="register">
            <input type="submit" value="Login">
        </div>
        <p>
            Go to the
            <a href="inscription.php">register</a>
            page.
        </p>
    </form>
    
    <!-- Affichage des messages d'erreurs -->
    <?php if (!empty($error_message)): ?>
        <div class="errors">
            <?php foreach ($error_message as $_error): ?>
            <p>
                <?php echo $_error; ?>
            </p>
            <?php endforeach ?>
        </div>
    <?php endif ?>
</body>
</html>