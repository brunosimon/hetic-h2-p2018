<?php
session_start();
if(!empty($_SESSION['membre']))
{
  header('Location: index.php');
}

if(!empty($_POST))
{
  $valid = true;
  extract($_POST);
  
  if(empty($nom))
  {
    $valid = false;
    $erreurnom = 'Indiquez votre nom';
  }
  
  if(!empty($nom) && strlen($nom)<3)
  {
    $valid = false;
    $erreurnom = '3 caractères minimum';
  }
  
  if(empty($email))
  {
    $valid = false;
    $erreuremail = 'Indiquez votre e-mail';
  }
  
  if(!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL)===FALSE)
  {
    $valid = false;
    $erreuremail = 'Adresse e-mail invalide';
  }
  
  try{
    $bdd = new PDO('mysql:host=localhost;dbname=exercice-login-landanger_lucien', 'root', 'root') or die(print_r($bdd->errorInfo()));
    $bdd->exec('SET NAMES utf8');
  }
  
  catch(Exeption $e){
  die('Erreur:'.$e->getMessage());
  }
  
  $req = $bdd->prepare('SELECT id FROM membre WHERE login=:nom');
  $req->execute(array('nom'=>$nom));
  if($req->rowCount()>0)
  {
    $valid = false;
    $erreurid = 'Ce pseudo est déjà pris';
  }
  
  $req = $bdd->prepare('SELECT id FROM membre WHERE email=:email');
  $req->execute(array('email'=>$email));
  if($req->rowCount()>0)
  {
    $valid = false;
    $erreurid = 'Cette adresse e-mail est déjà utilisée par un membre';
  }
  $req->closeCursor();
  
  if($valid)
  {
    $hash = md5(rand(0,1000));
    $pass = rand(1000,5000);
    
    $to = $email;
    $subject = 'Inscription | Validation';
    $message = 'Merci pour votre inscription sur mon site!<br />
    Vous pourrez vous connecter sur le site après avoir cliqué sur le lien d\'activation ci-dessous.<br />
    Voici vos identifiants, je vous recommande de changer le mot de passe.<br />
    Login : '.$nom.'<br />
    Mot de passe : '.$pass.'<br />
    Cliquez sur le lien suivant pour activer votre compte<br />
    <a href="http://localhost:8888/signup/verif.php?email='.$email.'&hash='.$hash.'">http://localhost:8888/signup/verif.php?email='.$email.'&hash='.$hash.'</a>';

    $headers = 'From:Lucien@landanger.com'."\r\n";
    $headers.='MIME-version: 1.0'."\r\n";
    $headers.='Content-type: text/html; charset=utf-8'."\r\n";
    mail($to,$subject,$message,$headers);
    
    $req = $bdd->prepare('INSERT INTO membre (login,pass,email,hash) VALUES (:nom,:pass,:email,:hash)');
    $req->execute(array(
      'nom'=>$nom,
      'pass'=>sha1($pass),
      'email'=>$email,
      'hash'=>$hash
    ));
    
    $req->closeCursor();
    $ok = 'Inscription réussie, vous allez recevoir un e-mail';
    unset($nom);
    unset($email);
    die($message);
    
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
  <div id="wrap">
    <?php if(isset($erreurid)) echo '<div class="erreurid">'.$erreurid.'</div>';?>
    <?php if(isset($ok)) echo '<div class="ok">'.$ok.'</div>';?>
    <h3>Inscrivez-vous</h3>
    <p>Entrez votre nom et votre e-mail svp</p>
    <form action="inscription.php" method="post">
      
      <label for="nom">Nom :</label>
      <input type="text" name="nom" placeholder="Bruno" value="<?php if(isset($nom)) echo $nom;?>" />
      <div class="error"><?php if(isset($erreurnom)) echo $erreurnom;?></div>
      
      <label for="email">Votre E-mail :</label>
      <input type="text" name="email" placeholder="bruno@simon.com" value="<?php if(isset($email)) echo $email;?>" />
      <div class="error"><?php if(isset($erreuremail)) echo $erreuremail;?></div>
      
      <input type="submit" class="submit_button" value="Envoyer" />
      
    </form>
    <p><a href="index.php">Revenir à l'accueil</a></p>
  </div>
</body>
</html>