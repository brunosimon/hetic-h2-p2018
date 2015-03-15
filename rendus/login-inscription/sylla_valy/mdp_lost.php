<?php
require 'inc/config.php';
require 'traitement_inscription.php';

$pseudo    = htmlspecialchars($_POST['pseudo']);

if(!empty($_POST)){
    $prepare = $pdo->prepare("SELECT * FROM users WHERE pseudo = :pseudo LIMIT 1");
    $prepare->bindValue(':pseudo', $pseudo);

    $prepare->execute();
    $user = $prepare->fetch();


    if($user && !empty($_POST['email'])){
        $titre        = "Find Your Password On Valy Sylla Site";
        $texte        = "Suivez le lien suivant : http://localhost/Sylla_Form/mdp_find.php ";
        $destinataire = $_POST['email'];
        $me           = "valy.sylla@hetic.net";
        $from         = "From:".$me."\n";
        $from        .= "MIME-version: 1.0\n";
        $from        .= "Content-type: text/html; charset= UTF-8\n";
        if(!mail($destinataire,$titre,$titre,$from))
            $errors['pseudo'] = "Something is wrong :(";
        else{
            mail($destinataire,$titre,$titre,$from);
            header('Location: login.php');
            exit();
        }
    }
    else{
        $errors['pseudo'] = "Something is wrong :(";
    }
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>V.SYLLA</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
        <section class="content">
            <form class="form" action="#" method="POST">

                <!-- pseudo -->
                <p class="input <?= array_key_exists('pseudo', $errors) ? 'error' : ''?>">
                    <input type="text" name="pseudo" id="pseudo" value="<?= $pseudo ?>"/>
                    <label for="pseudo">Name</label>
                </p>
                <span class="err"> <?php echo $errors['pseudo']; ?> </span>


                <p class="input <?= array_key_exists('email', $errors) ? 'error' : ''?>">
                    <input type="text" name="email" id="email"/>
                    <label for="email"> Your E-mail</label>
                </p>
                <p class="msg">Enter an email to receive the procedure</p>
                <p class="submit">
                    <input type="submit" value="Send" />
                </p>

            </form>
        </section>
    </div><!-- end of container -->

</body>
</html>