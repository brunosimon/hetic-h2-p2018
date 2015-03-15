<?php
require 'Inc/config.php';
$message = "Vous n'etes pas connecté !";
$pseudo = $_SESSION['pseudo'];
$req = $pdo->query('SELECT mail,age FROM accounts where pseudo = "'.$pseudo.'"');
$donnees = $req->fetch(PDO::FETCH_ASSOC);


if(!empty($pseudo))
{
   $profil =  'Hello, ' .$pseudo;
} 
else 
{
   header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>
        Member
    </title>
    <link rel="stylesheet" href="src/css/reset.css">
    <link rel="stylesheet" href="src/css/style.css">
</head>

<body>
    <h1 class="profil"><?php print($profil);?></h1>
    <p class="parameter">Mon mail :
        <?php print($donnees['mail']);?>
    </p>
    <p class="parameter">Mon age :
        <? print($donnees['age']);?>
    </p>
    <a href="logout.php" id="logout">Se déconnecter</a>

</body>

</html>