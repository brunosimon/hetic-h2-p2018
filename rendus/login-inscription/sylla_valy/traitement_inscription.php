<?php

$pseudo        = htmlspecialchars($_POST['pseudo']);
$email         = htmlspecialchars($_POST['email']);
$password      = htmlspecialchars($_POST['password']);
$conf_password = htmlspecialchars($_POST['conf_password']);
$age           = htmlspecialchars($_POST['age']);
$sex           = htmlspecialchars($_POST['sex']);


function get_errors($data){

    $result = array();

    //Set local variables
    $pseudo        = trim($data['pseudo']);
    $email         = trim($data['email']);
    $password      = trim($data['password']);
    $conf_password = trim($data['conf_password']);
    $age           = trim($data['age']);
    $sex           = trim($data['sex']);

    //Testing pseudo
    if(empty($pseudo)){
        $result['pseudo'] = 'missing name !!!!!';
    }
    else if(strlen($pseudo)<2){
        $result['pseudo'] = 'wrong name';
    }


    //Testing email
    $regex = "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$";
    if(empty($email)){
        $result['email'] = "Missing Email";
    }
    else if(!preg_match("#$regex#", $email)){
        $result['email'] = "Email is not valid";
    }

    //Testing password
    if(empty($password)){
        $result['password'] = "password is missing";
    }
    else if(strlen($password)<8){
        $result['password'] = "Please, for your security 8 is the minimum number of character alowed";
    }


    //Testing conf_password
    if(empty($conf_password)){
        $result['conf_password'] = "Confirmation password is missing";
    }
    else if($conf_password !== $password){
        $result['conf_password'] = "Password and Confirmation password don't matching";
    }


    //Testing age
    if (empty($age)){
        $result['age'] = 'missing age !!!!!';
    }
    else if($age < 1 || $age > 125)
        $result['age'] = 'We bet you are lying ;)';


    // Testing sex
    if(empty($sex)){
        $result['sex'] = 'missing gender!!!';
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
        $email         = '';
        $password      = '';
        $conf_password = '';
        $age           = '';
        $sex           = '';
    }
}
else{
    $pseudo        = '';
    $email         = '';
    $password      = '';
    $conf_password = '';
    $age           = '';
    $sex           = '';
}