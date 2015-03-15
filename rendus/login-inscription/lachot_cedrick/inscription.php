<?php
require 'Inc/config.php';
     

$req_pseudo = $pdo->prepare('SELECT pseudo FROM accounts WHERE pseudo = :pseudo LIMIT 1');
$req_mail   = $pdo->prepare('SELECT mail FROM accounts WHERE mail = :mail LIMIT 1');

if (!empty($_POST)){
$mail     = htmlspecialchars($_POST['mail']);
$pseudo   = htmlspecialchars($_POST['pseudo']);
$password = htmlspecialchars($_POST['password']); 
$age      = htmlspecialchars($_POST['age']); 
$message  = array();
$token    = sha1(uniqid(rand()));

$req_mail->execute(['mail' => $mail]);
$req_pseudo->execute(['pseudo' => $pseudo]);

    if (empty($mail) OR empty($pseudo) OR empty($password) OR empty($_POST['verification']) OR empty($age))
    {
         $message[0] = '* Tous les champs sont obligatoires';
    }

    if ($password!= $_POST['verification'])
    {
         $message[1] = '* Mot de passe non correspondant';
    }
    if (strlen($password) < 4)
    {
         $message[2] = '* Mot de passe trop court';
    }
    if (ctype_digit($password)|| ctype_alpha($password))
    {
         $message[3] = '* Le mot de passe manque des lettres ou des chiffres';
    }
    if($req_mail->fetch())
    {
         $message[4] = '* E-mail déjà enregister';
    }
    if ($req_pseudo->fetch()) 
    {
         $message[5] = '* Le pseudo existe déjà !';
    }

}
if (!empty($_POST) && (empty($message))){


$prepare = $pdo->prepare('INSERT INTO accounts (mail,pseudo,password,age,token) VALUES(:mail,:pseudo,:password,:age,:token)');
$prepare->bindValue(':mail',$mail);
$prepare->bindvalue(':pseudo',$pseudo);
$prepare->bindValue(':password',hash('sha256',SALT.$password));
$prepare->bindvalue(':age',$age);
$prepare->bindvalue(':token',$token);
$prepare->execute();

$to    = $mail;
$sujet = 'Activation de compte';
$body  = 'Bonjour <a href="http://localhost:8888/Rendu_dev/activate.php?token='.$token.'&mail='.$to.'>cliquer ici</a>';

$header = "From: <Rendu_dev.fr>";
$header = "Reply-to: <rendu_dev@hotmail.fr>";
$header = "MIME-Version: 1.0\r\n";
$header = "Content-Type: text/html; charset=UTF-8\r\n";

mail($to,$sujet,$body,$header);


$success = '* Compte créer avec succès <br><a id="connect" href="login.php">Connectez-vous</a>';
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="src/css/reset.css">
    <link rel="stylesheet" href="src/css/style.css">
</head>

<body>

    <form action="#" method="POST">
        <div class="main-form">
            <i class="logo"></i>
            <input type="text" placeholder="E-mail" name="mail" value="<?php if(!empty($mail)) print($mail)?>">
            <input type="text" placeholder="Pseudo" name="pseudo" value="<?php if(!empty($pseudo)) print($pseudo)?>">
            <input type="password" placeholder="Mot de passe" name="password">
            <input type="password" placeholder="Mot de passe" name="verification">
            <input type="number" placeholder="Ton Age" name="age">
            <input type="submit" value="S'enregistrer">
            <div>
                <a href="login.php" title="">Déjà un compte ?</a>
                <a href="login.php" title="">Connexion</a>
            </div>
            <br>
            <h2 class="message"><?php if(!empty($message)) echo implode('<br>', $message);
 ; 
  ?></h2>
            <h2 class="success"><?php if(!empty($success)) print($success); ?></h2>
        </div>
    </form>


</body>

</html>