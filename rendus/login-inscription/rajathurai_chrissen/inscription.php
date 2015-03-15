<?php

require 'inc/config.php';

if(!empty($_POST))
{
	// echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';

    // Vérifie que les champs ne sont pas vides
    // Demander deux fois le mot de passe à l'inscription et tester que les deux soient égaux
    // Vérifie que la personne est majeure
    // Vérifie que le mail est valide
    // Tester si le mail n'a pas déjà été enregistré dans la BDD
    // Plus de champs à l'inscription
  
    $error = FALSE;

    $error_message = array(); //tableau qui enregistre les messages d'erreurs

    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $age = $_POST['age'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $pass_verif = $_POST['password_verif'];

    // Vérifie que tous les champs sont remplis
    if (empty($last_name) || empty($first_name) || empty($age) || empty($mail) || empty($password) || empty($pass_verif))
    {
        $error = TRUE;
        $error_message['empty_field'] = "All the fields must be filled.";
    }

    else {

        //Vérifie si les mots de passes correspondent
        if ($password != $pass_verif )
        {
            $error = TRUE;
            $error_message['password'] = "Passwords don't match.";
        }

        // Vérifie que l'âge entré n'est pas inférieur à 18.
        if ($age < 18)
        {
            $error = TRUE;
            $error_message['age'] = "You must be over 18.";
        }

        // Vérifie si le mail est conforme
        if (filter_var($mail, FILTER_VALIDATE_EMAIL) == false)
        {
            $error = TRUE;
            $error_message['mail_invalid'] = "E-mail not valid.";
        }

        //Vérifie que le mail n'est pas déjà présent dans la base de donnée
        $prepare = $pdo->prepare('SELECT * FROM users WHERE mail =:mail');
        $prepare->bindValue(':mail',$_POST['mail']);
        $prepare->execute();
        $user = $prepare->fetch();

        if ($user)
        {
            $error = TRUE;
            $error_message['mail_used'] = "Mail already used.";
        }
    }


    //Envoi des données dans la BDD
    if ($error == FALSE)
    {
        $prepare = $pdo->prepare('INSERT INTO users (nom, prenom, age, mail, password) VALUES (:last_name, :first_name, :age, :mail, :password)');
        $prepare->bindValue(':last_name',$_POST['last_name']);
        $prepare->bindValue(':first_name',$_POST['first_name']);
        $prepare->bindValue(':age',$_POST['age']);
        $prepare->bindValue(':mail',$_POST['mail']);
        $prepare->bindValue(':password',hash('sha256',SALT.$_POST['password']));

        $prepare->execute();

        echo "Registration is a success";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Inscription</h1>
    <form id="form" action="#" method="POST">
    <div class="last_name">
        <input type="text" placeholder="First name *" name ="first_name">
    </div>
        <br>
    <div class="first_name">
        <input type="text" placeholder="Last name *" name ="last_name">        
    </div>
        <br>
    <div class="age">
        <input type="number" placeholder="Age *" name="age">        
    </div>
        <br>
    <div class="mail">
        <input type="text" placeholder="E-mail *" name="mail">           
    </div>
        <br>
    <div class="password">
        <input type="password" placeholder="Password *" name="password">        
    </div>
    	<br>
    <div class="password_verif">
        <input type="password" placeholder="Password *" name="password_verif">       
    </div>
        <br>
    <div class="register">
        <input type="submit" value="Register">
    </div>  
    <p>
        Go to the
        <a href="login.php">login</a>
        page.
    </p>
    </form>

    <!-- Affichage des messages d'erreurs -->
    <?php if (!empty($error_message)): ?>
        <div class="errors">
            <?php foreach ($error_message as $_error): ?>
            <p>
                <?php echo $_error; ?>
            </p>
            <?php endforeach ?>
        </div>
    <?php endif ?>

</body>
</html>