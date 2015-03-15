<?php
require 'traitement_inscription.php';
require 'inc/config.php';
require 'inscription_validation.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>V.SYLLA</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <section class="content">
            <form class="form" action="#" method="POST">

                <!-- pseudo -->
                <p class="input <?= array_key_exists('pseudo', $errors) ? 'error' : ''?>">
                    <input type="text" name="pseudo" id="pseudo" value="<?= $pseudo ?>"/>
                    <label for="pseudo">Name</label>
                </p>
                <span class="err"> <?php echo $errors['pseudo']; ?> </span>

                <!-- email -->
                <p class="input <?= array_key_exists('email', $errors) ? 'error' : ''?>">
                    <input type="text" name="email" id="email" value="<?= $email ?>"/>
                    <label for="email">E-mail</label>
                </p>
                <span class="err"> <?php echo $errors['email']; ?> </span>

                <!-- password -->
                <p class="input <?= array_key_exists('password', $errors) ? 'error' : ''?>">
                    <input type="password" name="password" id="password"/>
                    <label for="password">Password</label>
                </p>
                <span class="err"> <?php echo $errors['password']; ?> </span>

                <!-- conf_password -->
                <p class="input <?= array_key_exists('conf_password', $errors) ? 'error' : ''?>">
                    <input type="password" name="conf_password" id="conf_password"/>
                    <label for="conf_password">Confirm password</label>
                </p>
                <span class="err"> <?php echo $errors['conf_password']; ?> </span>

                <!-- age -->
                <p class="input <?= array_key_exists('age', $errors) ? 'error' : ''?>">
                    <input type="number" name="age" id="age" value="<?= $age ?>"/>
                    <label for="age">Age</label>
                </p>
                <span class="err"> <?php echo $errors['age']; ?> </span>

                <!-- sex -->
                <p class="input">
                    <select name="sex" size="1">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <label for="sex">Sex</label>
                </p>


                <p class="submit">
                    <input type="submit" value="Send" />
                </p>

            </form>
        </section>
    </div><!-- end of container -->
</body>
</html>

<!-- pseudo -->