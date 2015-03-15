<?php
session_start();
if(!empty($_SESSION['membre']))
{
  header('Location: login.php');
}
if(!empty($_POST))
{
  extract($_POST);
  $valid = true;
  
  if(empty($email))
  {
    $valid = false;
    $erreuremail = 'Indiquez votre email';
  }
  if(!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL)===FALSE)
  {
    $valid = false;
    $erreuremail = 'Email invalide';
  }
  
  try{
  $bdd = new PDO('mysql:host=localhost;dbname=exercice-login-phivilay_kris-surya', 'root', 'root') or die(print_r($bdd->errorInfo()));
  $bdd->exec('SET NAMES utf8');
  }

  catch(Exeption $e){
  die('Erreur:'.$e->getMessage());
  }
  
  $req = $bdd->prepare('SELECT id,login FROM membre WHERE email=:email');
  $req->execute(array('email'=>$email));
  if(empty($erreuremail) && $req->rowCount()==0)
  {
    $valid = false;
    $erreurid = 'Cette adresse email ne correspond à aucun membre inscrit';
  }
  else
  {
    $data = $req->fetch();
  }
  $req->closeCursor();
  
  if($valid)
  {
    $pass = rand(1000,5000);
    
    $to = $email;
    $subject = 'Oublie identifiants';
    $message = 'Voici votre login et votre nouveau mot de passe. Il est recommandé de changer ce mot de passe.<br />
    Login : '.$data['login'].'<br />
    Mot de passe :'.$pass.'<br />
    Vous pouvez vous <a href="http://iamkris.esy.es/signup/login.php">connecter</a> dès maintenant sur monsite.com';
    
    $headers = 'From:kris@phivilay.com'."\r\n";
    $headers.='MIME-version: 1.0'."\r\n";
    $headers.='Content-type: text/html; charset=utf-8'."\r\n";
    mail($to,$subject,$message,$headers);
    
    $req = $bdd->prepare('UPDATE membre SET pass=:pass WHERE email=:email');
    $req->execute(array('pass'=>sha1($pass),
                        'email'=>$email));
    $req->closeCursor();
    $ok = 'Un email vous a été envoyé avec vos identifiants';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<head>
  <title></title>
</head>
<body>
  <div id="header">
    </div>
  
  <div id="wrap">
    <?php if(isset($erreurid)) echo '<div class="erreurid">'.$erreurid.'</div>';?>
    <?php if(isset($ok)) echo '<div class="ok">'.$ok.'</div>';?>
      <h3>Me renvoyer un mot de passe aléatoire</h3>
      <form action="oublie.php" method="post">
        
        <label for="email">Votre adresse email :</label>
        <input type="text" name="email" value="<?php if(isset($email)) echo $email;?>" />
        <div class="error"><?php if(isset($erreuremail)) echo $erreuremail;?></div>
        
        <input type="submit" class="submit_button" value="Je n'oublierai plus jamais mon mot de passe..." />
        
      </form>
      <p><a href="index.php">Revenir à l'accueil</a></p>
  </div>
</body>
</html>