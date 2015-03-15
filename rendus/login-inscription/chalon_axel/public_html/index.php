<?php

/*
FEATURES :
- Log des erreurs PHP dans un fichier privé pour détecter d'éventuelles tentatives d'intrusion, etc. (ok)
- Login par nom d'utilisateur ou mail (ok)
- Récupération de mot de passe par nom d'utilisateur ou mail (ok)
- Remplissage automatique du formulaire quand on accède au lien par mail (ok)
- Se souvenir de la valeur des champs s'il y a une erreur (ok)
- Demander deux fois le mot de passe à l'inscription et tester que les deux soient égaux (ok)
- Affichage de la date de dernière connexion (ok)
- Système de parrainage par mail (ok)
- Récupération de l'adresse du serveur pour la génération des liens des mails (ok)
- Rejet des adresses mail jetables (ok)
- Validation HTML5 en plus de la validation serveur (ok)
- Mots de passe sécurisés (ok)
- Captcha maison (ok)
- Bouton de déconnexion sur la page privée (ok)
- Tester la complexité du mot de passe (ok)
- Vérification des doublons dans la BDD (ok)
- Vérification du compte par adresse mail (ok)
- Gestion des erreurs du formulaire (ok)
*/

require('inc/config.php');
session_start();

if (isset($_SESSION['loggedIn']))
{
    $req = $pdo->prepare('SELECT COUNT(*) as nb_referrals FROM users WHERE referrer_id = :referrer_id'); // on récuppère le nombre de referrals
    $req->bindValue('referrer_id',$_SESSION['user_id']);
    $req->execute();
    $nb_referrals = $req->fetch()['nb_referrals'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
   
    <?php
    if (isset($_SESSION['loggedIn']))
    {
    ?>
        <a href="signout.php">Se déconnecter</a> | <a href="priv.php">Exemple de page privée</a><br/><br/>

        Bonjour <?= htmlentities($_SESSION['user_login']); ?>.

        <?php
        if (empty($_SESSION['last_visit']))
            echo 'Ceci est votre première visite.';
        else
            echo 'Votre dernière connexion était le '.date('d/m/Y').' à '.date('H:i:s',$_SESSION['last_visit']).'.';
        ?>

         Vous avez parrainé <?= $nb_referrals; ?> personne<?= $nb_referrals>1 ? 's' : ''?> pour l'instant.

        <?php
        if (isset($_SESSION['invited']))
        {
            echo 'Le mail a bien été envoyé.';
            unset($_SESSION['invited']);
        }
        ?>
        <form method="POST" action="invite.php">
            <label for="mail">Mail d'un ami à inviter</label>
            <input type="mail" name="mail" id="mail">

            <input type="submit">
        </form>

    <?php
    }
    else
    {
    ?>
        <a href="signup.php">S'enregistrer</a> | <a href="signin.php">Se connecter</a> | <a href="lost_password.php">Mot de passe perdu</a>
    
    <?php
    }
    ?>
</body>
</html>