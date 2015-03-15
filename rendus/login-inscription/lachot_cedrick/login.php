<?php
require 'Inc/config.php';

if(!empty($_POST))
{

$prepare = $pdo->prepare('SELECT * FROM accounts WHERE pseudo = :pseudo LIMIT 1');
$prepare->bindValue(':pseudo',$_POST['pseudo']);
$prepare->execute();
$pseudo  = $prepare->fetch();

   if(!empty($_POST['remember']))
   {
       setcookie('user_id', $pseudo->id, time() + 60 * 60);
   }
   if(!$pseudo)
   {
       $message = '* Identifiant incorrect';
   }
   else
   {
      if($pseudo->password == hash('sha256',SALT.$_POST['password']))
      {
         $_SESSION['pseudo'] = $_POST['pseudo'];
         header('Location: member.php');
      }
      else
      {
         $message = '* Mot de Passe incorrect';
      }
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="src/css/reset.css">
    <link rel="stylesheet" href="src/css/style.css">
</head>

<body>
    <form action="#" method="POST">
        <div class="main-form">
            <i class="logo"></i>
            <input type="text" placeholder="Pseudo" value="" name="pseudo">
            <input type="password" placeholder="Mot de passe" value="" name="password">
            <label>
                <input type="checkbox" name="remember">Se souvenir de moi
            </label>
            <input type="submit" value="Connexion">
            <a href="#" title="">Forgot your password?</a>
            <div>
                <a href="inscription.php" title="">Créer un compte !</a>
                <a href="inscription.php" title="">S'inscrire</a>
            </div>
            <br>
            <h2 class="message"><?php if(isset($message)) print($message); ?></h2>
            <h2 class="success"><?php if(isset($success)) print ($success); ?></h2>
        </div>
    </form>
</body>

</html>