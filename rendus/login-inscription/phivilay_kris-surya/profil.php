<?php
session_start();
if(empty($_SESSION['membre']))
{
  header('Location: login.php');
}
$nom = $_SESSION['membre'];

try{
$bdd = new PDO('mysql:host=localhost;dbname=exercice-login-phivilay_kris-surya', 'root', 'root') or die(print_r($bdd->errorInfo()));
$bdd->exec('SET NAMES utf8');
}

catch(Exeption $e){
die('Erreur:'.$e->getMessage());
}
  
$req = $bdd->prepare('SELECT * FROM membre WHERE login=:login');
$req->execute(array('login'=>$_SESSION['membre']));
$data = $req->fetch();
$req->closeCursor();

if(!empty($_POST))
{
  extract($_POST);
  $valid = true;
  
  if(empty($email))
  {
    $valid = false;
    $erreuremail = 'Indiquez une adresse email';
  }
  
  if(!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL)=== FALSE)
  {
    $valid = false;
    $erreuremail = 'Adresse email invalide';
  }
  
  if(empty($pass))
  {
    $valid = false;
    $erreurpass = 'Choisissez votre nouveau mot de passe';
  }
  
  if(!empty($pass) && strlen($pass)<5)
  {
    $valid = false;
    $erreurpass = '5 caractères minimum';
  }
  
  if(!empty($pass) && empty($passconf))
  {
    $valid = false;
    $erreurpassconf = 'Confirmez le mot de passe';
  }
  
  if(!empty($pass) && !empty($passconf) && $pass != $passconf)
  {
    $valid = false;
    $erreurpassconf = 'Mots de passe différents';
  }
  
  if($valid)
  {
    $to = $email;
    $subject = 'Votre profil';
    $message = 'Bonjour '.$nom.'!<br />
    Vous avez modifié votre profil sur le supa formulaire.<br />
    Voici vos nouvelles informations:<br />
    E-mail : '.$email.'<br />
    Login : '.$data['login'].'<br />
    Mot de passe : '.$pass.'<br />';
    
    $headers = 'From:kris@phivilay.com'."\r\n";
    $headers.='MIME-version: 1.0'."\r\n";
    $headers.='Content-type: text/html; charset=utf-8'."\r\n";
    mail($to,$subject,$message,$headers);
    
    $req = $bdd->prepare('UPDATE membre SET email=:email, pass=:pass WHERE login=:nom');
    $req->execute(array(
      'email'=>$email,
      'pass'=>sha1($pass),
      'nom'=>$nom
    ));
    $req->closeCursor();
    $ok = 'Modification réussie, vous allez recevoir un email avec vos identifiants';
    
    unset($_SESSION['membre']);
    session_destroy();
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
    <div id="login"><a href="logout.php">Logout</a></div>
    <h3><?php echo 'Bonjour '.$nom.', vous pouvez modifier votre profil.';?></h3>
    <?php if(isset($ok)) echo '<div class="ok">'.$ok.'</div>';?>
    <form action="profil.php" method="post">
      
      <label for="email">Email (où sera envoyer le nouveau mot de passe) :</label>
      <input type="text" name="email" value="<?php echo $data['email'];?>" />
      <div class="error"><?php if(isset($erreuremail)) echo $erreuremail;?></div>
      
      <label for="pass">Nouveau mot de passe: </label>
      <input type="password" name="pass" />
      <div class="error"><?php if(isset($erreurpass)) echo $erreurpass;?></div>
      
      <label for="passconf">Confirmez le mot de passe :</label>
      <input type="password" name="passconf" />
      <div class="error"><?php if(isset($erreurpassconf)) echo $erreurpassconf;?></div>
      
      <input type="submit" class="submit_button" value="Modifier" />
      
    </form>
    <p><a href="index.php">Revenir à l'accueil</a></p>
  </div>
</body>
</html>