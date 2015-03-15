<?php
session_start();
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
    <?php
    if(empty($_SESSION['membre']))
    {
      ?>
    <h2>Bonjour, bienvenue sur mon site !</h2>
    <p>Pour vous inscrire c'est <a href="inscription.php">ici</a></p>
    <p>Sinon <a href="login.php">identifiez-vous</a>.</p>
    <?php
    }
    else
    {
    ?>
    <h2>Bonjour, <?php echo $_SESSION['membre'];?>, bienvenue sur le site !</h2>
    <p>Consultez <a href="profil.php">votre profil</a>.</p>
    <?php
    }
    ?>
  </div>
</body>
</html>