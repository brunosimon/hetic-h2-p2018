<?php
error_reporting(E_ALL);
//devoir

//set variables
        $password   = trim($data['password']);
        $passwordbis    = trim($data['passwordbis']);
        $mail = trim($data['mail']);
        $name = trim($data['name']);
        $surname = trim($data['surname']);
        $age = trim($data['age']);
        $message = ('');
        $gender = trim($data['gender']);
        $resultatcaptcha = trim($data['resultatcaptcha']);
//set captcha
        $n1 = mt_rand(0,10);
        $n2 = mt_rand(0,10);
        $nbrFr = array('zero','un','deux','trois','quatre','cinq','six','sept','huit','neuf','dix');
        $resultat = $n1 + $n2;
        $phrase = $nbrFr[$n1] .' plus '.$nbrFr[$n2];



require 'inc/config.php';

     if(!empty($_POST))
  {
    // vérification du login
    if(empty($_POST['mail']))
    {
      $message = 'Veuillez indiquer votre mail svp !';
    }
    // vérification du mot de passe
    else if(empty($_POST['password']))
    {
      $message = 'Veuillez indiquer votre mot de passe svp !';
    }
    else if(strlen($_POST['password']) < 6)
    {
      $message = 'Votre mot de passe est trop court';
    }
    else if ( $_POST['password'] != $_POST['passwordbis'] )
    {
      $message = 'Veuillez indiquer deux mots de passe identiques !';
    }
    // vérification du mail
    else if( !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) )
    {
      $message = 'adresse mail invalide';
    }
    else if(empty($_POST))
    {
      $message = 'Vous n\'avez rien renseigné';
    }
    // vérification du code postal
    else if ((!is_numeric($_POST['cp'])) OR (strlen($_POST['cp'])!=5)) 
    {
      $message = "Votre Code postal est incorrect";
    }
    else if(empty($_POST['cp']))
    {
      $message = 'Veuillez indiquer votre code postal svp !';
    }
    // vérification du genre
    else if(empty($_POST['gender']))
    {
      $message = 'Veuillez indiquer votre genre svp !';
    }
    // vérification du captcha
    else if($_POST["resultatcaptcha"] != $_POST["captcha"])
    {
        $message = 'captcha incorrect';
    }
    // si les conditions sont remplies, on execute les requêtes et on envoie dans la bdd
    else
        {
        $prepare = $pdo->prepare('INSERT INTO users (mail,password,gender,surname,age,name) VALUES (:mail,:password,:gender,:surname,:age,:name)');
        $prepare->bindValue(':mail',$_POST['mail']);
        $prepare->bindValue(':gender',$_POST['gender']);
        $prepare->bindValue(':name',$_POST['name']);
        $prepare->bindValue(':surname',$_POST['surname']);
        $prepare->bindValue(':age',$_POST['age']);
        $prepare->bindValue(':password',hash('sha256',$_POST['password'].SALT));
        $prepare->execute(); 

        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

        // On personnalise le message de bienvenue

            if ($_POST["gender"] == "male")
            {
                print_r("Bienvenue monsieur ".($_POST['name']));
            }
            else
            {
                print_r("Bienvenue madame ".($_POST['name']));
            }


                }

          }

    // on affiche l'erreur si elle a lieu
    
    print_r($message);

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>

    <h1>Inscription</h1>
    <form action="inscription.php" method="post">
        <label>Indiquez votre nom
        <input type="text" name="name">
        </label>
        <br>
        <label>Indiquez votre Prénom
        <input type="text" name="surname">
        </label>
        <br>
        <label>Indiquez votre Age
        <input type="number" name="age" min="10" max="110" step="1" >
        </label>
        <br>
        <label>Indiquez votre adresse mail
        <input type="text" name="mail">
        </label>
        <br>
        <label>Mot de passe (minimum 6 caractères)
        <input type="password" name="password">
        </label>
        <br>
        <label>Confirmez votre mot de passe
        <input type="password" name="passwordbis">
        </label>
        <br>
        <label>Indiquez votre code postal
        <input type="text" name="cp">
        </label>
        <br>
        <label for="captcha">Combien font <?php echo $phrase; ?>
        <input type="text" name="captcha" id="captcha" />
        </label>
        <br>
        <label>
            <input type="radio" name="gender" value="female">
            Female
        </label>
        <label>
            <input type="radio" name="gender" value="male">
            Male
            </label>
        <br>
        <Input type="hidden" name="resultatcaptcha" value="<?=$resultat?>">
        <input type="submit">
    </form>
</body>
</html>