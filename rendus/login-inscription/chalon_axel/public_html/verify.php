<?php
require('inc/config.php');
session_start();

if (!isset($_GET['token'])) exit();

$req = $pdo->prepare('UPDATE users INNER JOIN tokens_verify ON tokens_verify.user_id = users.id SET users.verified=1, referrer_id = :referrer_id WHERE tokens_verify.token = :token');
$req->bindValue('token',$_GET['token']);
if (isset($_SESSION['referrer_id']))
    $req->bindValue('referrer_id',$_SESSION['referrer_id']);
else
    $req->bindValue('referrer_id',null, PDO::PARAM_NULL);
$req->execute();

if ($req->rowCount())
{
    $req = $pdo->prepare('DELETE FROM tokens_verify WHERE token = :token');
    $req->bindValue('token',$_GET['token']);
    $req->execute();
    
    echo 'Votre compte a été vérifié. <a href="signin.php?mail='.urlencode($_GET['mail']).'">Cliquez ici pour vous connecter.</a>';
}
else
{
    exit('Token invalide');
}