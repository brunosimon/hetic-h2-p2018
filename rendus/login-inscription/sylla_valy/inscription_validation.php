<?php
if(!empty($success)){

    $pseudo        = htmlspecialchars($_POST['pseudo']);
    $email         = htmlspecialchars($_POST['email']);
    $password      = htmlspecialchars($_POST['password']);
    $conf_password = htmlspecialchars($_POST['conf_password']);
    $age           = htmlspecialchars($_POST['age']);
    $sex           = htmlspecialchars($_POST['sex']);




    $prepare = $pdo->prepare('INSERT INTO users (pseudo,email,password,age,sex) VALUES (:pseudo,:email,:password,:age,:sex)');
    $prepare->bindValue(':pseudo',$pseudo);

    $prepare->bindValue(':email',$email);
    $prepare->bindValue(':password',hash('sha256',SALT.$password));
    $prepare->bindValue(':age',$age);
    $prepare->bindValue(':sex',$sex);

    $prepare->execute();//renvoie le nombre de ligne affectée

    session_start();
    $_SESSION["$pseudo"]   = $pseudo;
    $_SESSION["$password"] = $password;

    header('Location: jackpot.php');

}