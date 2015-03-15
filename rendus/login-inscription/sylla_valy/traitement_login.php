<?php

$pseudo    = htmlspecialchars($_POST['pseudo']);
$password  = htmlspecialchars($_POST['password']);


if(!empty($_POST)){

    $prepare = $pdo->prepare("SELECT * FROM users WHERE pseudo = :pseudo LIMIT 1");
    $prepare->bindValue(':pseudo', $pseudo);

    $prepare->execute();
    $user = $prepare->fetch();
    $mdp  = hash('sha256', SALT.$_POST['password']);
    if($user){
        if($user->password == $mdp){
            header('Location: jackpot.php');
            exit();
        }
        if($user->password !== $mdp){
            $errors['pseudo'] = "Il y a une erreur quelque part ;)";
        }
    }
    else if(!$user){
        $errors['pseudo'] = "Nom d'utilisateur non trouvé";
    }

}
if(empty($_POST)){
    get_errors($_POST);
}


function get_errors($data){
    $result = array();

    //Set local variables
    $pseudo    = trim($data['pseudo']);
    $password  = trim($data['password']);

    //Testing pseudo
    if(empty($pseudo)){
        $result['pseudo'] = "Pseudo Missing :)";
    }
    //Testing password
    if(empty($password)){
        $result['password'] = "Password is missing";
    }

    return $result;
}

$errors  = array();
$success = array();

if(!empty($_POST)){
    $errors = get_errors($_POST);


    if(empty($errors)){
        $success[] = 'Bravo';
        $pseudo        = '';
        $password      = '';
    }
}