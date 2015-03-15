<?php
    session_start();
    if (!isset($_SESSION['mail'])) {
        header("refresh:5;url=index.php");
        echo "Please log with the regular way ;) You'll be redirected on the login page, if you don't have an account yet, you can subscribe.";
        exit();
    }
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Espace membre</title>
    <link rel="stylesheet" href="src/css/style.css">
</head>

<body>
    Bienvenue ! Vous faites maintenant partie du club le plus privé et sécurisé du monde.<br/>
    Votre adresse de contact est : <?php echo htmlentities(trim($_SESSION['mail'])); ?><br/>
    <a href="deconnexion.php">Déconnexion</a>
</body>
</html>