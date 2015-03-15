<?php 

// On vérifie si l'utilisateur n'est pas déjà connecté
session_start();
if(isset($_SESSION['login'])){
    header('Location: securise.php');
}

//devoir

require 'inc/config.php';


if(!empty($_POST))
{

	$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');

	$prepare->bindValue(':mail',$_POST['mail']);

	$prepare->execute();
	$user = $prepare->fetch();

    if(!$user)
    {
        echo 'User not found';
    }
    else
    {
        if($user->password == hash('sha256',$_POST['password'].SALT))
        {
            $_SESSION['login'] = $user->mail;
            header('Location: securise.php');

        }
        else
        {
            echo 'Vous devez reesayer, vos identifiants sont incorrects';
        }
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
</head>
<body>
    <h1>login</h1>
    <form action="#" method="post">
        <input type="text" name="mail">
        <label>Mail</label>
        <br>
        <input type="password" name="password">
        <label>Password</label>
        <br>
        <input type="submit">
    </form>
</body>
</html>