<?php
session_start();

$nb1 = rand(10,50);
$nb2 = rand(10,50);

if(!empty($_SESSION['membre']))
{
  header('Location: login.php');
}

if(!empty($_POST))
{
  extract($_POST);
  $valid = true;


  if(empty($captcha))
  {
    $valid = false;
    $erreurcaptcha = 'Veuillez résoudre ce captcha';
  }

  if((empty($captcha) || !is_numeric($captcha) || $captcha!=base64_decode($check1)+base64_decode($check2)))
  {
    $valid = false;
    $erreurcaptcha = 'Veuillez résoudre ce captcha';
  }

  if(empty($nom))
  {
    $valid = false;
    $erreurnom = 'Veuillez mettre un nom qui fera office de login';
  }
  
  if(!empty($nom) && strlen($nom)<3)
  {
    $valid = false;
    $erreurnom = 'Votre nom doit faire 3 caractères minimum';
  }
  
  if(empty($email))
  {
    $valid = false;
    $erreuremail = 'Veuillez renseigner votre e-mail';
  }
  
  if(!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL)===FALSE)
  {
    $valid = false;
    $erreuremail = 'Adresse e-mail invalide';
  }
  
  try{
  $bdd = new PDO('mysql:host=localhost;dbname=exercice-login-phivilay_kris-surya', 'root', 'root') or die(print_r($bdd->errorInfo()));
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
    $subject = 'Mail de validation pour votre compte';
    $message = 'Merci pour votre inscription sur ce supa formulaire!<br />
    Vous pourrez vous connecter après avoir cliqué sur le lien d\'activation ci-dessous.<br />
    Voici vos identifiants, nous vous recommandons vivement de changer le mot de passe.<br />
    Login : '.$nom.'<br />
    Mot de passe : '.$pass.'<br />
    Cliquez sur le lien suivant pour activer votre compte<br />
    <a href="http://iamkris.esy.es/signup/verif.php?email='.$email.'&hash='.$hash.'">http://iamkris.esy.es/signup/verif.php?email='.$email.'&hash='.$hash.'</a>';
    
    $headers = 'From:kris.phivilay@gmail.com'."\r\n";
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
    $ok = 'Félicitation ! Vous allez recevoir un e-mail pour activer votre compte.';
    unset($nom);
    unset($email);
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
    <h3>Inscrivez-vous sur le supa formulaire !</h3>
    <p>Entrez votre nom et votre e-mail pour continuer</p>
    <form action="inscription.php" method="post">
      
      <label for="nom">Nom (Login) :</label>
      <input id="nom" type="text" name="nom" value="<?php if(isset($nom)) echo $nom;?>"  placeholder="Ton nom"/>
      <div class="error"><?php if(isset($erreurnom)) echo $erreurnom;?></div>
      
      <label for="email">Votre E-mail :</label>
      <input id="email" type="text" name="email" value="<?php if(isset($email)) echo $email;?>" placeholder="Ton adresse email" />
      <div class="error"><?php if(isset($erreuremail)) echo $erreuremail;?></div>

      <input type="hidden" name="check1" value="<?php echo base64_encode($nb1);?>" />
      <input type="hidden" name="check2" value="<?php echo base64_encode($nb2);?>" />
      
      <label for="captcha">Le captcha anti-robot :</label>
      <div id="captcha"><?php echo $nb1;?> + <?php echo $nb2;?></div>
      
      <label for="captcha">Resultat :</label>
      <input type="text" name="captcha" class="resultat" placeholder="Ex : 10 + 10 = 20" />
      <div class="error"><?php if(isset($erreurcaptcha)) echo $erreurcaptcha;?></div>
      
      <input type="submit" class="submit_button" value="Envoyer" />
      
    </form>
    <p><a href="index.php">Revenir à l'accueil</a></p>
  </div>
</body>
</html>