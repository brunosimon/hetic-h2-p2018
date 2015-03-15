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
  
  if(empty($login))
  {
    $valid = false;
    $erreurlogin = 'Indiquez votre login';
  }
  
  if(empty($pass))
  {
    $valid = false;
    $erreurpass = 'Indiquez votre mot de passe';
  }
  
  if($valid)
  {
  try{
  $bdd = new PDO('mysql:host=localhost;dbname=exercice-login-landanger_lucien', 'root', 'root') or die(print_r($bdd->errorInfo()));
  $bdd->exec('SET NAMES utf8');
  }
  
  catch(Exeption $e){
  die('Erreur:'.$e->getMessage());
  }
  
  $req = $bdd->prepare('SELECT * FROM membre WHERE login=:login AND pass=:pass');
  $req->execute(array(
    'login'=>$login,
    'pass'=>sha1($pass)
  ));
  $data = $req->fetch();
  if($req->rowCount()==0)
  {
    $valid = false;
    $erreurid = 'Mauvais identifiants';
  }
  
  if($req->rowCount()>0 && $data['actif']==0)
  {
    $valid = false;
    $erreurid = 'Votre compte n\'est pas actif, consultez le mail envoyé pour l\'activer.';
  }
  else
  {
    if($req->rowCount()>0 && $data['actif']==1)
    {
      $_SESSION['membre'] = $login;
    }
  }
    
    $req->closeCursor();
    if($valid)
    {
      header('Location: profil.php');
    }
  
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
    <h3>Connectez-vous</h3>
    <form action="login.php" method="post">
      
      <label for="login">Login :</label>
      <input type="text" name="login" placeholder="Login"value="<?php if(isset($login)) echo $login;?>" />
      <div class="error"><?php if(isset($erreurlogin)) echo $erreurlogin;?></div>
      
      <label for="pass">Mot de passe :</label>
      <input type="password" name="pass" placeholder="Password" value="<?php if(isset($pass)) echo $pass;?>" />
      <div class="error"><?php if(isset($erreurpass)) echo $erreurpass;?></div>
      
      <input type="submit" class="submit_button" value="Connexion" />
      
    </form>
    <p><a href="oublie.php">Mot de passe oublié ?</a></p>
    <p><a href="index.php">Revenir à l'accueil</a></p>
  </div>
</body>
</html>