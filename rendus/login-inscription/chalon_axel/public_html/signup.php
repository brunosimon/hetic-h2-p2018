<?php
require('inc/config.php');
require('inc/disposable.php');
session_start();

if (isset($_GET['referrer_id']) && ctype_digit($_GET['referrer_id']))
    $_SESSION['referrer_id'] = $_GET['referrer_id']; // stocke l'id du parrain dans la session au cas où l'utilisateur revient plus tard


if (isset($_GET['mail']))
    $mail = $_GET['mail']; // remplissage automatique des champs de formulaire via le lien d'inscription par invitation mail

$errors = array();
if (!empty($_POST)) // si on a envoyé le formulaire
{
    if ($_SESSION['captcha'] !== $_POST['captcha'])
    {
        $mail = $_POST['mail'];
        $login = $_POST['login'];
        unset($_SESSION['captcha']);
        $errors['captcha'] = 'Le texte ne correspond pas à l\'image.';
    }
    else
    {
        unset($_SESSION['captcha']);
        
        if (strlen($_POST['login']) < 4)
        {
            $mail = $_POST['mail']; // on se souvient des anciennes valeurs pour remplir le formulaire de nouveau
            $errors['login'] = 'Votre nom d\'utilisateur doit faire au moins 4 caractères de long.';
        }
        else if (strlen($_POST['login']) > 17)
        {
            $mail = $_POST['mail'];
            $errors['login'] = 'Votre nom d\'utilisateur doit faire moins de 18 caractères.';
        }
        else if (strlen($_POST['password']) < 7)
        {
            $mail = $_POST['mail'];
            $login = $_POST['login'];
            $errors['password'] = 'Votre mot de passe doit faire au moins 7 caractères de long.';
        }
        else if (strlen($_POST['password']) > 30)
        {
            $mail = $_POST['mail'];
            $login = $_POST['login'];
            $errors['password'] = 'Votre mot de passe doit faire moins de 31 caractères.';
        }
        else if (!preg_match('#[\.\\\+\*\?\[\^\]\$\(\)\{\}\=\!\<\>\|\:\-&é"\'`_çà@°$£µ%§~\#²]#i',$_POST['password']))
        {
            $mail = $_POST['mail'];
            $login = $_POST['login'];
            $errors['password'] = 'Votre mot de passe doit contenir au moins un caractère spécial.';
        }
        else if ($_POST['password'] !== $_POST['password2'])
        {
            $mail = $_POST['mail'];
            $login = $_POST['login'];
            $errors['password2'] = 'Les deux mots de passe ne correspondent pas.';
        }
        else if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
        {
            $login = $_POST['login'];
            $errors['mail'] = 'Adresse mail invalide.';
        }
        else if (mailAddressIsDisposable($_POST['mail']))
        {
            $login = $_POST['login'];
            $errors['mail'] = 'Les adresses email jetables ne sont pas acceptées.';
        }
        else
        {
            $req = $pdo->prepare('SELECT * FROM users WHERE mail=:mail'); // on vérifie si l'utilisateur existe déjà
            $req->bindValue('mail',$_POST['mail']);
            $req->execute();
            if ($req->fetch() !== false) // ce nom d'utilisateur est déjà pris
            {
                $errors['other'] = 'Vous êtes déjà inscrit.';   
            }
            else
            {
                $req = $pdo->prepare('SELECT * FROM users WHERE login=:login'); // on vérifie si l'utilisateur existe déjà
                $req->bindValue('login',$_POST['login']);
                $req->execute();

                if ($req->fetch() !== false)
                {
                    $mail = $_POST['mail'];
                    $errors['other'] = 'Ce nom d\'utilisateur est déjà pris.';
                }
                else
                {
                    $req = $pdo->prepare('INSERT INTO users(login, mail, password) VALUES(:login,:mail,:password)'); // on inscrit l'utilisateur
                    $req->bindValue('login',$_POST['login']);
                    $req->bindValue('mail',$_POST['mail']);
                    $req->bindValue('password',hash('sha256',SALT.$_POST['password']));
                    $req->execute();

                    $box = 'abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                    $token='';
                    for ($i=1; $i<=15; $i++)
                    {
                        $token.=$box[rand(0,strlen($box)-1)];
                    }

                    $req = $pdo->prepare('INSERT INTO tokens_verify(token, user_id) VALUES(:token,:user_id)'); // on crée un token de vérification
                    $req->bindValue('token',$token);
                    $req->bindValue('user_id',$pdo->lastInsertId());
                    $req->execute();

                    mail($_POST['mail'],'Confirmez votre inscription','Bonjour '. $_POST['login'] .",\n\nPour confirmer votre inscription à notre site, merci de visiter le lien suivant : ".SERVER.'/verify.php?token='.$token."&mail=".urlencode($_POST['mail'])."\n\nÀ très bientôt sur notre site !",'From: Mon super site <inscription@monsupersite.com>'); // on envoie le token par mail

                    $registered = true;
                }
            }
        }
    }
}

if (empty($_POST) || !empty($errors)) // si on affiche le formulaire, on regénère le captcha
{
    $box = 'abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789';
    $_SESSION['captcha']='';
    for ($i=1; $i<=rand(3,4); $i++)
    {
        $_SESSION['captcha'].=$box[rand(0,strlen($box)-1)];
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
 <a href="index.php">Accueil</a><br/><br/>
 
  
    <?php
    if (isset($registered))
    {
    ?>
        Vous êtes maintenant inscrit. Vérifiez votre boîte mail pour finaliser votre inscription, puis <a href="signin.php">connectez-vous</a>.
    <?php
    }
    else
    {
    ?>
   
        <?php if (!empty($errors['other'])) echo $errors['other']; ?>

        <form action="signup.php" method="POST">
            <label for="login">Nom d'utilisateur</label>
            <input required minlength="4" maxlength="17" type="text" id="login" name="login" value="<?= isset($login) ? htmlentities($login) : '' ?>"> <?= isset($errors['login']) ? $errors['login'] : '' ?><br/>
            
            <label for="password">Mot de passe</label>
            <input required minlength="7" maxlength="30" type="password" name="password" id="password"> <?= isset($errors['password']) ? $errors['password'] : '' ?><br/>
            
            <label for="password2">Confirmer le mot de passe</label>
            <input required minlength="7" maxlength="30" type="password" name="password2" id="password2"> <?= isset($errors['password2']) ? $errors['password2'] : '' ?><br/>

            <label for="mail">Adresse mail</label>
            <input required maxlength="255" type="email" id="mail" name="mail" value="<?= isset($mail) ? htmlentities($mail) : '' ?>"> <?= isset($errors['mail']) ? $errors['mail'] : '' ?><br/>

            
            <label for="captcha">CAPTCHA (entrez les caractères que vous voyez sur l'image)</label> 
            <img src="captcha.php" />
            <input required minlength="" maxlength="" type="text" name="captcha" id="captcha" autocomplete="off"> <?= isset($errors['captcha']) ? $errors['captcha'] : '' ?><br/>

            <button type="submit">M'enregistrer</button>
        </form>
    <?php
    }
    ?>
</body>
</html>